(function($){
    $('.ziptoaddress').click(function(){
        AjaxZip3.zip2addr('zip','','temp_prefecture','temp_city','address3');
        AjaxZip3.onSuccess = function(){
            let prefecture = $('input[name="temp_prefecture"]').val();
            let city = $('input[name="temp_city"]').val();
            $('select[name="address1"').find("option").removeAttr("selected");
            $('select[name="address1"').find("option").each(function(index){
                if(prefecture == $(this).val()) {
                    $(this).attr('selected', 'selected');
                }
            });
            if(prefecture != "") {
                let send_data = {
                    action: 'shapi',
                    security: shapi.security,
                    sh_type: 'get_cities',
                    prefecture: prefecture,
                }
                jQuery.post(shapi.ajaxurl, send_data, function(res){
                    let result = jQuery.parseJSON(res);
                    console.log(result);
                    let new_html = '<option value="">▼市区町村</option>';
                    if(result.rs_type == 'get_cities') {
                        if(result.cities.length>0) {
                            for(let i=0;i<result.cities.length;i++) {
                                if(city == result.cities[i]) {
                                    new_html += '<option selected value="'+result.cities[i]+'">'+result.cities[i]+'</option>';
                                }
                                else {
                                    new_html += '<option value="'+result.cities[i]+'">'+result.cities[i]+'</option>';
                                }
                                
                            }
                        }
                    }
                    $('select[name="address2"').html(new_html);
                });    
            }
            else {
                $('select[name="address2"').html('<option value="">▼市区町村</option>');
            }
        };
    });
    $('select[name="address1"').change(function(){
        let prefecture = $(this).val();
        if(prefecture != "") {
            let send_data = {
                action: 'shapi',
                security: shapi.security,
                sh_type: 'get_cities',
                prefecture: prefecture,
            }
            jQuery.post(shapi.ajaxurl, send_data, function(res){
                let result = jQuery.parseJSON(res);
                console.log(result);
                let new_html = '<option value="">▼市区町村</option>';
                if(result.rs_type == 'get_cities') {
                    if(result.cities.length>0) {
                        for(let i=0;i<result.cities.length;i++) {
                            new_html += '<option value="'+result.cities[i]+'">'+result.cities[i]+'</option>';
                        }
                    }
                }
                $('select[name="address2"').html(new_html);
            });    
        }
        else {
            $('select[name="address2"').html('<option value="">▼市区町村</option>');
        }
    });
    jQuery('.api_think, .api_addview_think').click(add_think_callback);
    function add_think_callback(e) {
        let sh_type = jQuery(this).data('sh_type');
        let sh_id = jQuery(this).data('sh_id');
        let send_data = {
            action: 'shapi',
            security: shapi.security,
            sh_type: sh_type,
            sh_id: sh_id,
        };
        $('.api-loader-wrapper').fadeIn();
        $('.api_think_count').animate({opacity:'0'}, 500, function() {
            $(this).animate({opacity:'1'}, 500);
        });
        jQuery.post(shapi.ajaxurl, send_data, function(res){
            let result = jQuery.parseJSON(res);
            console.log(result);
            if(result.rs_type == 'add_think') {
                console.log('add_think');
                $('.api_think[data-sh_type="add_think"][data-sh_id="'+result.rs_id+'"]').css({'display':'none'});
                $('.api_think[data-sh_type="del_think"][data-sh_id="'+result.rs_id+'"]').css({'display':'flex'});
                console.log( $('.api_add_think[data-sh_typ="'+result.rs_type+'"][data-sh_id="'+result.rs_id+'"]'));
                $('.api_think_count').text(String(result.think_list.length).padStart(2, '0'));
                reset_think_list(result.think_list);
            }
            else if(result.rs_type == 'del_think') {
                console.log('del_think');
                $('.api_think[data-sh_type="add_think"][data-sh_id="'+result.rs_id+'"]').css({'display':'flex'});
                $('.api_think[data-sh_type="del_think"][data-sh_id="'+result.rs_id+'"]').css({'display':'none'});
                $('.api_think_count').text(String(result.think_list.length).padStart(2, '0'));
                reset_think_list(result.think_list);
            }
            $('.api-loader-wrapper').fadeOut();
        });
    }
    function reset_think_list(think_list) {
        let list_html='';
        let theme_uri = $(".global_vars").data("theme_uri");
        console.log(theme_uri);
        for(let i=0;i<think_list.length;i++) {
            let think = think_list[i];
            list_html += '<div class="store_name_content_sec">';
            list_html +=     '<h3>'+think.title+'</h3>';
            list_html +=     '<div class="store_name_content_box">';
            list_html +=         '<div class="store_name_content_box_inner">';
            list_html +=             '<div class="custom_row">';
            list_html +=                 '<div class="custom_col_image">';
            list_html +=                     '<div class="store_name_content_box_image">';
            list_html +=                         '<img src="'+think.photo_big+'">';
            list_html +=                     '</div>';
            list_html +=                 '</div>';
            list_html +=                 '<div class="custom_col_text">';
            list_html +=                     '<div class="store_name_content_box_text">';
            list_html +=                         '<p class="cpc">'+think.description+'</p>';
            list_html +=                         '<ul>';
            list_html +=                             '<li>';
            list_html +=                                 '<p class="time_text"><img src="'+theme_uri+'/images/time_icon.svg">00:00~00:00</p>';
            list_html +=                             '</li>';
            list_html +=                             '<li>';
            list_html +=                                 '<p class="day_text"><img src="'+theme_uri+'/images/day_icon.svg">'+think.off_days+'</p>';
            list_html +=                             '</li>';
            list_html +=                             '<li>';
            list_html +=                                 '<p class="station_text"><img src="'+theme_uri+'/images/station_icon.svg">'+think.station+'</p>';
            list_html +=                             '</li>';
            list_html +=                         '</ul>';
            list_html +=                         '<a href="javascript:void(0)" class="api_del_think" data-sh_type="del_think" data-sh_id="'+think.post_id+'">× 見積りから外す</a>';
            list_html +=                     '</div>';
            list_html +=                 '</div>';
            list_html +=             '</div>';
            list_html +=         '</div>';
            list_html +=     '</div>';
            list_html +='</div>';
        }
        $(".think_list_node").html(list_html);
        $(".think_list_node").find('.api_del_think').click(add_think_callback);
        if(think_list.length>0) {
            $(".think_check").css({"display":"flex"});
        }
        else {
            $(".think_check").css({"display":"none"});
        }
    }
}(jQuery));