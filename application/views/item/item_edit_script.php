<script>
    $(document).ready(function() {
        $('#harga_jual').keyup(function() {
            num = $(this).val();
            num = numeral(num).format();
            $(this).val(num);
        });

        $('#harga_beli').keyup(function() {
            num = $(this).val();
            num = numeral(num).format();
            $(this).val(num);
        });

        num = $('#harga_jual').val();
        num = numeral(num).format();
        $('#harga_jual').val(num);

        num = $('#harga_beli').val();
        num = numeral(num).format();
        $('#harga_beli').val(num);

        // alert('hello');
    });
</script>