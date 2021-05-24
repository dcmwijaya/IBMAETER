<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<table id="table_komplain" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
    <thead>
        <tr>
            <!-- <th>Kode Komplain</th> -->
            <th>Pekerja</th>
            <th>Perihal Komplain</th>
            <!-- <th>Kendala</th> -->
            <th>Bukti</th>
            <th>Waktu Komplain</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($komplain as $k) : ?>
            <tr>
                <!-- <td style="<?= $tdStyle; ?>"><?= $k['no_komplain']; ?></td> -->
                <td style="<?= $tdStyle; ?>"><?= $k['nama']; ?></td>
                <td style="<?= $tdStyle; ?>"><?= $k['judul_komplain']; ?></td>
                <!-- <td style="<?= $tdStyle; ?>"><?= $k['isi_komplain']; ?></td> -->
                <td style="<?= $tdStyle; ?>">
                    <?php if ($k['foto_komplain'] == "-") : ?>
                        <b class="center">-</b>
                    <?php else : ?>
                        <button type="button" class="btn btn-sm btn-img-item px-2 " data-img="<?= base_url('../img/komplain/' . $k['foto_komplain']); ?>" data-toggle="modal" data-target="#gambarBukti">
                            <img src="<?= base_url('../img/komplain/' . $k['foto_komplain']); ?>" width="150" height="auto">
                        </button>
                    <?php endif; ?>
                </td>
                <td style="<?= $tdStyle; ?>"><?= $k['waktu_komplain']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="inoutcom">
                        <button type="button" class="btn btn-success btn-sm btn-acc-item px-2 rounded-left" onclick="AcceptKomplain(<?= $k['id_komplain']; ?>)"><i class="fas fa-check fa-fw"></i>Accept</button>
                        <button type="button" class="btn btn-danger btn-sm btn-rjc-item px-2 rounded-right" onclick="DeclineKomplain(<?= $k['id_komplain']; ?>)"><i class="fas fa-times fa-fw"></i>Decline</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>