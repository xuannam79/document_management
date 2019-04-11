(function ($) {

    function createPdfPreview(fileContents, $displayElement) {
        PDFJS.getDocument(fileContents).then(function (pdf) {
            pdf.getPage(1).then(function (page) {
                var $previewContainer = $displayElement.find('.preview__thumb');
                var canvas = $previewContainer.find('canvas')[0];
                canvas.height = $previewContainer.innerHeight();
                canvas.width = $previewContainer.innerWidth();

                var viewport = page.getViewport(1);
                var scaleX = canvas.width / viewport.width;
                var scaleY = canvas.height / viewport.height;
                var scale = (scaleX < scaleY) ? scaleX : scaleY;
                var scaledViewport = page.getViewport(scale);

                var context = canvas.getContext('2d');
                var renderContext = {
                    canvasContext: context,
                    viewport: scaledViewport
                };
                page.render(renderContext);
            });
        });
    }

    function createPreview(file, fileContents) {
        var $previewElement = '';
        switch (file.type) {
            case 'image/png':
            case 'image/jpeg':
            case 'image/gif':
                $previewElement = $('<img src="' + fileContents + '" />');
                break;
            case 'video/mp4':
            case 'video/webm':
            case 'video/ogg':
                $previewElement = $('<video autoplay muted width="100%" height="100%"><source src="' + fileContents + '" type="' + file.type + '"></video>');
                break;
            case 'application/pdf':
                $previewElement = $('<canvas id="" width="100%" height="100%"></canvas>');
                break;
            default:
                break;
        }
        var $displayElement = $('<div class="preview">\
                                 <span class="preview__name" title="' + file.name + '">' + file.name + '</span>\
                               </div>');
        $('.upload__files').append($displayElement);

        if (file.type === 'application/pdf') {
            createPdfPreview(fileContents, $displayElement);
        }
    }

    function fileInputChangeHandler(e) {
        var URL = window.URL || window.webkitURL;
        var fileList = e.target.files;

        if (fileList.length > 0) {
            $('.upload__files').html('');

            for (var i = 0; i < fileList.length; i++) {
                var file = fileList[i];
                var fileUrl = URL.createObjectURL(file);
                createPreview(file, fileUrl);
            }
        }
    }

    $(document).ready(function () {
        $('input:file').on('change', fileInputChangeHandler);
    });
})(jQuery.noConflict());
