<script>
    function listPerizinan() {
        $.ajax({
            url: '<?= base_url('Menu/ShowPerizinan'); ?>',
            beforeSend: function(f) {
                $('#Perizinan_AJAX').html(sloading);
            },
            success: function(data) {
                $('#Perizinan_AJAX').html(data);
                $('#table_perizinan').DataTable({
                    scrollY: '100vh',
                    scrollCollapse: true,
                    paging: false,
                    "order": [
                        [0, "desc"]
                    ]
                });
            }
        });
    }

    <?php if (session('role') == 0) : ?>

        function AcceptPerizinan(id) {
            $('#Perizinan_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/AcceptPerizinan_Form'); ?>",
                beforeSend: function(data) {
                    $('#Perizinan_Modal #Perizinan_Header').removeClass("bg-kingucrimson");
                    $('#Perizinan_Modal #Perizinan_Header').addClass("bg-softgreen");
                    $('#Perizinan_Modal #Perizinan_Label').html('<i class="fas fa-fw fa-check-square"></i>  Terima Izin Data Barang Masuk');
                },
                success: function(data) {
                    $('#Perizinan_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Admin/GetPerizinan'); ?>',
                        data: {
                            "no_log": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            // var parsed = JSON.parse(JSON.stringify(data));
                            $('[name="perizinan_no_log"]').val(data[0].no_log);
                            $('[name="perizinan_nama"]').val(data[0].nama_item);
                            $('[name="perizinan_stok"]').val(data[0].ubah_stok);
                            RequestBarangType(data[0].request);
                            $('[name="perizinan_room"]').val(data[0].penyimpanan);
                            $('[name="perizinan_jenis"]').val(data[0].jenis);
                            $('[name="perizinan_pekerja"]').val(data[0].nama);
                            $('[name="perizinan_waktu"]').val(data[0].tgl);
                            $('[name="perizinan_ket"]').text(data[0].ket);
                        }
                    });
                },
                error: function(data) {
                    alert(' Operasi AJAX Gagal :(');
                }
            });
        }

        function DeclinePerizinan(id) {
            $('#Perizinan_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/DeclinePerizinan_Form'); ?>",
                beforeSend: function(data) {
                    $('#Perizinan_Modal #Perizinan_Header').removeClass("bg-softgreen");
                    $('#Perizinan_Modal #Perizinan_Header').addClass("bg-kingucrimson");
                    $('#Perizinan_Modal #Perizinan_Label').html('<i class="fas fa-fw fa-window-close" style="transform: rotateY(180deg);"></i>  Tolak Izin Data Barang Masuk');
                },
                success: function(data) {
                    $('#Perizinan_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Admin/GetPerizinan'); ?>',
                        data: {
                            "no_log": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            // var parsed = JSON.parse(JSON.stringify(data));
                            $('[name="perizinan_no_log"]').val(data[0].no_log);
                            $('[name="perizinan_nama"]').val(data[0].nama_item);
                            $('[name="perizinan_stok"]').val(data[0].ubah_stok);
                            RequestBarangType(data[0].request);
                            $('[name="perizinan_room"]').val(data[0].penyimpanan);
                            $('[name="perizinan_jenis"]').val(data[0].jenis);
                            $('[name="perizinan_pekerja"]').val(data[0].nama);
                            $('[name="perizinan_waktu"]').val(data[0].tgl);
                            $('[name="perizinan_ket"]').text(data[0].ket);
                        }
                    });
                },
                error: function(data) {
                    alert('Operasi Ajax Gagal :(');
                }
            });
        }

        // Aksi perizinan
        $("#Perizinan_Form").submit('click', function() {
            // e.preventDefault(); tidak berhasil
            $('#Perizinan_Modal').modal('hide');
            let PerizinanUrl = "<?= base_url('Admin/AksiPerizinan'); ?>";
            $.ajax({
                url: PerizinanUrl,
                type: "POST",
                data: $('#Perizinan_Form').serialize(),
                success: function(data) {
                    $('#Perizinan_Form').html(' ');
                    listPerizinan();
                    listItem();
                },
                error: function(data) {
                    alert('Operasi Ajax Gagal :(');
                }
            });
            return false;
        })


        // ..........................Custom Function Perizinan.........................>
        function RequestBarangType(reqType) {
            if (reqType == "Masuk") {
                $('#RequestType').html(`<span class="py-2 badge badge-success" style="font-size: 15px;"><i class="fas fa-fw fa-long-arrow-alt-up text-light"></i> ${reqType}</span>`);
            } else {
                $('#RequestType').html(`<span class="py-2 badge badge-danger" style="font-size: 15px;"><i class="fas fa-fw fa-long-arrow-alt-down text-light"></i> ${reqType}</span>`);
            }
        }
    <?php endif; ?>
</script>