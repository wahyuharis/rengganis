<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $card_title ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php if ($add_url) { ?>
                    <a id="btn_add_def" href="<?= $add_url ?>" class="btn btn-primary"> Add </a>

                <?php } ?>

                <table id="dtt_table" class="table table-bordered table-striped">
                    <thead>
                        <?php foreach ($thead as $th) { ?>
                            <th><?= $th ?></th>
                        <?php } ?>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        var table = $('#dtt_table').DataTable({
            "dom": "<'row mb-4'<'col-6 add_btn_class'><'col-6 text-right'B>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "buttons": ["copy", "csv", "excel", "pdf"],
            "pagingType": "full",
            "serverSide": true,
            "processing": true,
            "order": [
                [1, "desc"]
            ],
            'ajax': {
                'url': '<?= base_url($url_serverside)  ?>',
            },
            columnDefs: [{
                "orderable": false,
                "searchable": false,
                "targets": 0
            }],
            "drawCallback": function(settings) {
                delete_handler();
            },
            "initComplete": function(settings, json) {
                $('#btn_add_def').appendTo('.add_btn_class');
            },
            "language": {
                "loadingRecords": '<h1><i class="fas fa-spinner fa-spin"></i></h1>',
                "processing": '<h1><i class="fas fa-spinner fa-spin"></i></h1>',
                "paginate": {
                    "first": '<i class="fas fa-angle-double-left"></i>',
                    "last": '<i class="fas fa-angle-double-right"></i>',
                    "next": '<i class="fas fa-angle-right"></i>',
                    "previous": '<i class="fas fa-angle-left"></i>'
                }
            }
        });

        <?php if ($filter_form_id) { ?>
            $('<?= $filter_form_id ?>').submit(function(e) {
                e.preventDefault();

                filter_data = $(this).serialize();

                table.ajax.url('<?= base_url($url_serverside)  ?>' + '?' + filter_data).load();
            });
        <?php } ?>


        function delete_handler() {
            $('.delete_handler').click(function(e) {
                var delete_id = $(this).attr('delete_id');
                var submituri = $(this).attr('delete_action')
                // console.log(submituri);

                bootbox.confirm({
                    message: "Yakin Menghapus Data ?",
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-default'
                        }
                    },
                    callback: function(result) {
                        console.log('This was logged in the callback: ' + result);
                        if (result) {
                            $.ajax({
                                dataType: "json",
                                url: submituri,
                                data: {
                                    'id': delete_id
                                },
                                success: function(data) {
                                    toastr.success("Data succes Deleted");
                                    table.ajax.reload();
                                },
                                error: function(err) {
                                    toastr.error("Terjadi Kesalahan");
                                }
                            });
                        }
                    }
                });

            });

        }
    });
</script>