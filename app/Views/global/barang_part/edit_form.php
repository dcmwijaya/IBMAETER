<div class="modal-body">
    <div class="form-group">
        <label for="edit_nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="edit_nama_barang" name="nama_item">
    </div>
    <div class="form-group">
        <label for="edit_stok_barang">Stok Barang</label>
        <input type="number" class="form-control" id="edit_stok_barang" name="stok">
    </div>
    <div class="form-group">
        <label for="edit_jenis_barang">Jenis Barang</label>
        <select class="form-control" id="edit_jenis_barang" name="jenis">
            <option>Padat</option>
            <option>Cair</option>
            <option>Mudah Terbakar</option>
            <option>Minyak</option>
            <option>Daging</option>
        </select>
    </div>
    <div class="form-group">
        <label for="edit_penyimpanan">Tempat Gudang</label>
        <select class="form-control" id="edit_penyimpanan" name="penyimpanan">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>F</option>
            <option>G</option>
        </select>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="id_item" id="edit_id_item">
    <button type="button" class="btn btn-danger btn-modal-close" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" class="btn btn-warning"><i class="fas fa-fw fa-check"></i> Simpan</button>
</div>