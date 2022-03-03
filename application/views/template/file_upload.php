<div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="<?= $name ?>_uploader"><?= $label ?></label>
            <input type="file" class="form-control-file border" name="<?= $name ?>_uploader" id="<?= $name ?>_uploader">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <input type="text" name="<?= $name ?>" id="<?= $name ?>" value="<?= $value ?>">
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
                $.ajax({
                    url: '<?= base_url('upload_templib/upload_templib') ?>',
                    type: 'POST',
                    data: fd,
                    success: function(data) {
                        // $('#<?= $name ?>').html(data.file_name);
                    },
                    error: function(err, xhr) {

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });

    });
</script>