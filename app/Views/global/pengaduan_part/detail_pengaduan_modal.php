<?= csrf_field(); ?>
<div class="modal-body row">
    <!-- part 1 -->
    <div class="col-sm-6 px-4">
        <div class="form-group">
            <i class="fas fa-fw fa-file-archive" style="color:#ff7500;"></i> <small>Berikut hasil detail keluhan yang diajukan oleh Anda</small>
            <hr class="mt-0 mb-2">
            <label for="Nama"><strong><i class="fas fa-fw fa-user"></i> Nama Pekerja</strong></label>
            <input type="text" class="form-control" id="Nama" name="nama_komplain" readonly>
        </div>
        <div class="form-group">
            <label for="waktuPekerjaKomplain"><strong><i class="fas fa-fw fa-calendar-alt"></i> Waktu Pengaduan</strong></label>
            <input type="text" name="waktuPekerja_komplain" readonly class="form-control" id="waktuPekerjaKomplain">
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
            <label for="Pekerja" class="row"><strong><i class="fas fa-fw fa-image"></i> Bukti Keluhan</strong></label>
            <span class="col-12">
                <button type="button" id="Komplain_SRCIMG" class="btn btn-sm btn-img-item shadow-sm mx-auto row" data-img="<?= base_url('../img/komplain/'); ?>" data-toggle="modal" data-target="#gambarBukti">
                    <img id="Komplain_Image" src="" width="150" height="auto">
                </button>
            </span>
        </div>
    </div>
    <!-- part 2 -->
    <div class="col-sm-6 pt-1 border-left">
        <div class="form-group row">
            <h5><i class="fas fa-fw fa-folder-open" style="color:#ff7500;"></i> Detail Keputusan Keluhan</h5>
        </div>
        <hr class="mt-0 mb-2">
        <div class="form-group">
            <label for="waktuAdminKomplain"><strong><i class="fas fa-fw fa-calendar"></i> Waktu Admin Menjawab Keluhan</strong></label>
            <input type="text" name="waktuAdmin_komplain" readonly class="form-control" id="waktuAdminKomplain">
        </div>
        <div class="form-group">
            <label for="noKomplain"><strong><i class="fas fa-fw fa-hashtag"></i> Kode Arsip Keluhan</strong></label>
            <input type="text" name="no_komplain" readonly class="form-control" id="noKomplain">
        </div>
        <div class="form-group">
            <label for="adminKomplain"><strong><i class="fas fa-fw fa-user-tie"></i> Admin Yang Memproses</strong></label>
            <input type="text" name="admin_komplain" readonly class="form-control" id="adminKomplain">
        </div>
        <div class="form-group">
            <label for="statusKomplain"><strong><i class="fas fa-fw fa-question-circle"></i> Status</strong></label>
            <span id="statusVerifAdmin" class="ml-5"></span>
            <!-- <input type="text" name="status_komplain" readonly class="form-control" id="statusKomplain"> -->
        </div>
        <div class="form-group">
            <label for="acc_komentar"><strong> Komentar Admin</strong></label>
            <textarea rows="6" class="col-sm-12 p-2" id="acc_komentar" name="adminkomen_komplain" placeholder="Tuliskan Komentar Anda bila perlu" readonly></textarea>
        </div>
    </div>
</div>