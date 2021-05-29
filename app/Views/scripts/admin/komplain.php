<script>
    <?php if (session('role') == 0) : ?>

        function listKomplain() {
            $.ajax({
                url: '<?= base_url('Admin/ShowKomplain'); ?>',
                beforeSend: function(f) {
                    $('#Komplain_AJAX').html(sloading);
                },
                success: function(data) {
                    $('#Komplain_AJAX').html(data);
                    $('#table_komplain').DataTable({
                        scrollY: '100vh',
                        scrollCollapse: true,
                        paging: false,
                        "order": [
                            [0, "desc"]
                        ]
                    });
                    PreviewKomplainImage();
                }
            });
        }

        function listArsipKomplain() {
            $.ajax({
                url: '<?= base_url('Admin/ShowKomplainArsip'); ?>',
                beforeSend: function(f) {
                    $('#KomplainArsip_AJAX').html(sloading);
                },
                success: function(data) {
                    $('#KomplainArsip_AJAX').html(data);
                    $('#table_komplainArsip').DataTable({
                        scrollY: '100vh',
                        scrollCollapse: true,
                        paging: false,
                        "order": [
                            [0, "desc"]
                        ]
                    });
                    PreviewKomplainImage();
                }
            });
        }

        // .......................... Form Komplain ..........................

        function DetailArsipKomplain(uid) {
            $('#Komplain_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/DetailArsipKomplain_Form'); ?>",
                beforeSend: function(data) {
                    $('#Komplain_Modal #Komplain_Header').removeClass("bg-kingucrimson");
                    $('#Komplain_Modal #Komplain_Header').removeClass("bg-softgreen");
                    $('#Komplain_Modal #Komplain_Header').addClass("bg-nanas");
                    $('#Komplain_Modal #Komplain_Label').html('<i class="fas fa-fw fa-archive"></i>  Detail Arsip Keluhan');
                },
                success: function(data) {
                    $('#Komplain_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Admin/GetUidArsipKomplain'); ?>',
                        data: {
                            "id_arsipKomp": uid
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var parsed = JSON.parse(JSON.stringify(data));
                            $('[name="id_komplain"]').val(data[0].id_arsipKomp);
                            $('[name="no_komplain"]').val(data[0].no_arsipKomp);
                            $('[name="nama_komplain"]').val(data[0].nama);
                            $('[name="waktuPekerja_komplain"]').val(data[0].waktu_arsipKomp);
                            $('[name="isi_komplain"]').val(data[0].isi_arsipKomp);
                            $('[name="email_komplain"]').val(data[0].email_arsipKomp);
                            $('[name="judul_komplain"]').val(data[0].judul_arsipKomp);
                            $("#Komplain_Image").attr("src", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_arsipKomp + "");
                            $("#Komplain_SRCIMG").attr("data-img", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_arsipKomp + "");
                            PreviewKomplainImage();
                            $.ajax({
                                url: '<?= base_url('Admin/GetAdminArsipKomplain'); ?>',
                                data: {
                                    "id_arsipKomp": uid
                                },
                                type: "POST",
                                dataType: "JSON",
                                success: function(data) {
                                    $('[name="admin_komplain"]').val(data[0].nama); //admin
                                    $('[name="waktuAdmin_komplain"]').val(data[0].commented_at);
                                    $('[name="admin_komplain"]').val(data[0].nama);
                                    if (data[0].status_arsipKomp == "accepted") {
                                        $('#statusVerifAdmin').html('<span class=" py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>');
                                    } else if (data[0].status_arsipKomp == "rejected") {
                                        $('#statusVerifAdmin').html('<span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>');
                                    } else {
                                        console.log('error admin status view');
                                    }
                                    $('[name="adminkomen_komplain"]').val(data[0].comment_arsipKomp);
                                },
                                error: function(data) {
                                    alert(' Operasi JOIN Show Admin AJAX Gagal :(');
                                }
                            });
                        },
                        error: function(data) {
                            alert(' Operasi Detail Arsip AJAX Gagal :(');
                        }
                    });
                },
                error: function(data) {
                    alert(' Operasi AJAX Gagal :(');
                }
            });
        }

        function AcceptKomplain(id) {
            $('#Komplain_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/AcceptKomplain_Form'); ?>",
                beforeSend: function(data) {
                    $('#Komplain_Modal #Komplain_Header').removeClass("bg-kingucrimson");
                    $('#Komplain_Modal #Komplain_Header').removeClass("bg-nanas");
                    $('#Komplain_Modal #Komplain_Header').addClass("bg-softgreen");
                    $('#Komplain_Modal #Komplain_Label').html('<i class="fas fa-fw fa-check-square"></i>  Terima Keluhan');
                },
                success: function(data) {
                    $('#Komplain_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Admin/GetIDKomplain'); ?>',
                        data: {
                            "id_komplain": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var parsed = JSON.parse(JSON.stringify(data));
                            $('[name="id_komplain"]').val(data[0].id_komplain);
                            $('[name="no_komplain"]').val(data[0].no_komplain);
                            $('[name="nama_komplain"]').val(data[0].nama);
                            $('[name="waktuPekerja_komplain"]').val(data[0].waktu_komplain);
                            $('[name="isi_komplain"]').val(data[0].isi_komplain);
                            $('[name="email_komplain"]').val(data[0].email_komplain);
                            $('[name="judul_komplain"]').val(data[0].judul_komplain);
                            $("#Komplain_Image").attr("src", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
                            $("#Komplain_SRCIMG").attr("data-img", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
                            PreviewKomplainImage();
                        }
                    });
                },
                error: function(data) {
                    alert(' Operasi AJAX Gagal :(');
                }
            });
        }

        function DeclineKomplain(id) {
            $('#Komplain_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/DeclineKomplain_Form'); ?>",
                beforeSend: function(data) {
                    $('#Komplain_Modal #Komplain_Header').removeClass("bg-softgreen");
                    $('#Komplain_Modal #Komplain_Header').removeClass("bg-nanas");
                    $('#Komplain_Modal #Komplain_Header').addClass("bg-kingucrimson");
                    $('#Komplain_Modal #Komplain_Label').html('<i class="fas fa-fw fa-window-close"></i>  Tolak Keluhan');
                },
                success: function(data) {
                    $('#Komplain_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Admin/GetIDKomplain'); ?>',
                        data: {
                            "id_komplain": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var parsed = JSON.parse(JSON.stringify(data));
                            $('[name="id_komplain"]').val(data[0].id_komplain);
                            $('[name="no_komplain"]').val(data[0].no_komplain);
                            $('[name="nama_komplain"]').val(data[0].nama);
                            $('[name="waktuPekerja_komplain"]').val(data[0].waktu_komplain);
                            $('[name="isi_komplain"]').val(data[0].isi_komplain);
                            $('[name="email_komplain"]').val(data[0].email_komplain);
                            $('[name="judul_komplain"]').val(data[0].judul_komplain);
                            $("#Komplain_Image").attr("src", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
                            $("#Komplain_SRCIMG").attr("data-img", "<?= base_url('../img/komplain'); ?>/" + data[0].foto_komplain + "");
                            PreviewKomplainImage();
                        }
                    });
                },
                error: function(data) {
                    alert(' Operasi AJAX Gagal :(');
                }
            });
        }

        // ..........................Aksi Komplain..........................
        $("#Komplain_Form").submit('click', function() {
            // e.preventDefault(); tidak berhasil
            $('#Komplain_Modal').modal('hide');
            let KomplainUrl = "<?= base_url('Admin/arsipKomplain'); ?>";
            $.ajax({
                url: KomplainUrl,
                type: "POST",
                data: $('#Komplain_Form').serialize(),
                success: function(data) {
                    $('#Komplain_Form').html(' ');
                    listKomplain();
                    listArsipKomplain();
                },
                error: function(data) {
                    alert('Operasi Ajax Gagal :(');
                }
            });
            return false;
        })

        // .......................... Custom Function Komplain ..........................

        function PreviewKomplainImage() {
            // get Bukti Image
            $('.btn-img-item').on('click', function() {
                // get img from tabel
                const img = $(this).data('img');

                // Set img to modal
                $('#gambarBukti img').attr('src', img);
                $('#Komplain_Modal').modal('hide');
            });
        }
    <?php endif; ?>
</script>