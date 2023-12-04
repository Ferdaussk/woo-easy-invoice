// woeic-popup-script.js

document.getElementById('popupContainer').addEventListener('click', function(event) {
    if (event.target === this) {
        this.style.display = 'none';
    }
});
jQuery(document).ready(function ($) {
    $('#downloadButton').on('click', function () {
        // Show the popup when the "Download Invoice" button is clicked
        $('#popupContainer').fadeIn();
    });

    // Close the popup when the "Print" button is clicked
    $('#printButton').on('click', function () {
        $('#popupContainer').fadeOut();
    });
});

