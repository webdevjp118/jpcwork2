// Generated by CoffeeScript 1.10.0
(function() {
  var ADDR2_MAXLENGTH, cookieClear, debug, isLive, isSmartPhone, loadWidgetsJS, lockScreen, setDefaultBuyer, showBuyerInfo, showMsg, unlockScreen;

  ADDR2_MAXLENGTH = 200;

  this.EbisuAmazonPayments = (function() {
    function EbisuAmazonPayments() {}

    return EbisuAmazonPayments;

  })();

  // アマゾンペイメントでお支払いボタンを初期化します。
  // ポップアップを使用するかどうかを引数で受け取ります。
  this.EbisuAmazonPayments.initAmazonPayButton = function(popup, color, size) {
    eb$(function() {
      return loadWidgetsJS();
    });
    return window.onAmazonLoginReady = function() {
      return eb$(function() {
        var authRequest, e, error1, nextPath, objectColor, objectId, objectSize, objectType, optionPopup, optionScope, sellerId;
        amazon.Login.setClientId(eb$('#apsClientId').val());
        try {
          objectId = "AmazonPayButton";
          if (!eb$('#AmazonPayButton')[0]) {
            return false;
          }
          sellerId = eb$('#apsSellerId').val();
          objectType = eb$('#apsType').val();
          objectColor = color;
          objectSize = size;
          optionScope = eb$('#apsScope').val();
          optionPopup = popup;
          redirectUrl = (!optionPopup && eb$('#apsType').val() === "LwA") ? eb$('#apsRedirectURLLoginRedirect').val() : eb$('#apsRedirectURL').val();
          nextPath = !optionPopup ? redirectUrl : function(result) {
            if (typeof result.error !== 'undefined') {
              return null;
            } else {
              return result.onComplete(eb$('#apsRedirectURL').val());
            }
          };
          authRequest = null;
          OffAmazonPayments.Button(objectId, sellerId, {
            type: objectType,
            color: objectColor,
            size: objectSize,
            useAmazonAddressBook: true,
            authorization: function() {
              var loginOptions;
              debug("Authorized!");
              debug("nextPath : " + nextPath);
              loginOptions = {
                scope: optionScope,
                popup: optionPopup
              };
              return authRequest = amazon.Login.authorize(loginOptions, nextPath);
            },
            onSignIn: function(orderReference) {
              return debug(orderReference);
            },
            onError: function(error) {
              cookieClear();
              return debug(error);
            }
          });
          return true;
        } catch (error1) {
          e = error1;
          debug(e);
          return false;
        }
      });
    };
  };

  // アマゾンペイメントのウィジェットを初期化します
  // デザインの設定データを引数で受け取ります。
  this.EbisuAmazonPayments.initAddressBookAndWallet = function(design, msgAppender) {
    eb$(function() {
      return loadWidgetsJS();
    });
    eb$(document).ready(function() {
      lockScreen();
      return eb$('.btnConfirm').hide();
    });
    return window.onAmazonLoginReady = function() {
      return window.onload = function() {
        var accessToken, e, error1, getURLParameter, sellerId;
        amazon.Login.setClientId(eb$('#apsClientId').val());
        amazon.Login.setUseCookie(true);
        try {
          sellerId = eb$('#apsSellerId').val();
          getURLParameter = function(name, source) {
            return decodeURIComponent(((new RegExp('[?|&|#]' + name + '=([^&;]+?)(&|#|;|$)').exec(source)) || [void 0, ""])[1].replace(/\+/g, '%20' || null));
          };
          accessToken = getURLParameter("access_token", location.hash);
          if (typeof accessToken === 'string' && accessToken.match(/^Atza/)) {
            document.cookie = "amazon_Login_accessToken=" + accessToken + ";secure";
            eb$('#amazonAccessToken').val(accessToken);
          }
          // AddressBookウィジェット
          new OffAmazonPayments.Widgets.AddressBook({
            sellerId: sellerId,
            onOrderReferenceCreate: function(orderReference) {
              var ajaxPath, appCd, data, obj1;
              unlockScreen();
              debug("onOrderReferenceCreate");
              debug(orderReference);
              eb$('#amazonOrderReferenceId').val(orderReference.getAmazonOrderReferenceId);
              appCd = eb$('#apsAppCd').val();
              accessToken = eb$('#amazonAccessToken').val();
              ajaxPath = eb$('#apsAjaxPathOrderReferenceDetail').val();
              data = (
                obj1 = {},
                obj1[appCd + ":amazonOrderReferenceId"] = eb$('#amazonOrderReferenceId').val(),
                obj1[appCd + ":access_token"] = eb$('#amazonAccessToken').val(),
                obj1
              );
              return eb$.post("ajax_customize_api/" + ajaxPath, data, function(buyer) {
                debug("Buyer");
                debug(buyer);
                if (buyer === null) {
                  return;
                }
                if (typeof buyer.error !== "undefined") {
                  return showMsg(msgAppender, buyer.message);
                } else {
                  return setDefaultBuyer(buyer);
                }
              });
            },
            onAddressSelect: function(orderReference) {
              lockScreen();
              debug("onAddressSelect");
              debug(orderReference);
              // Walletウィジェット
              return new OffAmazonPayments.Widgets.Wallet({
                sellerId: sellerId,
                amazonOrderReferenceId: eb$('#amazonOrderReferenceId').val(),
                design: design,
                onReady: function() {
                  eb$('.btnConfirm').hide();
                  return unlockScreen();
                },
                onPaymentSelect: function(orderReference) {
                  eb$('.btnConfirm').show();
                  debug("onPaymentSelect");
                  return debug(orderReference);
                },
                onError: function(error) {
                  if (eb$('#sendArea').is(':hidden')) {
                    showMsg(msgAppender, error.getErrorMessage());
                  }
                  eb$('.btnConfirm').hide();
                  unlockScreen();
                  cookieClear();
                  debug("onError");
                  return debug(error);
                }
              }).bind("walletWidgetDiv");
            },
            design: design,
            onError: function(error) {
              if (eb$('#sendArea').is(':hidden')) {
                showMsg(msgAppender, error.getErrorMessage());
              }
              eb$('.btnConfirm').hide();
              unlockScreen();
              cookieClear();
              debug("onError");
              return debug(error);
            }
          }).bind("addressBookWidgetDiv");
          return true;
        } catch (error1) {
          e = error1;
          debug(e);
          return false;
        }
      };
    };
  };

  // 読み込み専用のウィジェットを初期化
  this.EbisuAmazonPayments.initReadOnlyWidgetDiv = function() {
    eb$(function() {
      return loadWidgetsJS();
    });
    eb$(document).ready(function() {
      lockScreen();
      return eb$('.btnOrder').hide();
    });
    return window.onAmazonLoginReady = function() {
      return window.onload = function() {
        var e, error1;
        try {
          amazon.Login.setClientId(eb$('#apsClientId').val());
          debug(eb$('#apsSellerId').val());
          debug(eb$('#amazonOrderReferenceId').val());
          // AddressBookウィジェット
          return new OffAmazonPayments.Widgets.AddressBook({
            sellerId: eb$('#apsSellerId').val(),
            amazonOrderReferenceId: eb$('#amazonOrderReferenceId').val(),
            displayMode: "Read",
            design: {
              designMode: "responsive"
            },
            onAddressSelect: function(orderReference) {
              // Walletウィジェット
              return new OffAmazonPayments.Widgets.Wallet({
                sellerId: eb$('#apsSellerId').val(),
                amazonOrderReferenceId: eb$('#amazonOrderReferenceId').val(),
                displayMode: "Read",
                design: {
                  designMode: "responsive"
                },
                onPaymentSelect: function(orderReference) {
                  eb$('.btnOrder').show();
                  unlockScreen();
                  debug("onPaymentSelect");
                  return debug(orderReference);
                },
                onError: function(e) {
                  eb$('.btnOrder').hide();
                  unlockScreen();
                  cookieClear();
                  return debug(e);
                }
              }).bind("readOnlyWalletWidgetDiv");
            },
            onError: function(e) {
              eb$('.btnOrder').hide();
              unlockScreen();
              cookieClear();
              return debug(e);
            }
          }).bind("readOnlyAddressBookWidgetDiv");
        } catch (error1) {
          e = error1;
          return debug(e);
        }
      };
    };
  };

  this.EbisuAmazonPayments.amazonLogOut = function() {
    var e, error1;
    try {
      document.cookie = "amazon_Login_accessToken=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
      if ('undefined' !== typeof amazon) {
        amazon.Login.logout();
      }
      return cookieClear();
    } catch (error1) {
      e = error1;
      return debug(e);
    }
  };

  // 会員情報変更モーダルウィンドウ初期化
  this.EbisuAmazonPayments.initMemberInput = function() {
    var closeEvent, closeModal, initModal, openModal, refrectEvent, resizeModalOverlay;
    eb$(function() {
      eb$('#memberEdit_Link').click(function() {
        openModal();
        // キャンセル
        eb$('#modal-overlay, #member_edit_cancel').unbind().click(function() {
          closeEvent();
          return closeModal();
        });
        // 反映
        return eb$('#member_edit_complete').unbind().click(function() {
          refrectEvent();
          return closeModal();
        });
      });
      // ウィンドウリサイズ時の位置調整
      if (isSmartPhone()) {
        window.addEventListener("resize", resizeModalOverlay);
      } else {
        window.addEventListener("resize", initModal);
      }
      // 標準で出力されるinputをラベルに変換
      return eb$('#PC_MAIL_LABEL').find('input').each(function(idx, obj) {
        if ((eb$(obj).attr('id')) !== 'PC_MAIL') {
          eb$('#PC_MAIL_LABEL').after(eb$('<label />', {
            id: obj.name + "_LABEL",
            style: "display:none"
          }).text(obj.value));
        }
        return eb$(obj).remove();
      });
    });
    // モーダルオープン
    openModal = function() {
      eb$('#memberEdit_Link').blur();
      if (eb$('#modal-overlay')[0]) {
        return false;
      }
      eb$('body').append('<div id="modal-overlay"></div>');
      eb$('#modal-overlay').fadeIn('200');
      eb$('#memberEditArea').fadeIn('200');
      if (isSmartPhone()) {
        return resizeModalOverlay();
      } else {
        return initModal();
      }
    };
    // モーダルクローズ
    closeModal = function() {
      eb$('#memberEditArea').hide();
      return eb$('#modal-overlay').fadeOut('200', function() {
        return eb$('#modal-overlay').remove();
      });
    };
    // モーダル位置調整
    initModal = function() {
      var ch, cw, h, pxleft, pxtop, w;
      w = window.innerWidth;
      h = window.innerHeight;
      cw = eb$('#memberEditArea').outerWidth({
        margin: true
      });
      ch = eb$('#memberEditArea').outerHeight({
        margin: true
      });
      pxleft = (w - cw) / 2;
      pxtop = (h - ch) / 2;
      return eb$('#memberEditArea').css({
        'left': pxleft + 'px',
        'top': pxtop + 'px'
      });
    };
    // 画面ロックの高さ調整
    resizeModalOverlay = function() {
      return eb$('#modal-overlay').css({
        'height': eb$(document).height() + 'px'
      });
    };
    refrectEvent = showBuyerInfo;
    // モーダルクローズ時イベント
    return closeEvent = function() {
      return eb$('#memberLabelArea').find('label').each(function(idx, obj) {
        var idName, idNameOrg;
        idName = eb$(obj).attr('id');
        idNameOrg = idName.replace(/_LABEL/g, "");
        if (idNameOrg !== 'undefined') {
          if (idNameOrg === 'ADDR1') {
            eb$("#" + idNameOrg + " option").attr("selected", false);
            return eb$("#" + idNameOrg + " option[value='" + (eb$(obj).text()) + "']").attr("selected", "selected");
          } else {
            return eb$("#" + idNameOrg).val(eb$(obj).text());
          }
        }
      });
    };
  };

  // cart_confirm -> 変更する -> 戻る
  // 上記の遷移でテンプレートサフィックスが失われるので
  // クエリパラメーターに識別用のパラメータを追加する。
  this.EbisuAmazonPayments.fixBackLink = function() {
    return eb$(window).ready(function() {
      return eb$("a").each(function(i, a) {
        var appCd, e, error1;
        try {
          if ((a.href.indexOf("cart_confirm.html")) > -1 && a.href.endsWith("?request=back")) {
            appCd = eb$("#apsAppCd").val();
            return a.href += "&" + appCd + ":isamazon=1";
          }
        } catch (error1) {
          e = error1;
          debug(e);
          return null;
        }
      });
    });
  };


// 以下内部関数群

  cookieClear = function() {
    document.cookie = 'amazon_Login_accessToken=; expires=Thu, 01 Jan 1970 00:00:00 GMT';
    return document.cookie = 'amazon_Login_state_cache=; expires=Thu, 01 Jan 1970 00:00:00 GMT';
  };

  //画面ロック
  lockScreen = function() {
    var angle, loaderArea, lockArea;
    if (eb$('#sendArea').is(':hidden')) {
      return false;
    }
    lockArea = eb$('<div />').attr('id', 'lock').hide().fadeIn(500);
    loaderArea = eb$('<div />').addClass('loader');
    lockArea.append(loaderArea);
    eb$('body').append(lockArea);
    angle = 0;
    return this.loadingTimer = setInterval(function() {
      angle += 18;
      return eb$('#lock .loader').rotate(angle);
    }, 50);
  };

  // 画面ロック解除
  unlockScreen = function() {
    if (eb$('#sendArea').is(':hidden')) {
      return false;
    }
    eb$('div#lock').fadeOut(300).queue(function() {
      return eb$('div#lock').remove();
    });
    return clearInterval(this.loadingTimer);
  };

  // ajaxで取得したデータを購入者の情報に反映します。
  setDefaultBuyer = function(buyer) {
    var $inputsHasValue, f_kana, kvs, l_kana;
    l_kana = "セイ";
    if ((buyer.name.lastKana != null) && buyer.name.lastKana !== null) {
      l_kana = buyer.name.lastKana;
    }
    f_kana = "メイ";
    debug(buyer.name.firstKana);
    if ((buyer.name.firstKana != null) && buyer.name.firstKana !== null) {
      f_kana = buyer.name.firstKana;
    }
    kvs = [
      {
        key: "L_NAME",
        val: buyer.name.last
      }, {
        key: "F_NAME",
        val: buyer.name.first
      }, {
        key: "L_KANA",
        val: l_kana
      }, {
        key: "F_KANA",
        val: f_kana
      }, {
        key: "PC_MAIL",
        val: (buyer.email == null)? '' : buyer.email.user + "@" + buyer.email.domain
      }, {
        key: "PC_MAIL_CONFIRM1",
        val: (buyer.email == null)? '' : buyer.email.user
      }, {
        key: "PC_MAIL_CONFIRM2",
        val: (buyer.email == null)? '' : buyer.email.domain
      }, {
        key: "ZIP",
        val: buyer.addr.postalCode
      }, {
        key: "ADDR1",
        val: buyer.addr.addr1
      }, {
        key: "ADDR2",
        val: buyer.addr.addr2
      }, {
        key: "ADDR3",
        val: buyer.addr.addr3
      }, {
        key: "TEL",
        val: buyer.tel.tel
      }
    ];
    var isSplit = false;
    $inputsHasValue = kvs.filter(function(kv) {
      var val;
      val = eb$("#" + kv.key).val();
      if (typeof val === "undefined") {
    	  val = null;
      }
      return val !== null && val.length > 0;
    });
    if ($inputsHasValue.length > 0 
            && (
                (eb$("#apsIsAmazonLogin") === "undefined") 
                    || 
                (eb$("#apsIsFirstCartSeisanView") === "undefined" || eb$("#apsIsFirstCartSeisanView").val() !== "1"))
                ) {
      return null;
    } else {
        kvs.forEach(function(kv) {
          eb$("#" + kv.key).val(kv.val);
          if (("" + kv.key) === "PC_MAIL" && eb$("#" + kv.key).attr("type") === "hidden") {
            return eb$("#" + kv.key).before(kv.val);
          }
        });
        return showBuyerInfo();
      }
  };

  // 購入者情報の入力値をラベルに反映します。
  showBuyerInfo = function() {
    return eb$('#memberEditArea').find('input, select').each(function(idx, obj) {
      var idName, idNameLabel;
      idName = eb$(obj).attr('id');
      idNameLabel = idName + "_LABEL";
      if (idNameLabel !== "undefined" && idNameLabel !== "member_edit_complete" && idNameLabel !== "member_edit_cancel") {
    	// TEL1が存在する時点で電話番号分割
    	if (idName == "TEL1") {
    		var tel = eb$("#TEL1").val();
    		if (tel != '' && eb$("#TEL2").val() !=  '') {
    			tel = tel + '-';
    		}
    		tel = tel + eb$("#TEL2").val();
    		if (tel != '' && eb$("#TEL3").val() !=  '') {
    			tel = tel + '-';
    		}
    		tel = tel + eb$("#TEL3").val();
    		return eb$("#TEL_LABEL").text(tel);
    	}
        return eb$("#" + idNameLabel).text(eb$(obj).val());
      }
    });
  };

  // エラーメッセージの表示
  showMsg = function(msgAppender, msg) {
    var div, img, imgPath, li, table, tdImg, tdMsg, tr, ul;
    if (eb$("#error").length > 0) {
      return;
    }
    imgPath = Ebisu.rootPath + "../view/userweb/images/icon_error.png";
    div = eb$('<div>').attr("id", "error");
    table = eb$("<table>").appendTo(div);
    tr = eb$("<tr>").appendTo(table);
    tdImg = eb$("<td>").addClass("ico").appendTo(tr);
    img = eb$("<img>").attr("src", imgPath).attr("alt", "エラー").appendTo(tdImg);
    tdMsg = eb$("<td>").addClass("content").appendTo(tr);
    ul = eb$("<ul>").appendTo(tdMsg);
    li = eb$("<li>").text(msg).appendTo(ul);
    return msgAppender(div);
  };

  // 環境判定
  isLive = function() {
    return eb$('#apsEnv').val() === 'LIVE';
  };

  // console.logに出力
  debug = function(log) {
    if (!isLive()) {
      return console.log(log);
    }
  };

  // Widgets.jsの読み込み
  loadWidgetsJS = function() {
    if (eb$('#apsWidgetsJsUrl').val()) {
      return eb$.getScript(eb$('#apsWidgetsJsUrl').val());
    }
  };

  // スマートフォン判定
  isSmartPhone = function() {
    var userAgent;
    userAgent = navigator.userAgent;
    return userAgent.indexOf("iPhone") >= 0 || userAgent.indexOf("iPad") >= 0 || userAgent.indexOf("Android") >= 0;
  };

}).call(this);
