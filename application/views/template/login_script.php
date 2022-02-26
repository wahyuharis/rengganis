<script>
  $(document).ready(function() {

    $('#login_form').submit(function(e) {
      e.preventDefault();
      JsLoadingOverlay.show();
      $.ajax({
        url: '<?= base_url('login/submit/') ?>',
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
          console.log(data);
          if (!data['success']) {
            toastr.error(data['html_message'], 'Maaf');
          } else {
            window.location.href = '<?= base_url('home/') ?>'
          }
          JsLoadingOverlay.hide();
        },
        error: function(xhr, res) {
          toastr.error('Terjadi kesalahan', 'Maaf');

          JsLoadingOverlay.hide();
        }
      });

    });


    <?php if ( strlen( $this->session->flashdata('error_message')) > 0) { ?>

      toastr.error('<?= $this->session->flashdata('error_message') ?>','Maaf');

    <?php } ?>

  });
</script>