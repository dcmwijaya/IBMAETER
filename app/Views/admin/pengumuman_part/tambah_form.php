<?= csrf_field(); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="tambah_judul"><i class="fas fa-fw fa-info"></i><b> Judul Pengumuman</b></label>
                <input type="text" class="form-control" id="tambah_judul" placeholder="Tambah Judul..." name="judul" required>
                <small><b>*</b> Harus sesuai judul Barang !</small>
            </div>
            <div class="form-group">
                <label for="tambah_isi"><i class="fas fa-fw fa-comment-dots"></i><b> Isi Pengumuman</b></label>
                <textarea class="form-control" id="tambah_isi" rows="6" name="isi" placeholder="Sampaikan isi pengumuman...&#10;" required></textarea>
                <small class="text-muted"><span style="color: red;">*</span> Maksimal 254 huruf</small>
            </div>
        </div>
        <div class="col-sm-4 border-left p-4">
            <div class="form-group">
                <button type="button" class="btn btn-danger btn-block info-clear p-2"><i class="fas fa-fw fa-trash"></i> Kosongkan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" id="Tambah_data" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Simpan</button>
</div>