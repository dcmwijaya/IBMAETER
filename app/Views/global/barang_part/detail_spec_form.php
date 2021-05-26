<div class="modal-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="detail_nama" class="font-weight-bold"><i class="fas fa-fw fa-box"></i> Nama Barang</label>
                <input type="text" class="famebg form-control" id="detail_nama" name="detail_nama" readonly>
            </div>
            <div class="form-group">
                <label for="detail_stok" class="font-weight-bold"><i class="fas fa-fw fa-cubes"></i> Stok Barang Saat Ini</label>
                <input type="number" class="famebg form-control" id="detail_stok" name="detail_stok" readonly>
            </div>
            <div class="form-group">
                <label for="detail_jenis" class="font-weight-bold"><i class="fas fa-fw fa-th-list"></i> Jenis Barang</label>
                <input type="text" class="famebg form-control" id="detail_jenis" name="detail_jenis" readonly>
            </div>
            <div class="form-group">
                <label for="detail_penyimpanan" class="font-weight-bold"><i class="fas fa-fw fa-thumbtack"></i> Tempat Gudang</label>
                <input type="text" class="famebg form-control" id="detail_penyimpanan" name="detail_penyimpanan" readonly>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="detail_kode" class="font-weight-bold"><i class="fas fa-fw fa-tag"></i> Kode Barang</label>
                <input type="text" class="famebg form-control" id="detail_kode" name="detail_kode" readonly>
            </div>
            <div class="form-group">
                <label for="detail_harga" class="font-weight-bold"><i class="fas fa-fw fa-money-bill-wave-alt"></i> Harga/item Saat Ini (IDR)</label>
                <input type="number" class="famebg form-control" id="detail_harga" name="detail_harga" readonly>
            </div>
            <div class="form-group">
                <label for="detail_berat" class="font-weight-bold"><i class="fas fa-fw fa-dolly-flatbed"></i> Berat/item (gram)</label>
                <input type="text" class="famebg form-control" id="detail_berat" name="detail_berat" readonly>
            </div>
            <div class="form-group">
                <label for="detail_supplier" class="font-weight-bold"><i class="fas fa-fw fa-id-card-alt"></i> Pensuplai Barang</label>
                <select class="form-control disabled" name="detail_supplier" id="detail_supplierr" readonly disabled>
                    <option value="0">(Tidak Ada)</option>

                </select>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <!-- <input type="hidden" name="detail_item" id="detail_item"> -->
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i> Keluar</button>
    <button id="detail_nota" name="print_nota" type=" button" onclick="" class="btn btn-success"><i class="fas fa-fw fa-print"></i> Print</button>
</div>