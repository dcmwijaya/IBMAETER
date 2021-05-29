<script>
    let sloading = '<div class="spinner-border spinner-border-sm text-info" role="status"><span class="sr-only">&emsp;&ensp; Loading...</span></div> Loading Data...'
    let ItemSaveType;
    let InOutSaveType;

    //......................................... Kelola Barang Master Data Load .........................................
    function listItem() {
        $.ajax({
            url: '<?= base_url('Menu/ShowItem'); ?>',
            beforeSend: function(f) {
                $('#Item_AJAX').html(sloading);
            },
            success: function(data) {
                $('#Item_AJAX').html(data);
                $('#table_item').DataTable({
                    scrollY: '100vh',
                    scrollCollapse: true,
                    paging: false
                });
            }
        });
    }

    function listSpesifikasi() {
        $.ajax({
            url: '<?= base_url('Menu/ShowSpesifikasi'); ?>',
            beforeSend: function(f) {
                $('#Spesifikasi_AJAX').html(sloading);
            },
            success: function(data) {
                $('#Spesifikasi_AJAX').html(data);
                $('#table_spesifikasi').DataTable({
                    scrollY: '100vh',
                    scrollCollapse: true,
                    paging: false
                });
            }
        });
    }

    <?php if (session('role') == 0) : ?>
        //......................................... kelola barang Modal.........................................
        function ItemTambahmodal() {
            ItemSaveType = "Tambah";
            $('#Item_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Menu/TambahItem_Form'); ?>",
                beforeSend: function(data) {
                    $('#Item_Modal .modal-dialog').removeClass("modal-lg");
                    $('#Item_Modal .modal-dialog').removeClass("modal-delete");
                    $('#Item_Modal .modal-dialog').addClass("modal-xl");
                    $('#Item_Modal #Item_Header').removeClass("bg-warning");
                    $('#Item_Modal #Item_Header').removeClass("bg-danger");
                    $('#Item_Modal #Item_Header').addClass("bg-softblue");
                    $('#Item_Modal #Item_Label').html('<i class="fas fa-fw fa-plus-square"></i>  Tambah Barang Baru');
                },
                success: function(data) {
                    $('#Item_Form').html(data);
                    PairingKodeBarang();
                    let Supplierku = data.id_supplier;
                    $.ajax({
                        url: '<?= base_url('Menu/GetSupplier'); ?>',
                        data: {
                            "id_supplier": Supplierku
                        },
                        type: "POST",
                        success: function(supplier) {
                            $('[name="supplier"]').html(supplier);
                        },
                        error: function(data) {
                            alert('AJAX Supplier Part Error :(');
                        }
                    });
                    BarangModalClose();
                },
                error: function(data) {
                    alert(data);
                }
            });
        }

        function ItemEditmodal(id) {
            ItemSaveType = "Edit";
            $('#Item_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Menu/EditItem_Form'); ?>",
                beforeSend: function(data) {
                    $('#Item_Modal .modal-dialog').removeClass("modal-xl");
                    $('#Item_Modal .modal-dialog').removeClass("modal-delete");
                    $('#Item_Modal .modal-dialog').addClass("modal-lg");
                    $('#Item_Modal #Item_Header').removeClass("bg-softblue");
                    $('#Item_Modal #Item_Header').removeClass("bg-danger");
                    $('#Item_Modal #Item_Header').addClass("bg-warning");
                    $('#Item_Modal #Item_Label').html('<i class="fas fa-fw fa-edit"></i> Edit Barang');
                },
                success: function(data) {
                    $('#Item_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Menu/GetIDItem'); ?>',
                        data: {
                            "id_item": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('[name="id_item"]').val(data.id_item);
                            $('[name="nama_item"]').val(data.nama_item);
                            $('[name="stok"]').val(data.stok);
                            $('[name="jenis"]').val(data.jenis).trigger('change');
                            $('[name="penyimpanan"]').val(data.penyimpanan).trigger('change');
                        }
                    });
                    BarangModalClose();
                },
                error: function(data) {
                    alert(data);
                }
            });
        }

        function ItemDeletemodal(id) {
            ItemSaveType = "Delete";
            $('#Item_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Menu/DeleteItem_Form'); ?>",
                beforeSend: function(data) {
                    $('#Item_Modal .modal-dialog').removeClass("modal-xl");
                    $('#Item_Modal .modal-dialog').removeClass("modal-lg");
                    $('#Item_Modal .modal-dialog').addClass("modal-delete");
                    $('#Item_Modal #Item_Header').removeClass("bg-softblue");
                    $('#Item_Modal #Item_Header').removeClass("bg-warning");
                    $('#Item_Modal #Item_Header').addClass("bg-danger");
                    $('#Item_Modal #Item_Label').html('<i class="fas fa-fw fa-minus-square"></i> Hapus Barang Dengan Nama ');
                },
                success: function(data) {
                    $('#Item_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Menu/GetIDItem'); ?>',
                        data: {
                            "id_item": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('[name="id_item"]').val(data.id_item);
                            $('#delete_nama_item').html(data.nama_item);
                        }
                    });
                    BarangModalClose();
                },
                error: function(data) {
                    alert(data);
                }
            });
        }

        // ......................................... Aksi Submit Item Barang.............................................
        $("#Item_Form").submit('click', function() {
            // e.preventDefault(); tidak berhasil
            $('#Item_Modal').modal('hide');
            let ItemUrl;
            if (ItemSaveType == "Tambah") {
                ItemUrl = "<?= base_url('/Menu/Add_item'); ?>";
            } else if (ItemSaveType == "Edit") {
                ItemUrl = "<?= base_url('/Menu/Edit_item'); ?>";
            } else if (ItemSaveType == "Delete") {
                ItemUrl = "<?= base_url('/Menu/Delete_item'); ?>";
            }
            $.ajax({
                url: ItemUrl,
                type: "POST",
                data: $('#Item_Form').serialize(),
                success: function(data) {
                    $('#Item_Form').html(' ');
                    listItem();
                    listPerizinan();
                    listSpesifikasi();
                }
            });
            return false;
        })
    <?php endif; ?>
