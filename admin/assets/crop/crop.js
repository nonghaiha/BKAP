$(document).on('click', 'input[data-crop][accept="image/*"]', function (e) {
    $(this).val('');
});
$(document).on('change', 'input[data-crop][accept="image/*"]', function (e) {

    var input_elem = $(e.target);
    input_elem.attr('data-path', "" + input_elem.val() + "}}}");
    var maxViewPortWidth = input_elem.attr('data-crop-width') ? input_elem.attr('data-crop-width') : 250;
    var maxViewPortHeight = input_elem.attr('data-crop-height') ? input_elem.attr('data-crop-height') : 300;

    var file_img = e.target.files[0];

    var url_blood = URL.createObjectURL(file_img);
    if (input_elem.attr('data-validate') == '1') {
        var size = parseInt(input_elem.attr('data-size'));
        var img = new Image();
        img.onload = function () {
            if (this.width > size) {
                bindHtml(maxViewPortWidth, maxViewPortHeight, url_blood, input_elem);
            } else {
                alert("Kích cỡ ảnh không đạt tiêu chuẩn.\n(Chiều rộng tối thiểu " + size + "px)");
            }
        };
        img.src = url_blood;
    } else {
        bindHtml(maxViewPortWidth, maxViewPortHeight, url_blood, input_elem);
    }

    //

});
function bindHtml(maxViewPortWidth, maxViewPortHeight, url_blood, input_elem) {
    var uniqui = Math.round(Math.random() * 9999) + 1;

    var html = '<div id="container-' + uniqui + '"><div id="layer-mask-list"\
        style="display:block;z-index:999;width:100%;height:100% ;position: fixed; top:0;left:0;background: rgba(0,0,0,0.8)">\
            </div>\
            <div id="box-crop-' + uniqui + '"\
        class="box-croppier" style="display: block">\
            <div class="item-crop-avatar" style="width:'+(parseInt(maxViewPortWidth) + 50)+'px;transition:1s all">\
            <div id="upload-' + uniqui + '-show" data-test="1"></div>\
            <div style="clear: both"></div>\
            <button type="button" style="margin-bottom: 5px; margin-left: 5px;" id="upload-' + uniqui + '-close" class="btn btn-default button-close-crop">\
            <span class="fa fa-remove"></span> Close\
            </button>\
            <button type="button" style="float: right;margin-bottom: 5px;margin-right: 5px;" id="upload-' + uniqui + '-result" class="btn btn-success button-result-crop">\
            <span class="fa fa-check"></span> Apply\
            </button>\
            </div>\
            </div></div>';
      
    $(document.body).append(html);
    
    if ($('#upload-' + uniqui + '-show').length >= 0) {
        var $uploadCropVideo = $('#upload-' + uniqui + '-show').croppie({
            viewport: {
                width: maxViewPortWidth,
                height: maxViewPortHeight,
                 // type: 'circle'
            },
            boundary: {
                width: parseInt(maxViewPortWidth) + 50,
                height: parseInt(maxViewPortHeight) + 50,
            },
            exif: true,
            showZoomer: false,
            enableResize: true,
            enableOrientation: true,
            // mouseWheelZoom: 'ctrl'
        });
        $uploadCropVideo.croppie('bind', {url: url_blood});
        $('#upload-' + uniqui + '-result').on('click', function (ev) {
            $uploadCropVideo.croppie('result', {
                type: 'canvas',
                size: 'original',
                format: 'jpg'
            }).then(function (resp) {
                $('#' + input_elem.attr('data-crop')).attr('src', resp);
                var path = input_elem.attr('data-path');
                path = path.replace(/^.*\\/, "");
                $('#' + input_elem.attr('data-value')).val(path + resp);
                $('#container-' + uniqui).remove();
            });
        });

        $('#upload-' + uniqui + '-close').on('click', function (ev) {
            $('#container-' + uniqui).remove();
        });
    }
}

$('#select_thumb').on('click',function(){
    $('input#image').click();
})

$(document).on('change', '#image', function(evt){
    var tgt = evt.target || window.event.srcElement,
      files = tgt.files;
      
    if (FileReader && files && files.length) {

        var fr = new FileReader();

        fr.onload = function () {
        $('#show_img').attr('src',fr.result);
        }

    fr.readAsDataURL(files[0]);
  }
});