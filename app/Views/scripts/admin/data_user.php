<script>
    function UserModalClose() {
        $(".btn-modal-close").on("click", function() {
            $('#User_Modal').modal("hide");
            $('#User_Form').html('');
        });
    }

    let UserSaveType;

    function listUser() {
        $.ajax({
            url: '<?= base_url('Admin/ShowUsers'); ?>',
            beforeSend: function(f) {
                $('#User_AJAX').html(sloading);
            },
            success: function(data) {
                $('#User_AJAX').html(data);
                $('#table_user').DataTable({
                    scrollY: '100vh',
                    scrollCollapse: true,
                    paging: false
                });
                // previewEditImg();
            }
        });
    }

    function TambahUserModal() {
        UserSaveType = "Tambah";
        $('#User_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Admin/TambahUser_Form'); ?>",
            beforeSend: function(data) {
                $('#User_Modal #User_Header').removeClass("bg-warning");
                $('#User_Modal #User_Header').removeClass("bg-kingucrimson");
                $('#User_Modal #User_Header').addClass("bg-softblue");
                $('#User_Modal #User_Label').html('<i class="fas fa-fw fa-user-plus mr-2"></i>  Tambah User Baru');
            },
            success: function(data) {
                $('#User_Form').html(data);

                function selectPekerja() {
                    $.ajax({
                        url: '<?= base_url('Admin/GetRoleDivision'); ?>',
                        data: {
                            role_divisi: 1
                        },
                        type: "POST",
                        success: function(data) {
                            $('[name="division"]').html(data);
                        },
                        error: function(data) {
                            alert('AJAX Division Part Error :(');
                        }
                    });
                    $("#User_Modal #division").prop("disabled", false);

                }
                selectPekerja();
                // fungsi select
                $("#User_Modal #jenis_user").change(function() {
                    $(this).css("background-color", "rgb(240 240 255)");
                    if ($('#User_Modal #jenis_user').val() == 1) {
                        // alert('pekerja');
                        selectPekerja();
                    } else if ($('#User_Modal #jenis_user').val() == 0) {
                        // alert('admin');
                        $.ajax({
                            url: '<?= base_url('Admin/GetRoleDivision'); ?>',
                            data: {
                                role_divisi: 0
                            },
                            type: "POST",
                            success: function(data) {
                                $('[name="division"]').html(data);
                            },
                            error: function(data) {
                                alert('AJAX Division Part Error :(');
                            }
                        });
                        $("#User_Modal #division").prop("disabled", false);
                    }
                });
                // image function
                $('#add_img').change(function() {
                    const add_img = document.querySelector('#add_img');
                    const label_add_img = document.querySelector('.label-img-input');
                    const preview_img = document.querySelector('.img-preview');

                    label_add_img.textContent = add_img.files[0].name;

                    const file_img = new FileReader();

                    file_img.readAsDataURL(add_img.files[0]);
                    file_img.onload = function(e) {
                        preview_img.src = e.target.result;
                    }
                });
                UserModalClose();
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    function EditUserModal(uid) {
        $('#User_Modal').modal('show');
        UserSaveType = "Edit";
        $.ajax({
            type: "POST",
            url: "<?= base_url('Admin/EditUser_Form'); ?>",
            beforeSend: function(data) {
                $('#User_Modal #User_Header').removeClass("bg-softblue");
                $('#User_Modal #User_Header').removeClass("bg-kingucrimson");
                $('#User_Modal #User_Header').addClass("bg-warning");
                $('#User_Modal #User_Label').html('<i class="fas fa-fw fa-user-edit mr-2"></i> Edit User');
            },
            success: function(data) {
                $('#User_Form').html(data);
                $.ajax({
                    url: '<?= base_url('Admin/GetUidUser'); ?>',
                    data: {
                        "uid": uid
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="user_id"]').val(data[0].uid);
                        $('[name="user"]').val(data[0].nama);
                        $('[name="email"]').val(data[0].email);
                        $('[name="ttl"]').val(data[0].tanggal_lahir);
                        $('[name="gender"]').val(data[0].gender).trigger('change');
                        let Division = data[0].id_divisi;
                        $.ajax({
                            url: '<?= base_url('Admin/GetDivision'); ?>',
                            data: {
                                "id_divisi": Division
                            },
                            type: "POST",
                            success: function(division) {
                                $('[name="division"]').html(division);
                            },
                            error: function(data) {
                                alert('AJAX Division Part Error :(');
                            }
                        });
                        $('[name="role"]').val(data[0].role).trigger('change');
                        $('#User_Modal #show_edit_img').attr("src", `<?= base_url('../img/user') ?>/${data[0].picture}`);
                        $('#User_Modal .label-img-input').text(data[0].picture);

                        // fungsi select berdasarkan role turunannya adalah divisi
                        $("#User_Modal #jenis_user").change(function() {
                            $('#division').html(' ');
                            $(this).css("background-color", "rgb(240 240 255)");
                            if ($('#User_Modal #jenis_user').val() == 1) {
                                $.ajax({
                                    url: '<?= base_url('Admin/GetRoleDivision'); ?>',
                                    data: {
                                        role_divisi: 1
                                    },
                                    type: "POST",
                                    success: function(data) {
                                        $('[name="division"]').html(data);
                                    },
                                    error: function(data) {
                                        alert('AJAX Division Part Error :(');
                                    }
                                });
                                $("#User_Modal #division").prop("disabled", false);
                            } else if ($('#User_Modal #jenis_user').val() == 0) {
                                $.ajax({
                                    url: '<?= base_url('Admin/GetRoleDivision'); ?>',
                                    data: {
                                        role_divisi: 0
                                    },
                                    type: "POST",
                                    success: function(data) {
                                        $('[name="division"]').html(data);
                                        // pembatasan dewan direksi
                                        <?php if (session('divisi_user') > 1) : ?>
                                            $('#division option[value="1"]').remove();
                                        <?php endif; ?>
                                    },
                                    error: function(data) {
                                        alert('AJAX Division Part Error :(');
                                    }
                                });
                                $("#User_Modal #division").prop("disabled", false);
                            }
                        });
                        // image preview
                        $('#add_img').change(function() {
                            const edit_img = document.querySelector('#add_img');
                            const label_edit_img = document.querySelector('.label-img-input');
                            const preview_img = document.querySelector('.img-preview');

                            label_edit_img.textContent = edit_img.files[0].name;

                            const file_img = new FileReader();

                            file_img.readAsDataURL(edit_img.files[0]);
                            file_img.onload = function(e) {
                                preview_img.src = e.target.result;
                            }
                        });
                        UserModalClose();
                    }
                });
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    function DeleteUserModal(uid) {
        UserSaveType = "Hapus";
        $('#User_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Admin/HapusUser_Form'); ?>",
            beforeSend: function(data) {
                $('#User_Modal #User_Header').removeClass("bg-softblue");
                $('#User_Modal #User_Header').removeClass("bg-warning");
                $('#User_Modal #User_Header').addClass("bg-kingucrimson");
                $('#User_Modal #User_Label').html('<i class="fas fa-fw fa-user-times mr-2"></i> Hapus User');
            },
            success: function(data) {
                $('#User_Form').html(data);
                $.ajax({
                    url: '<?= base_url('Admin/GetUidUser'); ?>',
                    data: {
                        "uid": uid
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="user_id"]').val(data[0].uid);
                        $('[name="user"]').val(data[0].nama);
                        $('[name="email"]').val(data[0].email);
                        $('[name="ttl"]').val(data[0].tanggal_lahir);
                        $('[name="gender"]').val(data[0].gender).trigger('change');
                        $('#User_Modal #show_edit_img').attr("src", `<?= base_url('../img/user') ?>/${data[0].picture}`);
                        $('[name="role"]').val(data[0].role).trigger('change');
                        let Division = data[0].id_divisi;
                        $.ajax({
                            url: '<?= base_url('Admin/GetDivision'); ?>',
                            data: {
                                "id_divisi": Division
                            },
                            type: "POST",
                            success: function(division) {
                                $('[name="division"]').html(division);
                            },
                            error: function(data) {
                                alert('AJAX Division Part Error :(');
                            }
                        });
                    }
                });
                UserModalClose();
            },
            error: function(data) {
                alert(data);
            }
        });
    }
    // ......................................... Aksi Data User.........................................
    $("#User_Form").submit('click', function(e) {
        e.preventDefault();
        let UserUrl;
        if (UserSaveType == "Tambah") {
            UserUrl = '<?= base_url('Admin/Add_user'); ?>';
        } else if (UserSaveType == "Edit") {
            UserUrl = '<?= base_url('Admin/Edit_user'); ?>';
        } else if (UserSaveType == "Hapus") {
            UserUrl = '<?= base_url('Admin/Delete_user'); ?>';
        }
        $.ajax({
            url: UserUrl,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                listUser();
                $('#toast_alert').html(`
            <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 1500; right: 0; bottom: 0;">
            <div class="toast shadow" role="alert" aria-live="assertive" aria-atomic="true" autohide: false>
            <div class="toast-header bg-dark text-light">
                <img src="<?= base_url('img/icon/favicon-16x16.png') ?>" class="rounded mr-2" alt="Pesan">
                <strong class="mr-auto">INVENBAR CI-4</strong>
                    <small>Baru Saja</small>
                    <button type="button" class="ml-2 mb-1 close text-light btn-toast-close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="toast-body">${data.msg}
                    </div>
                </div>
            </div>
            `);
                $('.toast').toast('show');
                $(".btn-toast-close").on("click", function() {
                    $('.toast').toast('hide');
                });
                // set invalid
                if (data.success == false) {
                    // nama
                    if (data.user != "") {
                        $('[name="user"]').addClass("is-invalid");
                        $('#error_nama').html(data.user);
                    } else {
                        $('[name="user"]').removeClass("is-invalid");
                    }
                    // email
                    if (data.email != "") {
                        $('[name="email"]').addClass("is-invalid");
                        $('#error_email').html(data.email);
                    } else {
                        $('[name="email"]').removeClass("is-invalid");
                    }
                    // password (tambah form)
                    if (data.password != "") {
                        $('[name="password"]').addClass("is-invalid");
                        $('#error_password').html(data.password);
                    } else {
                        $('[name="password"]').removeClass("is-invalid");
                    }
                    // confirm password (tambah form)
                    if (data.confirm_password != "") {
                        $('[name="confirm_password"]').addClass("is-invalid");
                        $('#error_confirm_password').html(data.confirm_password);
                    } else {
                        $('[name="confirm_password"]').removeClass("is-invalid");
                    }
                    // new password (edit form)
                    if (data.new_password != "") {
                        $('[name="new_password"]').addClass("is-invalid");
                        $('#error_new_password').html(data.new_password);
                    } else {
                        $('[name="new_password"]').removeClass("is-invalid");
                    }
                    // ttl
                    if (data.ttl != "") {
                        $('[name="ttl"]').addClass("is-invalid");
                        $('#error_ttl').html(data.ttl);
                    } else {
                        $('[name="ttl"]').removeClass("is-invalid");
                    }
                    // gender
                    if (data.gender != "") {
                        $('[name="gender"]').addClass("is-invalid");
                        $('#error_gender').html(data.gender);
                    } else {
                        $('[name="gender"]').removeClass("is-invalid");
                    }
                    // division
                    if (data.division != "") {
                        $('[name="division"]').addClass("is-invalid");
                        $('#error_division').html(data.division);
                    } else {
                        $('[name="division"]').removeClass("is-invalid");
                    }
                    // role
                    if (data.role != "") {
                        $('[name="role"]').addClass("is-invalid");
                        $('#error_role').html(data.role);
                    } else {
                        $('[name="role"]').removeClass("is-invalid");
                    }
                    // add_img
                    if (data.add_img != "") {
                        $('[name="add_img"]').addClass("is-invalid");
                        $('#error_add_img').html(data.add_img);
                    } else {
                        $('[name="add_img"]').removeClass("is-invalid");
                    }
                } else {
                    $('#User_Modal').modal('hide');
                    $('#User_Form').html(' ');
                }
            },
            error: function(data) {
                alert('Ajax gagal :(');
            }
        });
        // return false;
    })
</script>