<?php get_header(); ?>
<?php

if(isset($_POST['submit-confirm']) && ($_POST['submit-confirm'] == 'submit-confirm')) {

    $field1 = isset($_POST['field1']) ? $_POST['field1']: '';
    $field2 = isset($_POST['field2']) ? $_POST['field2']: '';
    $field3 = isset($_POST['field3']) ? $_POST['field3']: '';
    $field4 = isset($_POST['field4']) ? $_POST['field4']: '';
    $field5 = isset($_POST['field5']) ? $_POST['field5']: '';
    $field6 = isset($_POST['field6']) ? $_POST['field6']: '';
    $radio = isset($_POST['radio']) ? $_POST['radio']: '';
    
    $to      = 'nakashima@teambuildings.jp';

    $message = "
    お名前 : ".$field1.$field2."<br>
    法人名 : ".$field3."<br>
    電話番号 : ".$field4."<br>
    メールアドレス : ".$field5."<br>
    お問合せ種別 : ".$radio."<br><br>
    ご相談の内容 : <br>".$field16."<br>
    ";

    $subject = 'Team Building';

    $headers = "From: " . $field5 . "\r\n";
    $headers .= "Reply-To: " . $field5 . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo '<script>alert("Success!"); location.href="'.home_url().'"</script>';
    } else {
        echo '<script>alert("Failed!"); location.href="'.home_url().'"</script>';
    }    
}
?>

<div class="banner-block-hp">
    <div class="main_slider owl-carousel">
        <div class="slider-img-hp"><img src="<?php echo get_stylesheet_directory_uri();?>/images/banner_1.png" alt="" /></div>
    </div>
</div>
<div class="team-block-hp" id="team-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 team-block-in-hp">
                <div class="team-middle-hp">
                    <p>私たちは、社員1人ひとりが持っている力を最大限発揮できるようになるための、チームづくりの支援をしています。</p>
                    <p>1人ひとりが最大限力を発揮するためには、チームがどこを目指し、どんな価値観を持って仕事をしていけば良いのかを理解、共感していること。チーム内で想っていることやアイディア、疑問、違和感を率直に話し合える関係性を育むことが大切だと考えています。</p>
                </div>
                <div class="team-info-hp">
                    <div class="team-info-left-hp">
                        <p>そのために、私たちはチームづくりの社外パートーナーとして、存在します。</p>
                        <p>
                            チームビルディングス株式会社<br> 代表取締役　中島昭聡
                        </p>
                        <div class="team-term-hp">
                            まずはクライアントに私たちを信頼して心を開いてもらわないこと<br> には、いいチームは築けません。
                            <br> そのために大切にしている2つのスタンスがあります。
                        </div>
                        <div class="team-btn-hp">
                            <a href="jsvascript:void(0)" class="common-btn-hp" data-toggle="modal" data-target="#sansModal">2つのスタンスについて</a>
                        </div>
                    </div>
                    <div class="team-info-right-hp">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/team_img.png" alt="" />
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="service-block-hp" id="service-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service-block-in-hp">
                <div class="common-title-hp">
                    <h2>提供サービスについて</h2>
                    <p>SERVICE / PACKAGE</p>
                </div>
                <div class="service-middle-hp">
                    <p>"いいチームづくり"を行っていくためのサービスをご用意しております。</p>
                    <p>
                        会社の魅力や強み、特性を見つけ、高めていく会社のブランドづくりを行い 社内のコミュニケーションを活発に、社員同士の結束を高め、強い会社づくりを行う「チーム ビルディングプログラム」です。
                    </p>
                </div>
                <div class="service-bottom-hp">
                    <p>プログラムの詳細はこちらから</p>
                    <div class="service-btn-main-hp">
                        <a href="<?php echo home_url(); ?>/service" class="common-btn-hp common-white-btn-hp">
                        チームビルディングプログラム
                    </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="works-block-hp" id="voice">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 works-block-in-hp">
                <div class="common-title-hp common-black-title-hp">
                    <h2>お客様の声</h2>
                    <p>WORKS</p>
                </div>
                <div class="works-middle-hp">
                    <?php $works_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4)); while($works_query->have_posts()): $works_query->the_post();?>
                        <div class="works-img-hp">
                            <a href="jsvascript:void(0)" data-toggle="modal" data-target="#workModal<?php echo get_the_ID(); ?>">
                                <?php if(has_post_thumbnail()):?>
                                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" />
                                <?php else: ?>
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/blog_img.png" alt="" />
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="see-more-hp">
                    <a href="<?php echo home_url(); ?>/works">
                    もっと見る<br>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/down_arrow.png" alt="" />
                </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="company-block-hp" id="company">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 company-block-in-hp">
                <div class="common-title-hp">
                    <h2>会社概要</h2>
                    <p>COMPANY PROFILE</p>
                </div>
                <div class="company-middle-hp">
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">会社名</div>
                        <div class="company-list-name-hp">チームビルディングス株式会社</div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">創業</div>
                        <div class="company-list-name-hp">2017年2月</div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">代表取締役</div>
                        <div class="company-list-name-hp">中島 昭聡</div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">従業員数</div>
                        <div class="company-list-name-hp">8名（内業務委託者５名）</div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">事業内容</div>
                        <div class="company-list-name-hp">組織開発事業/企業年金導入コンサルティング事業</div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">運営サービス</div>
						<div class="company-list-name-hp">保育園・幼稚園・こども園向け組織開発事業<a href="https://teambuildings.jp/" target="_blank" style="color: white;">「チームビルディングス」</a></div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">お取引先</div>
                        <div class="company-list-name-hp">
                            株式会社GREENRIBBONGROUP/<br> イオンマーケット労働組合/<br class="sp-br">株式会社日立国際電気/SMG税理士法人/
                            <br> SMG菅原経営株式会社/<br class="sp-br">ジンテック株式会社/<br class="sp-br">株式会社CMBAR/<br class="sp-br">KOHYO労働組合/
                            <br> マックスバリュ北海道労働組合/<br class="sp-br">マックスバリュ東北労働組合/
                            <br> マックスバリュ中部労働組合/<br class="sp-br">マルナカ労働組合/山陽マルナカ労働組合
                        </div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">パートナー</div>
                        <div class="company-list-name-hp">株式会社セルディビジョン</div>
                    </div>
                    <div class="company-list-hp">
                        <div class="company-list-label-hp">所在地</div>
                        <div class="company-list-name-hp">
                            東京都千代田区大手町一丁目 5番1号　大手町ファーストクエアウエストタワー1階 LIFORK大手町RS05<br>〒810-0001