</script>
<!-- ================= InOut Barang -->
<script>
    // ......................................... InOut Barang .........................................
    function InModal(id) {
        InOutSaveType = "Masuk";
        $('#InOut_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Menu/InItem_Form'); ?>",
            beforeSend: function(data) {
                $('#InOut_Modal #InOut_Header').removeClass("bg-kingucrimson");
                $('#InOut_Modal #InOut_Header').addClass("bg-softgreen");
                $('#InOut_Modal #InOut_Label').html('<i class="fas fa-fw fa-dolly-flatbed"></i>  Tambah Data Barang Masuk');
            },
            success: function(data) {
                $('#InOut_Form').html(data);
                $.ajax({
                    url: '<?= base_url('Menu/GetIDItem'); ?>',
                    data: {
                        "id_item": id
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="InOutItem_Name"]').val(data.nama_item);
                        $('[name="InOut_Id_Item"]').val(data.id_item);
                        $('[name="Live_Stock"]').val(data.stok);
                    }
                });
                InOutModalClose();
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    function OutModal(id) {
        InOutSaveType = "Keluar";
        $('#InOut_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Menu/OutItem_Form'); ?>",
            beforeSend: function(data) {
                $('#InOut_Modal #InOut_Header').removeClass("bg-softgreen");
                $('#InOut_Modal #InOut_Header').addClass("bg-kingucrimson");
                $('#InOut_Modal #InOut_Label').html('<i class="fas fa-fw fa-dolly-flatbed" style="transform: rotateY(180deg);"></i>  Tambah Data Barang Keluar');
            },
            success: function(data) {
                $('#InOut_Form').html(data);
                $.ajax({
                    url: '<?= base_url('Menu/GetIDItem'); ?>',
                    data: {
                        "id_item": id
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="InOutItem_Name"]').val(data.nama_item);
                        $('[name="InOut_Id_Item"]').val(data.id_item);
                        $('[name="Live_Stock"]').val(data.stok);
                    }
                });
                InOutModalClose();
            },
            error: function(data) {
                alert(data);
            }
        });
    }


    $("#InOut_Form").submit('click', function() {
        // e.preventDefault(); tidak berhasil
        $('#InOut_Modal').modal('hide');
        let InOutUrl;
        if (InOutSaveType == "Masuk") {
            InOutUrl = "<?= base_url('/Menu/In_item'); ?>";
        } else if (InOutSaveType == "Keluar") {
            InOutUrl = "<?= base_url('/Menu/Out_item'); ?>";
        }
        $.ajax({
            url: InOutUrl,
            type: "POST",
            data: $('#InOut_Form').serialize(),
            success: function(data) {
                $('#InOut_Form').html(' ');
                listPerizinan();
            }
        });
        return false;
    })
