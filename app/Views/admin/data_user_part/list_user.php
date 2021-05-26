<!-- style for td -->
<?php $tdStyle = "white-space: -moz-pre-wrap !important; white-space: -pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; white-space: -webkit-pre-wrap; word-break: break-word; white-space: normal;" ?>

<table id="table_user" class="display nowrap" style="font-size: 14px; width:100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama User</th>
            <th>Divisi</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($user as $u) : ?>
            <tr>
                <td class="text-center font-weight-bold" style="width: 35px;"><?= $no ?></td>
                <td><img width="100" src="<?= base_url('../img/user') . "/" .  $u['picture']; ?> " alt=""></td>
                <td><?= $u['nama']; ?></td>
                <td><?= $u['nama_divisi']; ?></td>
                <td><?= ($u['role'] == 0) ? 'Admin' : 'Pekerja' ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="user_action">
                        <button type="button" class="btn btn-warning btn-sm btn-edit-user px-2 rounded-left" onclick="EditUserModal(<?= $u['uid']; ?>)"><i class="fas fa-edit fa-fw"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-delete-user px-2 rounded-right" onclick="DeleteUserModal(<?= $u['uid']; ?>)"><i class="fas fa-trash fa-fw"></i></button>
                    </div>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>