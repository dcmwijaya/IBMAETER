<div class="modal-body pt-1">
    <?= csrf_field(); ?>
    <div class="row">
        <!-- part 1 -->
        <div class="col-sm-6 px-4">
            <div class="form-group">
                <i class="fas fa-fw fa-paperclip" style="color:crimson;"></i> <small>Berikut detail permintaan perizinan yang diajukan oleh pekerja</small>
                <hr class="mt-0 mb-2">
                <label for="TolakNama"><strong>Nama Barang</strong></label>
                <input type="text" class="form-control" id="TolakNama" readonly>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="row">
                        <label for="TolakUbahStok" class="col-sm-4 col-form-label py-0"><strong>Stok</strong></label>
                        <div class="col-sm-8">
                            <input type="number" readonly class="form-control text-center" id="TolakUbahStok">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="my-0 col-sm-5"><strong>Request</strong> </label>
                        <span class="col-sm-5" id="TolakReqs"></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <div class="row">
                        <label for="TolakPekerja" class="col-sm-4 col-form-label py-0"><strong>Nama Pekerja</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="TolakPekerja" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <div class="row">
                        <label for="TolakTgl" class="col-sm-4 col-form-label py-0"><strong>Tanggal & Waktu</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="TolakTgl" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <textarea class="col-sm-12" id="TolakKet" rows="4" readonly></textarea>
                </div>
            </div>
        </div>
        <!-- part 2 -->
        <div class="col-6 pt-1">
            <div class="form-group row">
                <h5><i class="fas fa-fw fa-pen-square" style="color:crimson;"></i> Kelola Perizinan</h5>
            </div>
            <hr class="mt-0 mb-2">
            <div class="form-group">
                <label for="acc_komentar"><strong>Tambahkan Komentar</strong></label>
                <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="komen" placeholder="Tuliskan Komentar Anda bila perlu" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('komen'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="dec-nomor" name="no_log">
        <input type="hidden" id="rejected" name="status" value="Ditolak">
        <input type="hidden" id="dec-reqs" name="reqs">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Tolak</button>
    </div>
</div>