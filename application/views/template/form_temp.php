<?php
$attributes = array(
    'id' => 'formlib_form',
    'class' => '',
);
$action = '#';

?>
<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title"><?= $form_title ?></h3>
    </div>
    <div class="card-body">
        <?= form_open_multipart($action, $attributes) ?>
        <div class="row">
            <div class="col-sm-4">

                <?php foreach ($column1 as $col1) {
                    echo $col1;
                } ?>
            </div>
            <div class="col-sm-4">
                <?php foreach ($column2 as $col2) {
                    echo $col2;
                } ?>
            </div>
            <div class="col-sm-4">
                <?php foreach ($column3 as $col3) {
                    echo $col3;
                } ?>
            </div>
        </div>
        <?= form_submit('save', 'simpan', ' class="btn btn-primary" ') ?>
        <?= anchor(base_url($base_url), 'batal', ' class="btn btn-secondary" ') ?>
        <?= form_close() ?>
    </div>
</div>
<script>
    $('#formlib_form').ready(function() {
        $('.select2-formtemplib').each(function() {
            // console.log( $(this).attr('id') );
            var idselect = $(this).attr('id');
            var placeholder = $('#' + idselect).attr('placeholder');
            $('#' + idselect).select2({
                allowClear: true,
                placeholder: 'select ' + placeholder + '...'
            });
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });


        $('.summernote-textarea').each(function() {
            // console.log( $(this).attr('id') );
            var idselect = $(this).attr('id');
            $('#' + idselect).summernote({
                height: 100,
            });
        });

        $('.singgle_date_picker_formlib').daterangepicker({
            "singleDatePicker": true,
            "locale": glob_daterange_locale,
        }, function(start, end, label) {
            // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

        $('.date_picker_formlib').daterangepicker({
            "locale": glob_daterange_locale,
        }, function(start, end, label) {
            // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

        $('.password-whenkeyup').keyup(function(e) {
            $(this).attr('type', 'password');
        })

        bsCustomFileInput.init();

    });

    $('#formlib_form').submit(function(e) {
        e.preventDefault();
        JsLoadingOverlay.show();
        $.ajax({
            url: '<?= base_url($submit_url) ?>', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function(data) // A function to be called if request succeeds
            {
                if (data.success) {
                    window.location = '<?= base_url($base_url) ?>';
                    console.log(data);
                } else {
                    toastr.error(data.message);
                    error_data_hanlder(data.error);
                }
                console.log(data);
                JsLoadingOverlay.hide();
            },
            error: function(err, txt) {
                JsLoadingOverlay.hide();
                console.log(err);
                // console.log('================');
                // console.log(txt);
                bootbox.alert({
                    size: "large",
                    title: '<span class="text-danger" >Error ' + err.status + '<span>',
                    message: '<iframe id="bootframe_err"  src="about:blank" style="width:100%;height:500px;border:none" ></iframe>',
                    onShown: function(e) {
                        var doc = document.getElementById('bootframe_err').contentWindow.document;
                        doc.open();
                        doc.write(err.responseText);
                        doc.close();
                    }
                });
            }
        });
    });

    function error_data_hanlder(error) {
        petik = '"';
        for (var key in error) {
            console.log(key + " " + error[key]);

            $('input[name=' + petik + key + petik + '], select[name=' + petik + key + petik + '],textarea[name=' + petik + key + petik + ' ]').addClass('is-invalid');

            var error_message = '<span id="errormessage_' + key + '" class="text-danger error_message_field"><br><small>' + error[key] + '</small><br></span>';
            // $('input[name=' + petik + key + petik + '], select[name=' + petik + key + petik + '],textarea[name=' + petik + key + petik + ' ]').before(error_message);
            $('input[name=' + petik + key + petik + '], select[name=' + petik + key + petik + '],textarea[name=' + petik + key + petik + ' ]').change(function() {
                var input = $(this).val();
                if (input.length > 0) {
                    $(this).removeClass('is-invalid');
                    // $('#errormessage_'+key+'').remove();
                    // $(this).parent().find('.error_message_field').remove();
                }
            });
        }
    }
</script>