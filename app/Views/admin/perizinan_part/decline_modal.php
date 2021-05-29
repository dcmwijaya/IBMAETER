<div class="modal-body pt-1">
    <?= csrf_field(); ?>
    <div class="row">
        <!-- part 1 -->
        <div class="col-sm-6 px-4">
            <div class="form-group">
                <i class="fas fa-fw fa-paperclip" style="color:red;"></i> <small>Berikut detail permintaan perizinan yang diajukan oleh pekerja</small>
                <hr class="mt-0 mb-2">
                <label for="Nama"><strong><i class="fas fa-fw fa-box"></i> Nama Barang</strong></label>
                <input type="text" class="form-control" id="Nama" name="perizinan_nama" readonly>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="row">
                        <label for="UbahStok" class="col-sm-4 col-form-label py-0"><strong><i class="fas fa-fw fa-cubes"></i> Stok</strong></label>
                        <div class="col-sm-8">
                            <input type="number" name="perizinan_stok" readonly class="form-control text-center" id="UbahStok">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="col-sm-5"><strong><i class="fas fa-fw fa-dolly-flatbed"></i> Request</strong> </label>
                        <div class="col-sm-7" id="RequestType">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="row">
                        <label for="Room" class="col-sm-5 col-form-label py-0"><strong><i class="fas fa-fw fa-warehouse"></i> Gudang</strong></label>
                        <div class="col-sm-7">
                            <input type="text" name="perizinan_room" readonly class="form-control text-center" id="Room">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="col-sm-4" id="Jenis"><strong><i class="fas fa-fw fa-th-list"></i> Jenis</strong> </label>
                        <div class="col-sm-8">
                            <input type="text" name="perizinan_jenis" readonly class="form-control text-center" id="Jenis">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-12">
                    <div class="row">
                        <label for="Pekerja" class="col-sm-4 col-form-label py-0"><strong><i class="fas fa-fw fa-id-card-alt"></i> Nama Pekerja</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Pekerja" name="perizinan_pekerja" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <div class="row">
                        <label for="Tgl" class="col-sm-4 col-form-label py-0"><strong><i class="fas fa-fw fa-calendar-alt"></i> Tanggal & Waktu</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Tgl" name="perizinan_waktu" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="Ket" class=""><strong><i class="fas fa-fw fa-comment-dots"></i> Pesan Operator</strong></label>
                    <textarea class="col-sm-12" id="Ket" rows="4" name="perizinan_ket" readonly></textarea>
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
                <textarea class="col-sm-12 p-2 <?= ($validation->hasError('komen')) ? 'is-invalid' : ''; ?>" id="acc_komentar" name="perizinan_komen" placeholder="Tuliskan Komentar Anda bila perlu" value="<?= (old('komen')) ? old('komen') : ""; ?>"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('komen'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="perizinan_no_log">
        <input type="hidden" name="perizinan_status" value="Ditolak">
        <button type="button" class="btn btn-danger modal-dismiss btn-modal-close" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Tolak</button>
    </div>
</div>