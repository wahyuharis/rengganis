<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Import Item</h3>
    </div>
    <div class="card-body">
        <form action="#" id="formlib_form" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="document_uploader">Excel File</label><br>
                                <label id="btn_document_uploader" class="btn btn-block btn-primary" for="document_uploader" style="margin-bottom:0px">Upload</label>
                                <input type="file" class="d-none" id="document_uploader">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="document" id="document" value="" class="d-none form-control">
                            </div>
                            <div class="col-12" id="preview">
                                <div class="row">
                                    <div class="col-4">
                                        <img id="img-preview_document" style="max-height: 100px;" src="#" class="d-none">
                                        <a id="pdf-preview_document" href="#" class="d-none">
                                            <!-- pdf-icon-item.png -->
                                            <img id="pdf-icon-preview" style="max-height: 100px;" src="http://localhost/rengganis/assets/pdf-icon-item.png">
                                            <br><span></span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <span id="delete_file_document" class="btn btn-danger d-none">Delete</span>
                                    </div>
                                    <div class="col-4">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <script>
                        $(function() {
                            $('#document_uploader').on('change', function() {
                                var fd = new FormData();
                                var files = $('#document_uploader')[0].files;
                                // Check file selected or not
                                if (files.length > 0) {
                                    fd.append('image', files[0]);
                                    //fd.append("CustomField", "This is some extra data");
                                    JsLoadingOverlay.show();
                                    $.ajax({
                                        url: 'http://localhost/rengganis/upload_templib/upload_templib',
                                        type: 'POST',
                                        data: fd,
                                        success: function(response) {
                                            // $('#document').html(data.file_name);
                                            if (response.success) {
                                                $('#document').val(response.data.file_name);
                                                if (response.data.is_image) {
                                                    $('#img-preview_document').attr('src', 'http://localhost/rengganis/uploads/' + response.data.file_name);
                                                    $('#img-preview_document').removeClass('d-none');
                                                    $('#pdf-preview_document').addClass('d-none');
                                                    $('#delete_file_document').removeClass('d-none');

                                                } else {
                                                    $('#pdf-preview_document').attr('href', 'http://localhost/rengganis/uploads/' + response.data.file_name);
                                                    $('#pdf-preview_document > span').html(response.data.file_name);
                                                    $('#pdf-preview_document').removeClass('d-none');
                                                    $('#img-preview_document').addClass('d-none');
                                                    $('#delete_file_document').removeClass('d-none');
                                                }
                                                $('#btn_document_uploader').addClass('d-none');
                                                $('#delete_file_document').attr('file_name', response.data.file_name);
                                                $('#delete_file_document').click(function() {
                                                    JsLoadingOverlay.show();
                                                    file_needto_delete = $(this).attr('file_name');
                                                    $.ajax({
                                                        url: 'http://localhost/rengganis/upload_templib/upload_templib/delete',
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
                                                    $('#delete_file_document').unbind('click');
                                                    $('#document').val('');
                                                    $('#delete_file_document').addClass('d-none');
                                                    $('#btn_document_uploader').removeClass('d-none');
                                                    $('#img-preview_document').addClass('d-none');
                                                    $('#pdf-preview_document').addClass('d-none');
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
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">

                </div>
            </div>
            <input type="submit" name="save" value="simpan" id="save-button" class="btn btn-primary" />
            <a href="<?=base_url('item')?>" id="back-button" class="btn btn-secondary">batal</a>
        </form>
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


    });

    $('#formlib_form').submit(function(e) {
        e.preventDefault();
        JsLoadingOverlay.show();
        $.ajax({
            url: '<?=base_url('item/import_submit/')?>', // Url to which the request is send
            type: "POST", // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function(data) // A function to be called if request succeeds
            {
                if (data.success) {
                    window.location = '<?=base_url('item')?>';
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