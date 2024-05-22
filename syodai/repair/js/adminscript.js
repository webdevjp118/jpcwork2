var custom_uploader;

var data_type;

// (function(jQuery){

jQuery(document).ready(function(){
    jQuery('.ziptoaddress').click(function(){
        AjaxZip3.zip2addr('zip','','temp_prefecture','temp_city','address3');
        AjaxZip3.onSuccess = function(){
            let prefecture = jQuery('input[name="temp_prefecture"]').val();
            let city = jQuery('input[name="temp_city"]').val();
            jQuery('select[name="address1"').find("option").removeAttr("selected");
            jQuery('select[name="address1"').find("option").each(function(index){
                if(prefecture == jQuery(this).val()) {
                    jQuery(this).attr('selected', 'selected');
                }
            });
            if(prefecture != "") {
                let send_data = {
                    action: 'shapi',
                    security: adminjs.security,
                    sh_type: 'get_cities',
                    prefecture: prefecture,
                }
                jQuery.post(adminjs.ajaxurl, send_data, function(res){
                    let result = jQuery.parseJSON(res);
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
                    jQuery('select[name="address2"').html(new_html);
                });    
            }
            else {
                jQuery('select[name="address2"').html('<option value="">▼市区町村</option>');
            }
        };
    });
    jQuery('select[name="address1"').change(function(e){
        let prefecture = jQuery(this).val();
        if(prefecture != "") {
            let send_data = {
                action: 'shapi',
                security: adminjs.security,
                sh_type: 'get_cities',
                prefecture: prefecture,
            }
            jQuery.post(adminjs.ajaxurl, send_data, function(res){
                let result = jQuery.parseJSON(res);
                let new_html = '<option value="">▼市区町村</option>';
                if(result.rs_type == 'get_cities') {
                    if(result.cities.length>0) {
                        for(let i=0;i<result.cities.length;i++) {
                            new_html += '<option value="'+result.cities[i]+'">'+result.cities[i]+'</option>';
                        }
                    }
                }
                jQuery('select[name="address2"').html(new_html);
            });    
        }
        else {
            jQuery('select[name="address2"').html('<option value="">▼市区町村</option>');
        }
    });

    jQuery('.admin-media').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: '選択',
            button: {
                text: '選択'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('.input-media[data-type="'+data_type+'"]').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader.open();
    });    

});



    

// });

