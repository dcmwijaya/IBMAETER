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
                $('#toast_alert').html(`
				<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 1500; right: 0; bottom: 0;">
				    <div class="toast bg-transparent" role="alert" aria-live="assertive" aria-atomic="true" autohide: false>
						<div class="toast-body bg-transparent">${data.msg}</div>
					</div>
				</div>
				`);
                $('.toast').toast('show');
                $(".btn-toast-close").on("click", function() {
                    $('.toast').toast('hide');
                });
                $.ajax({
                    url: '<?= base_url('Menu/CountDilihat'); ?>',
                    type: "POST",
                    success: function(data) {
                        if (data.totalcount > 0) {
                            $('#CounterPengumumanUid').html(`${data.totalcount} Notifikasi Baru!`);
                            $('.custom-indicator').html(data.totalcount);
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
                            $('.custom-indicator').html('');
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