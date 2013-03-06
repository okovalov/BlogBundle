$(document).ready(function() {
    var base_url = window.location.protocol + "//" + window.location.host + "/";
    tinyMCE.init({
        theme: "ribbon",
        keep_styles: false,
        preformatted: true,
        document_base_url: base_url + "bundles/blog/js/tiny_mce/",
        mode: 'textareas',
        content_css: '/bundles/blog/css/textarea.css'
    });
});