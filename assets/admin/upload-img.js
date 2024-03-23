jQuery(document).ready(function($){
    $('#upload_image_button').click(function(e) {
      e.preventDefault();

      var custom_file_frame = wp.media.frames.customHeader = wp.media({
        title: 'Upload Logo',
        library: {
          type: 'image'
        },
        button: {
          text: 'Select'
        },
        multiple: false
      });

      custom_file_frame.on('select', function() {
        var attachment = custom_file_frame.state().get('selection').first().toJSON();
        $('#woeic-checkout-page-check').val(attachment.url);
        $('.woeic-selected-logo img').attr('src', attachment.url); // Updated selector
        $('#upload_image_button').text('Upload Logo');
      });

      custom_file_frame.open();
    });
  });