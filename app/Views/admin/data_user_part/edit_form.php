<?= csrf_field(); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-4">
            <div class="show-img text-center mb-2" id="show-add-img" style="height: 370px;">
                <img class="img-thumbnail img-preview" id="show_edit_img" src="<?= base_url('../img/user/default.jpg'); ?>" alt="image preview" style="max-height: 370px; ">
            </div>
            <div class="custom-file" style="padding-bottom: 22px; margin-bottom: 20px;">
                <div class="invalid-feedback m-2">
                    <?= $validation->getError('add_img'); ?>
                </div>
                <input type="hidden" id="crop-result" name="crop_img">
                <div id="add-input-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('add_img')) ? 'is-invalid' : ''; ?>" id="add_img" name="new_img">
                    <label class="custom-file-label label-img-input" for="add_img"><i class="fas fa-fw fa-camera mr-2"></i>Pilih Gambar</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4 border-left">
            <div class="form-group">
                <label for="nama_user" class="font-weight-bold"><i class="fas fa-fw fa-user-tag mr-2"></i>Nama User</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama_user" placeholder="Tuliskan Nama User..." name="new_nama" required value="<?= (old('user')); ?>">
                <div class=" invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email_user" class="font-weight-bold"><i class="fas fa-fw fa-envelope mr-2"></i>E-mail</label>
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email_user" placeholder="Tuliskan E-mail User..." name="new_email" required value="<?= (old('email')); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold"><i class="fas fa-fw fa-key mr-2"></i>Password Baru</label>
                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Tuliskan Password User..." name="new_password" autocomplete="off">
                <div class="invalid-feedback" id="error_password"></div>
                <small class="font-weight-bold">*Kosongkan jika tidak diubah</small>
            </div>
        </div>
        <div class="col-sm-4 border-left">
            <div class="form-group">
                <label for="ttl" class="font-weight-bold"><i class="fas fa-fw fa-calendar-alt mr-2"></i>Tanggal Lahir</label>
                <input type="date" class="form-control" id="ttl" name="new_ttl" required>
            </div>
            <div class="form-group">
                <label for="gender_user" class="font-weight-bold"><i class="fas fa-fw fa-restroom mr-2"></i>Gender</label>
                <select class="form-control <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="gender" name="new_gender">
                    <option value="Laki-laki"><i class="fas fa-fw fa-female"></i> Laki-laki</option>
                    <option value="Perempuan"><i class="fas fa-fw fa-male"></i> Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('gender'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_user" class="font-weight-bold"><i class="fas fa-fw fa-user-lock mr-2"></i> Role</label>
                <select class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="jenis_user" name="new_role">
                    <option value="1">User (Pekerja)</option>
                    <option value="0">Admin</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('role'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="division_user" class="font-weight-bold"><i class="fas fa-fw fa-user-tie mr-2"></i>Divisi</label>
                <select class="form-control <?= ($validation->hasError('division')) ? 'is-invalid' : ''; ?>" id="division" name="new_division" disabled="disabled">
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('division'); ?>
                </div>
                <!-- <input type="hidden" id="division_id" name="division_id"> -->
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" id="user_id" name="user_id">
    <!-- <input type="hidden" name="old_picture"> -->
    <button type="button" class="btn btn-danger shadow-sm btn-modal-close" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" class="btn btn-warning shadow-sm"><i class="fas fa-fw fa-user-plus"></i> Edit User</button>
</div>