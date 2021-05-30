<script>
    function listPengaduan() {
        $.ajax({
            url: '<?= base_url('Menu/ShowPengaduanKomplainArsip'); ?>',
            beforeSend: function(f) {
                $('#Pengaduan_AJAX').html(sloading);
            },
            success: function(data) {
                $('#Pengaduan_AJAX').html(data);
                $('#table_PengaduanKomplainArsip').DataTable({
                    scrollY: '100vh',
                    scrollCollapse: true,
                    paging: false,
                    "order": [
                        [0, "desc"]
                    ]
                });
                PreviewPengaduanImage();
            }
        });
    }

    function DetailPengaduan(uid) {
        $('#Pengaduan_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Menu/DetailPengaduan_Form'); ?>",
            beforeSend: function(data) {
                $('#Pengaduan_Modal #Pengaduan_Header').removeClass("bg-kingucrimson");
                $('#Pengaduan_Modal #Pengaduan_Header').removeClass("bg-softgreen");
                $('#Pengaduan_Modal #Pengaduan_Header').addClass("bg-nanas");
                $('#Pengaduan_Modal #Pengaduan_Label').html('<i class="fas fa-fw fa-archive"></i> Detail Arsip Keluhan');
            },
            success: function(data) {
                $('#Pengaduan_FormQ').html(data);
                PengaduanModalClose();
                $.ajax({
                    url: '<?= base_url('Menu/GetUidPengaduanArsipKomplain'); ?>',
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
                        PreviewPengaduanImage();
                        PengaduanDilihat(data[0].no_arsipKomp);
                        $.ajax({
                            url: '<?= base_url('Menu/GetPengaduanAdminArsipKomplain'); ?>',
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

    function PengaduanDilihat(no_pengaduan) {
        // $(".btn-lihat").one("click", function() {
        $.ajax({
            url: '<?= base_url('Menu/PengaduanDilihat'); ?>',
            type: "POST",
            data: {
                no_pengaduan: no_pengaduan
            },
            success: function(data) {
                $.ajax({
                    url: '<?= base_url('Menu/CountKomplainVisibilityDilihat'); ?>',
                    type: "POST",
                    success: function(data) {
                        $(`#statusPengaduanIndicator${no_pengaduan}`).html('<span class="ml-4 py-1 badge bg-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>Baru Dilihat</span>');
                        if (data.totalcount > 0) {
                            $('#SidebarPengaduanCounter').html(data.totalcount);
                            // $('#CounterPengumumanUid').html(`${data.totalcount} Notifikasi Baru!`);
                            // $('#NavbarCounterPengumuman').html(`<span class="custom-indicator badge-danger badge-counter">${data.totalcount}</span>`);
                            // $.ajax({
                            //     url: '<?= base_url('Menu/UpdateListDilihat'); ?>',
                            //     type: "POST",
                            //     success: function(data) {
                            //         $('#ListNotifikasiExp').html(data);
                            //     }
                            // });
                        } else {
                            $('#SidebarPengaduanCounter').html('');
                            // $('#CounterPengumumanUid').html(`Tidak Ada Notifikasi`);
                            // $('#NavbarCounterPengumuman').html('');
                            // $('#ListNotifikasiExp').html('');
                        }
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(' Operasi AJAX Gagal :(');
            }
        });
    }

    // .......................... Custom Function Komplain ..........................

    function PreviewPengaduanImage() {
        // get Bukti Image
        $('.btn-img-item').on('click', function() {
            // get img from tabel
            const img = $(this).data('img');

            // Set img to modal
            $('#gambarBukti img').attr('src', img);
            $('#Pengaduan_Modal').modal('hide');
        });
    }
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
                success: function(data) {
                    // set invalid
                    if (data.success == false) {
                        // nama
                        if (data.judul != "") {
                            $('[name="judul"]').addClass("is-invalid");
                            $('#error_judul').html(data.judul);
                        } else {
                            $('[name="judul"]').removeClass("is-invalid");
                        }
                        // email
                        if (data.isi != "") {
                            $('[name="isi"]').addClass("is-invalid");
                            $('#error_isi').html(data.isi);
                        } else {
                            $('[name="isi"]').removeClass("is-invalid");
                        }
                        // password (tambah form)
                        if (data.foto != "") {
                            $('[name="foto"]').addClass("is-invalid");
                            $('#error_foto').html(data.foto);
                            alert('file yang anda masukan bukan gambar ! harap masukkan sesuai format file gambar');
                        } else {
                            $('[name="foto"]').removeClass("is-invalid");
                        }
                    } else {
                        $('#toast_alert').html(`
                        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 1500; right: 0; bottom: 0;">
                            <div class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true" autohide: false>
                                <div class="toast-body bg-light">
                                    <div class="notif-success"><i class="fas fa-fw fa-check-circle text-green mr-2"></i>Pengaduan Berhasil Dikirim !</div>
                                </div>
                            </div>
                        </div>
                        `);
                        $('#AlertPengaduan').html(`
                            <div class="alert alert-success" role="alert">
                                <div class="text-center">Pengaduan akan diproses oleh admin. Harap menunggu keputusan dari Admin</div>
                            </div>
                        `)
                        $('.toast').toast('show');
                        $(".btn-toast-close").on("click", function() {
                            $('.toast').toast('hide');
                        });
                        // setTimeout(function() {
                        //     $('#toast_alert').html('');
                        // }, 1000);
                        PengaduanForm();
                    }
                },
                error: function(data) {
                    alert('Operasi Ajax Gagal :(');
                    $('#AlertPengaduan').html(`
                        <div class="alert alert-danger" role="alert">
                            <div>Harap mengisikan data dengan benar !</div>
			            </div>
                    `)
                }
            });
            // return false;
        });
    });
</script>