<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <h4 id="card-title">Download Template EXCEL</h4>
                <h4 id="card-title2" style="display: none;">UPLOAD DATA EXCEL</h4>
            </div>
            <div class="card-body">

                <div id="display-1" class="row">
                    <div class="col-12 text-center" style="min-height: 300px;">
                        <br><br>
                        <a href="<?= base_url('import/template/item.xlsx') ?>" class="btn btn-primary btn-lg">Download EXCEL Template</a>
                    </div>
                </div>

                <div id="display-2" class="row" style="display: none;">
                    <div class="col-4" style="min-height: 300px;">
                        <?= form_open_multipart('#', ' id="form_import_item" ') ?>
                        <div class="form-group">
                            <label for="truncate_table">Hapus Semua Data ?</label>
                            <?= form_dropdown('truncate_table', [null => '-- Pilih Salah Satu --', 'Y' => 'Ya', 'N' => 'Tidak'], [], ' class="form-control" ') ?>
                        </div>
                        <div class="form-group">
                            <label for="excel_import">EXCEL FILE</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="excel_import" class="custom-file-input" id="excel_import">
                                    <label class="custom-file-label" for="excel_import">Choose File</label>
                                </div>
                                <div class="input-group-append">
                                    <span id="excel_file_import_clear" class="btn btn-secondary">Clear</span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Upload</button>
                        <?= form_close() ?>
                    </div>
                    <div class="col-4" style="min-height: 300px;">
                    </div>
                    <div class="col-4" style="min-height: 300px;">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <span style="display: none;" id="prev-btn" class="float-left btn btn-primary btn-lg">PREVIOUS</span>
                <span id="next-btn" class="float-right btn btn-primary btn-lg">NEXT</span>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#next-btn').click(function() {
            $('#prev-btn').show();
            $(this).hide();


            $('#display-1').hide();
            $('#display-2').show();

            $('#card-title').hide();
            $('#card-title2').show();
        });
        $('#prev-btn').click(function() {
            $('#next-btn').show();
            $(this).hide();

            $('#display-2').hide();
            $('#display-1').show();

            $('#card-title').show();
            $('#card-title2').hide();
        });

        $('#excel_file_import_clear').click(function(){
            $('input[name=excel_import]').val(null);
            $('label.custom-file-label[for=excel_import]').html('');
        });

        // $('.select2-formtemplib').each(function() {
        // console.log( $(this).attr('id') );
        // var idselect = $(this).attr('id');
        // var placeholder = $('#' + idselect).attr('placeholder');
        $('select[name=truncate_table]').select2({
            allowClear: true,
            placeholder: 'select ...'
        });
        // });

        bsCustomFileInput.init();

        $('#form_import_item').submit(function(e) {
            e.preventDefault();
            JsLoadingOverlay.show();
            $.ajax({
                url: '<?= base_url('item/import_submit') ?>', // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) // A function to be called if request succeeds
                {
                    if (data.success) {
                        window.location = '<?= base_url('item/') ?>';
                        console.log(data);
                    } else {
                        toastr.error(data.message);
                        // error_data_hanlder(data.error);
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


    });
</script>