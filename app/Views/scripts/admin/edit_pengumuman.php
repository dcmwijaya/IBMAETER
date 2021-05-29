<script>
    function listPengumuman() {
        $.ajax({
            url: '<?= base_url('Admin/ShowPengumuman'); ?>',
            beforeSend: function(f) {
                $('#Reload_AJAX').html(sloading);
            },
            success: function(data) {
                $('#Reload_AJAX').html(data);
                $('#table_pengumuman').DataTable({
                    scrollY: '100vh',
                    scrollCollapse: true,
                    paging: false,
                    "order": [
                        [0, "desc"]
                    ],
                    "columnDefs": [{
                        "width": "20%",
                        "targets": 1
                    }]
                });
            }
        });
    }

    let PengumumanSaveType; // Tumbal Operan :'v

    function showTambahmodal() {
        PengumumanSaveType = "Tambah";
        $('#Pengumuman_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Admin/TambahPengumuman_Form'); ?>",
            beforeSend: function(data) {
                $('#Pengumuman_Icon').removeClass("fa-folder-open");
                $('#Pengumuman_Icon').addClass("fa-folder-plus");
                $('#Pengumuman_Header').removeClass("bg-dark");
                $('#Pengumuman_Header').addClass("bg-softblue");
                $('#Modal_Title').text(' Tambah Pengumuman');
            },
            success: function(data) {
                $('#Pengumuman_Form').html(data);
                PengumumanModalClose();
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    function showDeleteModal(id) {
        PengumumanSaveType = "Delete";
        $('#Pengumuman_Modal').modal('show');
        $.ajax({
            url: "<?= base_url('Admin/DeletePengumuman_Form'); ?>",
            beforeSend: function(data) {
                $('#Pengumuman_Icon').removeClass("fa-folder-plus");
                $('#Pengumuman_Icon').addClass("fa-folder-open");
                $('#Pengumuman_Header').removeClass("bg-softblue");
                $('#Pengumuman_Header').addClass("bg-dark");
                $('#Modal_Title').text(' Hapus Pengumuman');
            },
            success: function(data) {
                $('#Pengumuman_Form').html(data);
                $.ajax({
                    url: '<?= base_url('Admin/GetIdPengumuman'); ?>',
                    data: {
                        "id_pengumuman": id
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_pengumuman"]').val(data.id_pengumuman);
                        $('[name="judul"]').val(data.judul);
                        $('[name="isi"]').text(data.isi);
                    }
                });
                PengumumanModalClose();
            }
        });
    }

    $("#Pengumuman_Form").submit('click', function() {
        // e.preventDefault(); tidak berhasil
        $('#Pengumuman_Modal').modal('hide');
        let url;
        if (PengumumanSaveType == "Tambah") {
            url = "<?= base_url('Admin/TambahPengumuman'); ?>";
        } else if (PengumumanSaveType == "Delete") {
            url = "<?= base_url('Admin/DeletePengumuman'); ?>";
        }
        $.ajax({
            url: url,
            type: "POST",
            data: $('#Pengumuman_Form').serialize(),
            success: function(data) {
                $('#Pengumuman_Form').html(' ');
                listPengumuman();
            }
        });
        return false;
    })

    function infoClear() {
        // Set data to Form input
        let url = '<?= base_url('Admin/BlankPengumuman_Form'); ?>';
        let jpholder;
        if (PengumumanSaveType == "Tambah") {
            jpholder = "Tambah Judul Pengumuman...";
        } else if (PengumumanSaveType == "Edit") {
            jpholder = "Edit Judul Pengumuman...";
        }
        $.ajax({
            url: url,
            type: "POST",
            success: function(data) {
                $('#PengumumanF_Input').html(data);
                $('#pengumuman_judul').attr('placeholder', jpholder);
            }
        });
    }
</script>