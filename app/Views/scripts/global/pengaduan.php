<script>
    $(document).ready(function() {
        const PengaduanScript = "<?= base_url('../js/dragdrop.js'); ?>";

        function PengaduanForm() {
            // $('#Komplain_Modal').modal('show');
            $.ajax({
                url: "<?= base_url('Menu/PengaduanForm'); ?>",
                type: "POST",
                success: function(data) {
                    $('#Pengaduan_Form').html(data);
                    $.getScript(PengaduanScript);
                },
                error: function(data) {
                    alert(' Operasi AJAX Gagal :(');
                }
            });
        }
        PengaduanForm();

        // ..........................Aksi Pengaduan..........................

        $("#Pengaduan_Form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Menu/adukan'); ?>",
                type: "POST",
                // data: $('#Pengaduan_Form').serialize(),
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(adukan) {
                    alert('Data Terkirim !');
                    // $('[name="judul"]').val('');
                    // $('[name="isi"]').val('');
                    // $('[name="foto"]').val(null);
                    // $('.drop-zone__thumb').attr('style', null);
                    PengaduanForm();
                },
                error: function(data) {
                    alert('Operasi Ajax Gagal :(');
                }
            });
            // return false;
        });
    });
</script>