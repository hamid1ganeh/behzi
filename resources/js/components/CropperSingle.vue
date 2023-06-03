<template>
    <div class="w-100">
        <div class="file-pond text-center py-3" @click="upload()">
            <div><i class="fa fa-upload fa-sm px-2"></i>آپلود تصویر</div>
            <img :src="this.currentImage"
                 class="w-75 border border-white border-3 shadow mt-3 rounded upload-preview">
        </div>
        <input type="file" hidden class="image-input" accept=".png, .jpg, .jpeg" @change="readURL">
        <input type="hidden" name="original_image" disabled>
        <input type="hidden" name="updated_image" disabled>
        <!-- Start Modal for cropper -->
        <div class="modal fade" id="cropper_modal" tabindex="-1" role="dialog" data-backdrop="static"
             data-keyboard="false" aria-labelledby="CropperTitle" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">ویرایش تصویر</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <img id="image" src="" class="img-fluid"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0 border-0">
                        <div class="col-12 px-0 row mx-0 justify-content-center">
                            <div class="row mx-0 pb-5">
                                <div id="cropper-buttons">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary mb-3" data-method="setDragMode"
                                                data-option="move">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-arrows-alt"></span>
                                        </span>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-method="setDragMode"
                                                data-option="crop">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-crop-alt"></span>
                                        </span>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary mb-3" data-method="zoom"
                                                data-option="0.1" title="Zoom In">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-search-plus"></span>
                                        </span>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-method="zoom"
                                                data-option="-0.1" title="Zoom Out">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-search-minus"></span>
                                        </span>
                                        </button>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary mb-3" data-method="rotate"
                                                data-option="-45">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-undo-alt"></span>
                                        </span>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-method="rotate"
                                                data-option="45">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-redo-alt"></span>
                                        </span>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-method="scaleX"
                                                data-option="-1">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-arrows-alt-h"></span>
                                        </span>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-option="-1">
                                        <span data-toggle="kt-tooltip">
                                            <span class="fa fa-arrows-alt-v"></span>
                                        </span>
                                        </button>
                                    </div>
                                    <div class="btn-group">

                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary mb-3 py-1" data-method="reset">
                                            <span data-toggle="kt-tooltip">
                                                <span class="fa fa-sync-alt"></span><span class="px-2"
                                                                                          style="font-size: 15px">بازیابی</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 px-1">
                                <button type="button" class="btn btn-success w-100 showPreview">ذخیره</button>
                            </div>
                            <div class="col-6 px-1">
                                <button type="button" class="btn btn-secondary w-100 removeCropper"
                                        data-dismiss="modal">انصراف
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let cropper;
    export default {
        name: "cropper",
        props: ['cropped-width', 'cropped-height', 'current-image','multi-cropper'],
        data(){
            return{
                original_image: 'original_image',
                updated_image: 'updated_image'
            }
        },
        mounted() {
            if(this.multiCropper){
                // $('[name="original_image"]')[0].name = "original_image[]";
                // $('[name="updated_image"]')[0].name = "updated_image[]";
            }
        },
        methods: {
            readURL(element) {
                let input = element.target;
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    console.log(input.files[0]);
                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    };
                    $('#cropper_modal').modal('show');
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                    setTimeout(this.initCropper, 1000);
                }
            },
            initCropper() {
                cropper = new Cropper($('#image')[0]);
                cropper.setAspectRatio(this.croppedWidth / this.croppedHeight);
                cropper.getCroppedCanvas({width: this.croppedWidth, height: this.croppedHeight});
                $('.removeCropper').click(function () {
                    cropper.destroy();
                    // $("input[name='updated_image']")[0].value = '';
                    $('.cropper-container').css('display', 'none')
                });
                // On save
                $('.showPreview').click(() => {
                    $('.upload-preview').attr('src', cropper.getCroppedCanvas().toDataURL());
                    $("input[name='updated_image']")[0].value = cropper.getCroppedCanvas({
                        width: this.croppedWidth,
                        height: this.croppedHeight
                    }).toDataURL();
                    $("input[name='original_image']")[0].value = $('#image').attr('src');
                    $("input[name='updated_image']").removeAttr("disabled");
                    $("input[name='original_image']").removeAttr("disabled");
                    $(".upload-preview").show();
                    cropper.destroy();
                    $('#cropper_modal').modal('hide');
                });
                // Reset Cropper
                $('Button[data-method="reset"]').click(function () {
                    cropper.reset();
                });
                // Rotate image
                $('Button[data-method="rotate"]').click(function () {
                    cropper.rotate($(this).attr('data-option'));
                });
                // Zoom image
                $('Button[data-method="zoom"]').click(function () {
                    cropper.zoom($(this).attr('data-option'));
                });
                // scales image
                $('Button[data-method="scaleY"]').click(function () {
                    cropper.scaleY($(this).attr('data-option'));
                });
                $('Button[data-method="scaleX"]').click(function () {
                    cropper.scaleX($(this).attr('data-option'));
                });
                // Allow dragging or moving the image
                $('Button[data-method="setDragMode"]').click(function () {
                    cropper.setDragMode($(this).attr('data-option'));
                });
            },
            upload() {
                $(".image-input").click();
            }
        }
    }
</script>

<style scoped>
    .file-pond {
        background-color: lightgrey;
        border-radius: 10px;
        cursor: pointer;
    }
</style>