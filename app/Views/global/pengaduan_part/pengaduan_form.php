    <?= csrf_field(); ?>
    <div class="card-body event-description">
        <div class="form-group">
            <label for="judul_komplain"><b><i class="fas fa-fw fa-hashtag"></i> Judul Komplain</b></label>
            <input type="text" class="form-control col-sm-12  mb-2" id="judul_komplain" name="judul" placeholder="Tuliskan judul komplain..." required>
            <div class="invalid-feedback" id="error_judul"></div>
        </div>
        <div class="form-group">
            <label for="isi_komplain"><b><i class="fas fa-fw fa-comment-dots"></i> Isi Komplain</b></label>
            <small class="text-muted"><span style="color: red;">*</span> Maksimal 256 huruf</small>
            <textarea class="col-sm-12  mb-2" id="isi_komplain" rows="3" name="isi" placeholder="Sampaikan isi komplain..." required></textarea>
            <div class="invalid-feedback" id="error_isi"></div>
        </div>
        <div class="form-group">
            <label for="edit_gambar_info"><b><i class="fas fa-fw fa-file-alt"></i> Bukti Screenshoot</b></label>
            <small class="text-muted"><span style="color: red;">*</span> Gambar (.jpg/.jpeg/.png) maks 10Mb</small>
            <div class="drop-zone col-sm-12">
                <span class="drop-zone__prompt">Drop file gambar berformat (.jpg/.jpeg/.png) </span>
                <input type="file" name="foto" class="drop-zone__input" required>
                <div class="invalid-feedback" id="error_foto"></div>
            </div>
        </div>
        <div class="my-4">
            <input type="hidden" class="form-control" value="<?= $user['uid']; ?>" name="uid">
            <input type="hidden" class="form-control" value="<?= $user['email']; ?>" name="email">
            <button type="submit" class="btn btn-success btn-komplain col-sm-12"><i class="fas fa-fw fa-check"></i> Kirim Komplain</button>
        </div>
    </div>