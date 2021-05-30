<script>
    function PengumumanDilihat(id_pengumuman) {
        // $(".btn-lihat").one("click", function() {
        $.ajax({
            url: '<?= base_url('Menu/PengumumanDilihat'); ?>',
            type: "POST",
            data: {
                id_pengumuman: id_pengumuman
            },
            success: function(data) {
                $(`#statusIndicator${id_pengumuman}`).html('<span class="ml-4 py-1 badge bg-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>Baru Dilihat</span>');
                $.ajax({
                    url: '<?= base_url('Menu/CountDilihat'); ?>',
                    type: "POST",
                    success: function(data) {
                        if (data.totalcount > 0) {
                            $('#CounterPengumumanUid').html(`${data.totalcount} Notifikasi Baru!`);
                            $('#NavbarCounterPengumuman').html(`<span class="custom-indicator badge-danger badge-counter">${data.totalcount}</span>`);
                            $('#SidebarPengumumanCounter').html(data.totalcount);
                            $.ajax({
                                url: '<?= base_url('Menu/UpdateListDilihat'); ?>',
                                type: "POST",
                                success: function(data) {
                                    $('#ListNotifikasiExp').html(data);
                                }
                            });
                        } else {
                            $('#CounterPengumumanUid').html(`Tidak Ada Notifikasi`);
                            $('#NavbarCounterPengumuman').html('');
                            $('#SidebarPengumumanCounter').html('');
                            $('#ListNotifikasiExp').html('');
                        }
                    }
                });
            }
            // });
        });
    }
</script>