</script>
<!-- =============== Spesifikasi Barang-->
<script>
    //......................................... Spesifikasi Barang .........................................

    function SpecDetailmodal(id) {
        $('#Spec_Modal').modal('show');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Menu/DetailSpec_Form'); ?>",
            beforeSend: function(data) {
                $('#Spec_Modal .modal-dialog').removeClass("modal-lg");
                $('#Spec_Modal .modal-dialog').addClass("modal-xl");
                $('#Spec_Modal #Spec_Header').removeClass("bg-dark");
                $('#Spec_Modal #Spec_Header').addClass("bg-softblue");
                $('#Spec_Modal #Spec_Label').html('<i class="fas fa-fw fa-folder-open"></i> Detail Spesifikasi Barang');
            },
            success: function(data) {
                $('#Spec_Form').html(data);
                $.ajax({
                    url: '<?= base_url('Menu/GetIDItem'); ?>',
                    data: {
                        "id_item": id
                    },
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_item"]').val(data.id_item);
                        $('[name="detail_nama"]').val(data.nama_item);
                        $('[name="detail_stok"]').val(data.stok);
                        $('[name="detail_jenis"]').val(data.jenis);
                        $('[name="detail_penyimpanan"]').val(data.penyimpanan);
                        $('[name="detail_kode"]').val(data.kode_barang);
                        $('[name="detail_harga"]').val(data.harga);
                        $('[name="detail_berat"]').val(data.berat);
                        let Supplierku = data.id_supplier;
                        $.ajax({
                            url: '<?= base_url('Menu/GetSupplier'); ?>',
                            data: {
                                "id_supplier": Supplierku
                            },
                            type: "POST",
                            success: function(supplier) {
                                $('[name="detail_supplier"]').html(supplier);
                            },
                            error: function(data) {
                                alert('AJAX Supplier Part Error :(');
                            }
                        });
                    }
                });
                SpesifikasiModalClose();
            },
            error: function(data) {
                alert(data);
            }
        });
    }

    // Role User Checker
    <?php if (session('role') == 0) : ?>

        function SpecEditmodal(id) {
            $('#Spec_Modal').modal('show');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Menu/EditSpec_Form'); ?>",
                beforeSend: function(data) {
                    $('#Spec_Modal .modal-dialog').removeClass("modal-xl");
                    $('#Spec_Modal .modal-dialog').addClass("modal-lg");
                    $('#Spec_Modal #Spec_Header').removeClass("bg-softblue");
                    $('#Spec_Modal #Spec_Header').addClass("bg-dark");
                    $('#Spec_Modal #Spec_Label').html('<i class="fas fa-fw fa-edit"></i> Edit Spesifikasi Barang');
                },
                success: function(data) {
                    $('#Spec_Form').html(data);
                    $.ajax({
                        url: '<?= base_url('Menu/GetIDItem'); ?>',
                        data: {
                            "id_item": id
                        },
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('[name="sp_nama"]').val(data.nama_item);
                            $('[name="sp_id_item"]').val(data.id_item);
                            $('[name="sp_kode"]').val(data.kode_barang);
                            $('[name="sp_harga"]').val(data.harga);
                            $('[name="sp_berat"]').val(data.berat);
                            // $('[name="sp_supplier"]').val(data.penyimpanan).trigger('change');
                            let Supplierku = data.id_supplier;
                            $.ajax({
                                url: '<?= base_url('Menu/GetSupplier'); ?>',
                                data: {
                                    "id_supplier": Supplierku
                                },
                                type: "POST",
                                success: function(supplier) {
                                    $('[name="sp_supplier"]').html(supplier);
                                },
                                error: function(data) {
                                    alert('AJAX Supplier Part Error :(');
                                }
                            });
                        }
                    });
                    SpesifikasiModalClose();
                },
                error: function(data) {
                    alert('AJAX Error :(');
                }

            });
        }

        // ......................................... Aksi spesifikasi barang.........................................
        $("#Spec_Form").submit('click', function() {
            // e.preventDefault(); tidak berhasil
            $('#Spec_Modal').modal('hide');
            let ItemUrl = '<?= base_url('Menu/EditSpecItem'); ?>';
            $.ajax({
                url: ItemUrl,
                type: "POST",
                data: $('#Spec_Form').serialize(),
                success: function(data) {
                    $('#Spec_Form').html(' ');
                    listSpesifikasi();
                    listItem();
                    listPerizinan();
                }
            });
            return false;
        })
    <?php endif; ?>
