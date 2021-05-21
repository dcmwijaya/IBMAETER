<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<table id="table_item" class="display nowrap " style="font-size: 14px; width:100% !important; overflow-x:auto;">
    <thead class="container-fluid" style="width:100%;">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Jenis</th>
            <th>Room</th>
            <?php if (session('role') == 0) : ?>
                <th>Aksi</th>
            <?php endif; ?>
            <th>Kirim</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($item as $b) : ?>
            <tr>
                <td><?= $no ?></td>
                <td style="<?= $tdStyle; ?>"><?= $b['nama_item'] ?></td>
                <td><?= $b['stok']; ?></td>
                <td><?= $b['jenis']; ?></td>
                <td><?= $b['penyimpanan']; ?></td>
                <?php if (session('role') == 0) : ?>
                    <td>
                        <div class="btn-group" role="group" aria-label="upordel">
                            <button type="button" class="btn btn-warning btn-sm btn-edit-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" onclick="ItemEditmodal(<?= $b['id_item']; ?>)"><i class="fas fa-edit fa-fw"></i></button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" onclick="ItemDeletemodal(<?= $b['id_item']; ?>)"><i class="fas fa-trash fa-fw"></i></button>
                        </div>
                    </td>
                <?php endif; ?>
                <td>
                    <div class="btn-group" role="group" aria-label="inoutcom">
                        <button type="button" class="btn btn-light btn-sm btn-in-item px-2 rounded-left" data-id="<?= $b['id_item']; ?>" onclick="InModal(<?= $b['id_item']; ?>)"><i class="fas fa-plus-circle fa-fw"></i> Masuk</button>
                        <button type="button" style="background-color:#37af06" class="btn text-light btn-sm btn-out-item px-2 rounded-right" data-id="<?= $b['id_item']; ?>" onclick="OutModal(<?= $b['id_item']; ?>)"><i class="fas fa-dolly fa-fw"></i> Keluar</button>
                    </div>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>