福岡県福岡市中央区天神2-3-10天神パインクレスト719号
                            <div class="google-map-hp">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.64657380272!2d139.76155481525888!3d35.68570348019331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188c0791f87923%3A0xa495b78c79b6ef1f!2z5pel5pys44CB44CSMTAwLTAwMDQg5p2x5Lqs6YO95Y2D5Luj55Sw5Yy65aSn5omL55S677yR5LiB55uu77yV4oiS77yR!5e0!3m2!1sja!2s!4v1617864872382!5m2!1sja!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="conatct-block-hp" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 works-block-in-hp">
                <div class="common-title-hp common-black-title-hp">
                    <h2>お問い合わせ</h2>
                    <p>CONTACT</p>
                </div>
                <div class="conatct-middle-hp">
                    <div class="conatct-info-hp">
                        <p>
                            お仕事のご依頼、お問合せ、ご質問等、こちらのフォームでお受けしております。担当者より折り返しご連絡させていただきます。<br> できる限り迅速に対応するように努めておりますが、内容によっては回答にお時間をいただく場合もあります。何卒ご了承ください。
                        </p>
                    </div>
                    <form action="" method="post" class="conatct-form-hp">
                        <div class="form-field-cop">
                            <div class="form-field-label-cop">お名前 <span>必須</span></div>
                            <div class="form-field-input-cop form-field-input-2-cop">
                                <div class="form-field-input-in-cop">
                                    <input type="text" placeholder="姓" name="field1" required>
                                </div>
                                <div class="form-field-input-in-cop">
                                    <input type="text" placeholder="名" name="field2" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-field-cop">
                            <div class="form-field-label-cop">法人名 <span>必須</span></div>
                            <div class="form-field-input-cop">
                                <div class="form-field-input-in-cop">
                                    <input type="text" placeholder="チームビルディングス株式会社" name="field3" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-field-cop">
                            <div class="form-field-label-cop">電話番号 <span>必須</span></div>
                            <div class="form-field-input-cop">
                                <div class="form-field-input-in-cop">
                                    <input type="text" placeholder="03-5946-8391" name="field4" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-field-cop">
                            <div class="form-field-label-cop">メールアドレス <span>必須</span></div>
                            <div class="form-field-input-cop">
                                <div class="form-field-input-in-cop">
                                    <input type="email" placeholder="info@teambuilings.jp" name="field5" required>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-field-cop">
                            <div class="form-field-label-cop">お問合せ種別 <span>必須</span></div>
                            <div class="form-field-input-cop">
                                <div class="form-field-radio-cop">
                                    <label class="radio-container-cop">資料請求
                                    <input type="radio" checked="checked" name="radio" value="資料請求">
                                    <span class="checkmark-cop"></span>
                                </label>
                                    <label class="radio-container-cop">90分の事前ヒアリング（無料）
                                    <input type="radio" name="radio" value="90分の事前ヒアリング（無料）">
                                    <span class="checkmark-cop"></span>
                                </label>
                                    <label class="radio-container-cop">その他
                                    <input type="radio" name="radio" value="その他">
                                    <span class="checkmark-cop"></span>
                                </label>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-field-cop">
                            <div class="form-field-label-cop">ご相談の内容 <span>必須</span></div>
                            <div class="form-field-input-cop">
                                <div class="form-field-input-in-cop">
                                    <textarea name="field6" required></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="contact-btn-hp">
                            <input type="hidden" name="submit-confirm" value="submit-confirm">
                            <button type="submit" class="common-btn-hp">送信する</button>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php $works_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4)); while($works_query->have_posts()): $works_query->the_post();?>
 <!-- MODAL_START -->
<div class="modal fade" id="workModal<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-mhp" role="document">
        <div class="modal-content modal-content-mjp">
            <div class="modal-close-mhp" data-dismiss="modal" aria-label="Close">
                <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/close.png" alt="" /></a>
            </div>
            <div class="work-info-mjp">
                <div class="work-info-img-mjp">
                    <?php if(has_post_thumbnail()):?>
                        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" />
                    <?php else: ?>
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/work_img.png" alt="" />
                    <?php endif; ?>
                </div>
                <div class="work-info-bottom-mjp">
                    <div class="work-info-name-mjp">
                        <h3><?php echo get_the_title(); ?></h3>
                        <!-- <div class="work-info-btn-mjp">
                            <a href="#">インタビュー動画はこちらから</a>
                        </div> -->
                    </div>
                    <div class="work-info-details-mjp">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL_END -->
<?php endwhile; ?>
<?php get_footer(); ?>