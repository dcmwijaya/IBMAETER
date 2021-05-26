<?= csrf_field(); ?>
<div class="modal-body row">
    Apakah Anda Yakin anda ingin menghapus "<strong><span id="delete_nama_user"></span></strong>" ?
    <div class="col-sm-6">
        <div class="show-img text-center mb-2" id="show-add-img" style="height: 370px;">
            <img class="img-thumbnail img-preview disabled" src="<?= base_url('../img/user/default.jpg'); ?>" alt="image preview" style="max-height: 370px; ">
        </div>
        <div class="custom-file" style="padding-bottom: 22px; margin-bottom: 20px;">
            <div class="invalid-feedback m-2">
                <?= $validation->getError('add_img'); ?>
            </div>
            <input type="hidden" id="crop-result" name="add_imgs" value="sd">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="nama_user" class="font-weight-bold"><i class="fas fa-fw fa-user-tag mr-2"></i>Nama User</label>
            <input type="text" class="form-control disabled" id="nama_user" name="user" readonly>
        </div>
        <div class="form-group">
            <label for="email_user" class="font-weight-bold"><i class="fas fa-fw fa-envelope mr-2"></i>E-mail</label>
            <input type="email" class="form-control disabled" id="email_user" name="email" readonly>
        </div>
        <div class="form-group">
            <label for="ttl" class="font-weight-bold"><i class="fas fa-fw fa-calendar-alt mr-2"></i>Tanggal Lahir</label>
            <input type="date" class="form-control disabled" value="" id="ttl" name="ttl" readonly>
        </div>
        <div class="form-group">
            <label for="gender_user" class="font-weight-bold"><i class="fas fa-fw fa-restroom mr-2"></i>Gender</label>
            <select class="form-control disabled" id="gender" name="gender" readonly disabled>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_user" class="font-weight-bold"><i class="fas fa-fw fa-user-lock mr-2"></i>Role</label>
            <select class="form-control disabled" id="jenis_user" name="role" readonly disabled>
                <option value="1">User (Pekerja)</option>
                <option value="0">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="division_user" class="font-weight-bold"><i class="fas fa-fw fa-user-tie mr-2"></i>Divisi</label>
            <select class="form-control disabled" id="division" name="division" readonly disabled>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="user_id" id="user_id">
    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-user-minus"></i> Hapus User</button>
</div>