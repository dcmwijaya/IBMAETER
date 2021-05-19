<span>
    <!-- style for td -->
    <?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

    <?php foreach ($table_pengumuman as $p) : ?>
        <tr>
            <td style="<?= $tdStyle; ?>">
                <?php if ($p['waktu'] == !null) : ?>
                    <?= $p['waktu']; ?>
                <?php else : ?>
                    (Kosong)
                <?php endif; ?>
            </td>
            <td style="<?= $tdStyle; ?>">
                <?php $awal  = date_create($p['waktu']);
                $akhir = date_create(); // waktu sekarang
                $diff  = date_diff($awal, $akhir);
                $year =  $diff->y . ' tahun, ';
                $month =  $diff->m . ' bulan, ';
                $day =  $diff->d . ' hari, ';
                $hour = $diff->h . ' jam, ';
                $minute = $diff->i . ' menit, ';
                $second =  $diff->s . ' detik, ';
                ?>
                <?php if ($diff->y >= 1) : ?>
                    <span class=" py-2 badge badge-dark" style="font-weight: 500;font-size: 11px;"><i class="fas fa-check fa-fw mr-1"></i><?= $year; ?> yang lalu</span>
                <?php endif; ?>
                <?php if ($diff->m <= 12 && $diff->m !== 0) : ?>
                    <span class="py-2 badge badge-danger" style="font-weight: 500;font-size: 11px;"><i class="fas fa-times fa-fw mr-1"></i><?= $month; ?> yang lalu </span>
                <?php endif; ?>
                <?php if ($diff->d <= 7 && $diff->d !== 0) : ?>
                    <span class="py-2 badge badge-warning" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $day; ?> yang lalu</span>
                <?php endif; ?>
                <?php if ($diff->h <= 24 && $diff->h !== 0) : ?>
                    <span class="py-2 badge badge-primary" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $hour; ?> yang lalu</span>
                <?php endif; ?>
                <?php if ($diff->i <= 60 && $diff->i !== 0) : ?>
                    <span class="py-2 badge badge-info" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $minute; ?> yang lalu</span>
                <?php endif; ?>
                <?php if ($diff->s <= 60 && $diff->i !== 0) : ?>
                    <span class="py-2 badge badge-success" style="font-weight: 500;font-size: 11px;"><i class="fas fa-spinner fa-fw mr-1"></i><?= $second; ?> yang lalu</span>
                <?php endif; ?>
            </td>
            <td style="<?= $tdStyle; ?>">
                <?php if ($p['nama'] == !null) : ?>
                    <?= $p['nama']; ?>
                <?php else : ?>
                    (Kosong)
                <?php endif; ?>
            </td>
            <td style="<?= $tdStyle; ?>">
                <?php if ($p['judul'] == !null) : ?>
                    <?= $p['judul']; ?>
                <?php else : ?>
                    (Kosong)
                <?php endif; ?>
            </td>
            <td style="<?= $tdStyle; ?>">
                <?php if ($p['isi'] == !null) : ?>
                    <?= $p['isi']; ?>
                <?php else : ?>
                    (Kosong)
                <?php endif; ?>
            </td>
            <?php if (session('role') == 0) : ?>
                <td>
                    <div class="btn-group" role="group" aria-label="inoutcom">
                        <button type="button" class="btn btn-dark btn-sm edit-pengumuman px-2 rounded-left" data-id="<?= $p['id_pengumuman']; ?>" data-judul="<?= $p["judul"]; ?>" data-isi="<?= $p['isi']; ?>" data-uid="<?= $p['uid']; ?>" data-waktu="<?= $p['waktu']; ?>"><i class="fas fa-edit fa-fw"></i></button>
                        <button type="button" class="btn btn-success text-light btn-sm detl-pengumuman px-2 rounded-right" data-id="<?= $p['id_pengumuman']; ?>" data-judul="<?= $p["judul"]; ?>" data-isi="<?= $p['isi']; ?>" data-uid="<?= $p['uid']; ?>" data-waktu="<?= $p['waktu']; ?>" data-toggle="modal" data-target="#Detail_Pengumuman"><i class="fas fa-print fa-fw"></i></button>
                    </div>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</span>