<?= csrf_field(); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-4">
            <div class="show-img text-center mb-2" id="show-add-img" style="height: 370px;">
                <img class="img-thumbnail img-preview" src="<?= base_url('../img/user/default.jpg'); ?>" alt="image preview" style="max-height: 350px; ">
            </div>
            <div class="custom-file" style="padding-bottom: 22px; margin-bottom: 20px;">
                <div class="invalid-feedback" id="error_add_img"></div>
                <input type="hidden" id="crop-result" name="add_imgs" value="sd">
                <div id="add-input-file">
                    <input type="file" class="custom-file-input" id="add_img" name="add_img">
                    <label class="custom-file-label label-img-input" for="add_img"><i class="fas fa-fw fa-camera mr-2"></i>Pilih Gambar</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4 border-left">
            <div class="form-group">
                <label for="nama_user" class="font-weight-bold"><i class="fas fa-fw fa-user-tag mr-2"></i>Nama User</label>
                <input type="text" class="form-control mbc12" id="nama_user" placeholder="Tuliskan Nama User..." name="user" required>
                <div class="invalid-feedback" id="error_nama"></div>
            </div>
            <div class="form-group">
                <label for="email_user" class="font-weight-bold"><i class="fas fa-fw fa-envelope mr-2"></i>E-mail</label>
                <input type="email" class="form-control mbc12" id="email_user" placeholder="Tuliskan E-mail User..." name="email" required>
                <div class="invalid-feedback" id="error_email"></div>
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold"><i class="fas fa-fw fa-key mr-2"></i>Password</label>
                <input type="password" class="form-control mbc12" id="password" placeholder="Tuliskan Password User..." name="password" required autocomplete="off">
                <div class="invalid-feedback" id="error_password"></div>
            </div>
            <div class="form-group">
                <label for="password2" class="font-weight-bold"><i class="fas fa-fw fa-unlock-alt mr-2"></i>Konfirmasi Password</label>
                <input type="password" class="form-control mbc12" id="password2" placeholder="konfirmasi Password User..." name="confirm_password" required autocomplete="off">
                <div class="invalid-feedback" id="error_confirm_password"></div>
            </div>
        </div>
        <div class="col-sm-4 border-left">
            <div class="form-group">
                <label for="ttl" class="font-weight-bold"><i class="fas fa-fw fa-calendar-alt mr-2"></i>Tanggal Lahir</label>
                <input type="date" class="form-control mbc12" id="ttl" name="ttl" required>
                <div class="invalid-feedback" id="error_ttl"></div>
            </div>
            <div class="form-group">
                <label for="gender_user" class="font-weight-bold"><i class="fas fa-fw fa-restroom mr-2"></i>Gender</label>
                <select class="form-control mbc12" id="gender" name="gender">
                    <option value="Laki-laki"><i class="fas fa-fw fa-female"></i> Laki-laki</option>
                    <option value="Perempuan"><i class="fas fa-fw fa-male"></i> Perempuan</option>
                </select>
                <div class="invalid-feedback" id="error_gender"></div>
            </div>
            <div class="form-group">
                <label for="jenis_user" class="font-weight-bold"><i class="fas fa-fw fa-user-lock mr-2"></i> Role</label>
                <select class="form-control mbc12" id="jenis_user" name="role">
                    <option value="1">User (Pekerja)</option>
                    <option value="0">Admin</option>
                </select>
                <div class="invalid-feedback" id="error_role"></div>
            </div>
            <div class="form-group">
                <label for="division_user" class="font-weight-bold"><i class="fas fa-fw fa-user-tie mr-2"></i>Divisi</label>
                <select class="form-control mbc12" id="division" name="division" disabled="disabled">
                </select>
                <div class="invalid-feedback" id="error_division"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger shadow-sm btn-modal-close" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" class="btn btn-primary shadow-sm "><i class="fas fa-fw fa-user-plus"></i> Tambah User</button>
</div>