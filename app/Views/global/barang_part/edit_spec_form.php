<div class="modal-body">
    <div class="row">
        <div class="col-sm-6 border-left ">
            <div class="container">
                <div class="form-group">
                    <label for="edit_sp_nama"><i class="fas fa-fw fa-box"></i> Nama Barang</label>
                    <input type="text" class="form-control disabled" id="edit_sp_nama" readonly name="sp_nama">
                </div>
                <hr>
                <small><b>*Untuk Digit Kode barang : </br></b><span style="color:crimson;"><strong>[1] =</strong></span> alfabet tempat penyimpanan, </br><span style="color:steelblue;"><strong>[2]~[3] =</strong></span> no urutan Kategori, </br><span style="color: green;"><strong>[4]~[8] =</strong></span> no produksi</small>
            </div>
        </div>
        <div class="col-sm-6 border-left px-4">
            <div class="form-group">
                <label for="edit_sp_kode"><i class="fas fa-fw fa-tag"></i> Kode Barang</label>
                <input type="text" class="form-control" id="edit_sp_kode" placeholder="Edit Kode Barang..." name="sp_kode" required>
                <small><b>*</b> Harus sesuai kode Barang !</small>
            </div>
            <div class="form-group">
                <label for="edit_sp_harga"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item (Rp)</label>
                <input type="number" class="form-control" id="edit_sp_harga" placeholder="Edit berat Barang..." name="sp_harga">
            </div>
            <div class="form-group">
                <label for="edit_sp_berat"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
                <input type="number" class="form-control" id="edit_sp_berat" placeholder="Edit berat Barang..." name="sp_berat">
            </div>
            <div class="form-group">
                <label for="edit_sp_supplier"><i class="fas fa-fw fa-id-card-alt"></i> Dikirim oleh Supplier</label>
                <select class="form-control" name="sp_supplier" id="selectsupplier">
                    <option value="0">(Tidak Ada)</option>

                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="sp_id_item">
        <button type="button" class="btn btn-danger shadow-sm" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
        <button type="submit" class="btn btn-warning shadow-sm"><i class="fas fa-fw fa-check"></i> Simpan</button>
    </div>
</div>