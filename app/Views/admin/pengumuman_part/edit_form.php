<?= csrf_field(); ?>
<div class="modal-body">
    <div id="PengumumanF_Input" class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="pengumuman_judul"><i class="fas fa-fw fa-thumbtack"></i><b> Judul Pengumuman</b></label>
                <input type="text" class="form-control" id="pengumuman_judul" placeholder="Edit Judul Pengumuman..." name="judul" required>
            </div>
            <div class="form-group">
                <label for="pengumuman_isi"><i class="fas fa-fw fa-comment-dots"></i><b> Isi Pengumuman</b></label>
                <textarea class="form-control" id="pengumuman_isi" rows="6" name="isi" placeholder="Sampaikan isi pengumuman...&#10;" required></textarea>
                <small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
            </div>
        </div>
        <div class="col-sm-4 border-left p-4">
            <div class="form-group">
                <button type="button" id="info-clear" class="btn btn-danger btn-block p-2 shadow-sm" onclick="infoClear()"><i class="fas fa-fw fa-trash"></i> Kosongkan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="id_pengumuman" id="edit_id">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" id="Tambah_data" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Simpan</button>
</div>