</script>
<!-- ============== custom kelola barang-->
<script>
    //......................................... Custom Kelola Barang Function().........................................
    function PairingKodeBarang() {
        $('#Tambah_Section .jenis-barang').change(function() {
            $('#Tambah_Section .kode2').val($(this).val());
            $('#Tambah_Section .hkode2').val($('#Tambah_Section .kode2').val())
        });

        $('#Tambah_Section .penyimpanan').change(function() {
            $('#Tambah_Section .kode1').val($(this).val());
            $('#Tambah_Section .hkode1').val($('#Tambah_Section .kode1').val())
        });
    }
    $(document).ready(function() {
        // get Edit Spesifikasi
        $('.detl-edit-item').on('click', function() {
            // get data from button edit spec
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const kode = $(this).data('kode');
            const harga = $(this).data('harga');
            const berat = $(this).data('berat');
            const supplier = $(this).data('supplier');

            // Set data to Form edit spec
            $('#Edit_spesifikasi #edit_spesifikasi_nama').text(nama);
            $('#Edit_spesifikasi #edit_sp_kode').val(kode);
            $('#Edit_spesifikasi #edit_sp_harga').val(harga);
            $('#Edit_spesifikasi #edit_sp_berat').val(berat);
            const selectsupplier = $('#selectsupplier');
            if (supplier != null) {
                if (supplier == 1) {
                    selectsupplier.val(1).change();
                } else if (supplier == 2) {
                    selectsupplier.val(2).change();
                } else if (supplier == 3) {
                    selectsupplier.val(3).change();
                } else if (supplier == 4) {
                    selectsupplier.val(4).change();
                } else if (supplier == 5) {
                    selectsupplier.val(5).change();
                } else if (supplier == 6) {
                    selectsupplier.val(6).change();
                }
            }
            $('#Edit_spesifikasi #edit_sp_id_item').val(id);
        });

    });

    function detlBarang(id) {
        //get detail spec
        $('.detl-item').on('click', function() {
            // get data from button keluar
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const stok = $(this).data('stok');
            const jenis = $(this).data('jenis');
            const penyimpanan = $(this).data('penyimpanan');
            const kode = $(this).data('kode');
            const harga = $(this).data('harga');
            const berat = $(this).data('berat');
            const supplier = $(this).data('supplier');

            // get detail spesifikasi
            $('#Detail_spesifikasi #detail_nama').val(nama);
            $('#Detail_spesifikasi #detail_stok').val(stok);
            $('#Detail_spesifikasi #detail_jenis').val(jenis);
            $('#Detail_spesifikasi #detail_penyimpanan').val(penyimpanan);
            $('#Detail_spesifikasi #detail_kode').val(kode);
            $('#Detail_spesifikasi #detail_harga').val(harga);
            $('#Detail_spesifikasi #detail_berat').val(berat);
            $('#Detail_spesifikasi #detail_supplier').val(supplier);
            $('#Detail_spesifikasi #detail_id').val(id);
        })
    }
</script>