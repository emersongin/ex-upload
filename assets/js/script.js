const controller = 'http://localhost/www/ex-upload/controller/';
const upload = 'upload-controller.php';

$(document).ready(function() {
    let form = $('#form-file');
    let inputFile = $('#file');
    let button = $('#btn-submit');
    let progessBar = $('#progress-bar');

    form.submit(function(event) {
        let formData = new FormData(event.target);
        formData.append('service', 'upload');
        formData.append('file', inputFile[0]);
        
        $.ajax({
            type: "POST",
            url: controller + upload,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            enctype: "multipart/form-data",
            dataType: 'json',
            // xhr: function() {
            //     let myXhr = $.ajaxSettings.xhr();
            //     if (myXhr.upload) {
            //         myXhr.upload.addEventListener('progress', function(event) {
            //             // event.loaded;
            //         }, false);
            //     }

            //     return myXhr;
            // },
            success: function(res) {
                console.log(res);
            },
            error: function(res, status, error) {
                console.log(res.responseText);

            }
        });
    });
});