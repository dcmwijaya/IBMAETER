<?= csrf_field(); ?>
<div class="modal-body row">
    <!-- part 1 -->
    <div class="col-sm-6 px-4">
        <div class="form-group">
            <i class="fas fa-fw fa-clipboard-list" style="color:green;"></i> <small>Berikut detail keluhan yang diajukan oleh pekerja</small>
            <hr class="mt-0 mb-2">
            <label for="Nama"><strong><i class="fas fa-fw fa-user"></i> Nama Pekerja</strong></label>
            <input type="text" class="form-control" id="Nama" name="nama_komplain" readonly>
        </div>
        <hr>
        <div class="form-group">
            <label for="Room"><strong><i class="fas fa-fw fa-hashtag"></i> Perihal Keluhan</strong></label>
            <input type="text" name="judul_komplain" readonly class="form-control" id="Room">
        </div>
        <div class="form-group">
            <label for="Ket" class=""><strong><i class="fas fa-fw fa-comment-dots"></i> Isi Keluhan</strong></label>
            <textarea class="col-sm-12" id="Ket" rows="4" name="isi_komplain" readonly></textarea>
        </div>
        <div class="form-group">
            <label for="Pekerja"><strong><i class="fas fa-fw fa-image"></i> Bukti Keluhan</strong></label>
            <button type="button" class="btn btn-sm btn-img-item px-2 " data-img="<?= base_url('../img/komplain/'); ?>" data-toggle="modal" data-target="#gambarBukti">
                <img src="<?= base_url('../img/komplain/'); ?>" width="150" height="auto">
            </button>
        </div>
    </div>
    <!-- part 2 -->
    <div class="col-6 pt-1 border-left">
        <div class="form-group row">
            <h5><i class="fas fa-fw fa-pen-square" style="color:green;"></i> Terima Keluhan</h5>
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
    <input type="hidden" name="id_komplain">
    <input type="hidden" id="acc-nomor" name="no_komplain">
    <input type="hidden" id="dec-status" name="status" value="accepted">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" class="btn btn-primary"><i class="fas fa-check-square fa-fw"></i> Selesai</button>
</div>