<?= csrf_field(); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6 border-left">
            <div class="row px-3">
                <div class="form-group">
                    <label for="InInfo"><b><i class="fas fa-fw fa-box"></i> Nama Barang</b></label>
                    <input type="text" class="text-center form-control disabled" name="InOutItem_Name" disabled>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="RequestIn" class="font-weight-bold col-12 pl-0"><i class="fas fa-fw fa-dolly"></i> Request Barang </label>
                            <div class="requeststok text-center">
                                <span class="py-2 badge badge-danger" style="font-size: 16px;"><i class="fas fa-fw fa-long-arrow-alt-down text-light"></i> Keluar</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label><b><i class="fas fa-fw fa-th-list"></i> Stok Barang Saat Ini</b></label>
                            <input type="number" class="text-center form-control disabled" name="Live_Stock" disabled>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="form-group">
                    <label for="InRange" class="font-weight-bold"><i class="fas fa-fw fa-cubes"></i> Masukan Jumlah Stok Barang Yang Masuk</label>
                    <script>
                        function updateRangeInput(elem) {
                            $(elem).next().val($(elem).val());
                        }
                    </script>
                    <input type="range" class="form-control-range" id="InRange" min="0" max="100" oninput="updateRangeInput(this)" style="cursor: pointer;">
                    <input type="number" class="text-center form-control my-3" name="jumlah_out" required autofocus>
                    <small class="text-muted"><span style="color: red;">*</span> Geser Slider Max 100 Barang</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 border-left">
            <div class="form-group">
                <label for="OutTime" class="font-weight-bold"><i class="fas fa-fw fa-calendar-alt"></i> Date and time</label>
                <input type="datetime-local" class="form-control" value="" id="OutTime" name="tgl" required>
            </div>
            <div class="form-group">
                <label for="OutInfo"><b><i class="fas fa-fw fa-comment-dots"></i> Keterangan</b></label>
                <textarea class="form-control" id="OutInfo" rows="6" name="ket" placeholder="Sampaikan isi Keterangan...&#10;" required></textarea>
                <small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="OutNamaPost" class="form-control" name="InOut_Id_Item">
        <button type="button" class="btn btn-danger btn-modal-close shadow-sm" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
        <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-fw fa-check"></i> Keluarkan</button>
    </div>
</div>