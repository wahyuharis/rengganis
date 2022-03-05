<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="<?= $name ?>_uploader"><?= $label ?></label><br>
            <label id="btn_<?= $name ?>_uploader" class="btn btn-block btn-primary" for="<?= $name ?>_uploader" style="margin-bottom:0px">Upload</label>
            <input type="file" class="d-none" id="<?= $name ?>_uploader">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <input type="text" name="<?= $name ?>" id="<?= $name ?>" value="<?= $value ?>" class="d-none form-control">
        </div>
        <div class="col-12" id="preview">
            <div class="row">
                <div class="col-4">
                    <img id="img-preview_<?= $name ?>" style="max-height: 100px;" src="#" class="d-none">
                    <a id="pdf-preview_<?= $name ?>" href="#" class="d-none">
                        <!-- pdf-icon-item.png -->
                        <img id="pdf-icon-preview" style="max-height: 100px;" src="<?= base_url('assets/pdf-icon-item.png') ?>">
                        <br><span></span>
                    </a>
                </div>
                <div class="col-4">
                    <span id="delete_file_<?= $name ?>" class="btn btn-danger d-none">Delete</span>
                </div>
                <div class="col-4">

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(function() {
        $('#<?= $name ?>_uploader').on('change', function() {
            var fd = new FormData();
            var files = $('#<?= $name ?>_uploader')[0].files;
            // Check file selected or not
            if (files.length > 0) {
                fd.append('image', files[0]);
                //fd.append("CustomField", "This is some extra data");
                JsLoadingOverlay.show();
                $.ajax({
                    url: '<?= base_url('upload_templib/upload_templib') ?>',
                    type: 'POST',
                    data: fd,
                    success: function(response) {
                        // $('#<?= $name ?>').html(data.file_name);
                        if (response.success) {
                            $('#<?= $name ?>').val(response.data.file_name);
                            if (response.data.is_image) {
                                $('#img-preview_<?= $name ?>').attr('src', '<?= base_url('uploads') ?>/' + response.data.file_name);
                                $('#img-preview_<?= $name ?>').removeClass('d-none');
                                $('#pdf-preview_<?= $name ?>').addClass('d-none');
                                $('#delete_file_<?= $name ?>').removeClass('d-none');

                            } else {
                                $('#pdf-preview_<?= $name ?>').attr('href', '<?= base_url('uploads') ?>/' + response.data.file_name);
                                $('#pdf-preview_<?= $name ?> > span').html(response.data.file_name);
                                $('#pdf-preview_<?= $name ?>').removeClass('d-none');
                                $('#img-preview_<?= $name ?>').addClass('d-none');
                                $('#delete_file_<?= $name ?>').removeClass('d-none');
                            }
                            $('#btn_<?= $name ?>_uploader').addClass('d-none');
                            $('#delete_file_<?= $name ?>').attr('file_name', response.data.file_name);
                            $('#delete_file_<?= $name ?>').click(function() {
                                JsLoadingOverlay.show();
                                file_needto_delete = $(this).attr('file_name');
                                $.ajax({
                                    url: '<?= base_url('upload_templib/upload_templib/delete') ?>',
                                    type: 'GET',
                                    data: {
                                        'file_name': file_needto_delete
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        JsLoadingOverlay.hide();
                                    },
                                    error: function(err, xhr) {
                                        JsLoadingOverlay.hide();
                                    },
                                });
                                $('#delete_file_<?= $name ?>').unbind('click');
                                $('#<?= $name ?>').val('');
                                $('#delete_file_<?= $name ?>').addClass('d-none');
                                $('#btn_<?= $name ?>_uploader').removeClass('d-none');
                                $('#img-preview_<?= $name ?>').addClass('d-none');
                                $('#pdf-preview_<?= $name ?>').addClass('d-none');
                            });
                        } else {
                            toastr.error(response.message);
                        }
                        JsLoadingOverlay.hide();
                    },
                    error: function(err, xhr) {

                        JsLoadingOverlay.hide();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

            }
        });

    });
</script>