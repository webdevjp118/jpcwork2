var custom_uploader;
var data_type;
// (function($){
jQuery(document).ready(function(){
    console.log("hello everyone!");
    jQuery('.admin-media').click(function(e) {
        e.preventDefault();
        data_type = jQuery(this).attr('data-type');
        console.log(data_type);
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
            console.log(data_type);
            attachment = custom_uploader.state().get('selection').first().toJSON();
            console.log(jQuery('.input-media[data-type="'+data_type+'"]'));
            jQuery('.input-media[data-type="'+data_type+'"]').val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });    
});

    
// });
