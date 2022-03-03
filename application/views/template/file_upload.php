<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="<?= $name ?>_uploader"><?= $label ?></label><br>
            <label class="btn btn-block btn-primary" for="<?= $name ?>_uploader">Upload</label>
            <input type="file" class="d-none" name="<?= $name ?>_uploader" id="<?= $name ?>_uploader">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <input type="text" name="<?= $name ?>" id="<?= $name ?>" value="<?= $value ?>" class="d-none form-control">
        </div>
        <div class="col-12" id="preview">
            <img id="img-preview" style="max-height: 100px;" src="#" class="d-none">
            <a id="pdf-preview" href="#" class="d-none"></a>
            <span id="delete" class="btn btn-danger float-right">Delete</span>
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
                                $('#img-preview').attr('src', '<?= base_url('uploads') ?>/' + response.data.file_name);
                                $('#img-preview').removeClass('d-none');
                                $('#pdf-preview').addClass('d-none');
                            } else {
                                $('#pdf-preview').attr('href', '<?= base_url('uploads') ?>/' + response.data.file_name);
                                $('#pdf-preview').html(response.data.file_name);
                                $('#pdf-preview').removeClass('d-none');
                                $('#img-preview').addClass('d-none');
                            }
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