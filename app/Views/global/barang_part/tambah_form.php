<div class="modal-body" id="Tambah_Section">
    <div class="row">
        <!-- bagian kanan -->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="nama_barang"><i class="fas fa-fw fa-box"></i> Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" placeholder="Tuliskan Nama barang baru" name="nama_item" required>
            </div>
            <div class="form-group">
                <label for="stok_barang"><i class="fas fa-fw fa-cubes"></i> Stok Barang</label>
                <input type="number" class="form-control" id="stok_barang" placeholder="Tuliskan Stok barang baru" name="stok">
            </div>
            <div class="form-group">
                <label for="jenis_barang"><i class="fas fa-fw fa-th-list"></i> Jenis Barang</label>
                <select class="form-control jenis-barang" id="jenis_barang" name="jenis">
                    <option>Padat</option>
                    <option>Cair</option>
                    <option>Mudah Terbakar</option>
                    <option>Minyak</option>
                    <option>Daging</option>
                </select>
            </div>
            <div class="form-group">
                <label for="penyimpanan"><i class="fas fa-fw fa-thumbtack"></i> Tempat Gudang</label>
                <select class="form-control penyimpanan" id="penyimpanan" name="penyimpanan">
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
        <!-- bagian kanan -->
        <div class="col-sm-6" style="border-left: outset;">
            <div class="form-group">
                <label for="tambah_kode"><i class="fas fa-fw fa-tag"></i> Kode Barang</label>
                <div class="row pb-1">
                    <div class="col-sm-2">
                        <small><b>Tempat</b></small>
                        <select class="form-control kode1" id="tambah_kode1" disabled>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                            <option>F</option>
                            <option>G</option>
                        </select>
                        <input type="hidden" class="hkode1" name="kode1">
                    </div>
                    /
                    <div class="col-sm-4">
                        <small><b>Kategori Jenis</b></small>
                        <select class="form-control kode2" id="tambah_kode2" disabled>
                            <option>Padat</option>
                            <option>Cair</option>
                            <option>Mudah Terbakar</option>
                            <option>Minyak</option>
                            <option>Daging</option>
                        </select>
                        <input type="hidden" class="hkode2" name="kode2">
                    </div>
                    /
                    <div class="col-sm-5">
                        <small><b>No. Seri</b></small>
                        <input type="number" class="form-control" id="tambah_kode3" placeholder="No. Seri Kode..." name="kode3" required>
                    </div>
                </div>
                <small class=""><b>*</b> Sesuai Format kode Barang</small>
                <hr class="mb-0">
            </div>
            <div class="form-group">
                <label for="tambah_harga"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item (Rp)</label>
                <input type="number" class="form-control" id="tambah_harga" placeholder="Tambah berat Barang..." name="harga">
            </div>
            <div class="form-group">
                <label for="tambah_berat"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
                <input type="number" class="form-control" id="tambah_berat" placeholder="Tambah berat Barang..." name="berat">
            </div>
            <div class="form-group">
                <label for="tambah_supplier"><i class="fas fa-fw fa-id-card-alt"></i> Nama Supplier</label>
                <select class="form-control" id="tambah_supplierr" name="supplier">
                    <option value="0">(Tidak Ada)</option>

                </select>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Batal</button>
    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Barang</button>
</div>