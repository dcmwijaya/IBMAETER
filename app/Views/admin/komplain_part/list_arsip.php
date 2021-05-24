<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<table id="table_komplainArsip" class="display nowrap " style="font-size: 14px; width:100%; overflow-x:auto;">
    <thead style="border-bottom: 1px solid #dfdfdf;">
        <tr>
            <th>Waktu Komplain</th>
            <th>Pekerja</th>
            <th>Kendala</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- data arsip komplain -->
        <?php foreach ($arsipKomp as $arc) : ?>
            <tr>
                <td style="<?= $tdStyle; ?>"><?= $arc['waktu_arsipKomp']; ?></td>
                <td style="<?= $tdStyle; ?>"><?= $arc['nama']; ?></td>
                <td style="<?= $tdStyle; ?>"><?= $arc['judul_arsipKomp']; ?></td>
                <td style="<?= $tdStyle; ?>">
                    <?php if ($arc['foto_arsipKomp'] == "-") : ?>
                        <b class="center">-</b>
                    <?php else : ?>
                        <button type="button" class="btn btn-sm btn-img-item shadow-sm" data-img="<?= base_url('../img/komplain/' . $arc['foto_arsipKomp']); ?>" data-toggle="modal" data-target="#gambarBukti">
                            <img src="<?= base_url('../img/komplain/' . $arc['foto_arsipKomp']); ?>" width="150" height="auto">
                        </button>
                    <?php endif; ?>
                </td>
                <td style="<?= $tdStyle; ?>">
                    <?php if ($arc['status_arsipKomp'] == 'accepted') : ?>
                        <span class=" py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i>DITERIMA</span>
                    <?php elseif ($arc['status_arsipKomp'] == 'rejected') : ?>
                        <span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i>DITOLAK </span>
                    <?php else : ?>
                        <span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;background-color: orange;"><i class="fas fa-spinner fa-fw mr-1"></i>PENDING</span>
                    <?php endif; ?>
                </td>
                <td>
                    <button type="button" class="btn bg-nanas text-light btn-sm px-2 shadow-sm" onclick="DetailArsipKomplain(<?= $arc['id_arsipKomp']; ?>)"><i class="fas fa-archive fa-fw mr-2"></i>Detail</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>