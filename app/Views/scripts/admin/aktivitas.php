<script>
    $(document).ready(function() {
        // get Accept Absensi
        $('.btn-acc-izin').on('click', function() {
            // mengambil data id_absen
            var idIzin = $(this).data('idizin');

            // Set data ke modal Form accept
            $('#acc-izin').val(idIzin);
        });

        // get Decline Absensi 
        $('.btn-rjc-izin').on('click', function() {
            // mengambil data id_absen
            var idIzin = $(this).data('idizin');

            // Set data ke modal Form decline
            $('#dec-izin').val(idIzin);
        });

        // get Bukti Image
        $('.btn-img-izin').on('click', function() {
            // get img from tabel
            const img = $(this).data('img');

            // Set img to modal
            $('#buktiIzin img').attr('src', img);
            // $('#Komplain_Modal').modal('hide');
        });
    });
</script>