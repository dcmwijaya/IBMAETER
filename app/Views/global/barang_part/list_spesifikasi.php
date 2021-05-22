<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<table id="table_spesifikasi" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga/Item (Rp)</th>
            <th>Berat/Item (gr)</th>
            <th>Nama Supplier</th>
            <?php if (session('role') == 0) : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($spec as $b) : ?>
            <tr>
                <td><?= $no ?></td>
                <td style="<?= $tdStyle; ?>"><?= $b['nama_item'] ?></td>
                <td>
                    <?php if ($b['kode_barang'] != null) : ?>
                        <?= $b['kode_barang']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($b['harga'] != 0) : ?>
                        <?= $b['harga']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($b['berat'] != 0) : ?>
                        <?= $b['berat']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td style="<?= $tdStyle; ?>">
                    <?php if ($b['nama_supplier'] != null) : ?>
                        <?= $b['nama_supplier']; ?>
                    <?php else : ?>
                        <span class="font-weight-bold text-danger">(Kosong)</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="inoutcom">
                        <?php if (session('role') == 0) : ?>
                            <button type="button" class="btn btn-dark btn-sm detl-edit-item px-2 rounded-left" onclick="SpecEditmodal(<?= $b['id_item']; ?>)"><i class="fas fa-edit fa-fw"></i></button>
                        <?php endif; ?>
                        <button type="button" style="background-color: #1687b3;" class="btn text-light btn-sm detl-item px-2 rounded-right" onclick="SpecDetailmodal(<?= $b['id_item']; ?>)"><i class="fas fa-file-alt fa-fw"></i></button>
                    </div>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>