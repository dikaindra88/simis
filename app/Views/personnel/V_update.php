<?php echo view('layouts/Top') ?>
<?php echo view('layouts/Front-end2') ?>
<style>
    #upload {
        opacity: 0;
    }

    #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }

    .image-area {
        border: 2px dashed rgba(255, 255, 255, 0.7);
        padding: 1rem;
        position: relative;
    }

    .image-area::before {
        content: 'Uploaded image result';
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 0.8rem;
        z-index: 1;
    }

    .image-area img {
        z-index: 2;
        position: relative;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Request Barang / Sparepart</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ubah Request</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="/Edit-request-personnel/<?= $req[0]['id_request'] ?>" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tanggal Request</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="tgl_request" value="<?php echo $req[0]['tgl_request'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="<?php echo $req[0]['tgl_request'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" value="<?php echo $req[0]['nama'] ?>" class="form-control" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nip</label>
                                            <input type="text" name="nip" value="<?php echo $req[0]['nip'] ?>" class="form-control" placeholder="Nomor Induk Pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Departement</label>
                                            <select class="form-control select2bs4" name="id_depart" data-placeholder="Pilih Departement" style="width: 100%;">
                                                <option value="<?php echo $req[0]['id_depart'] ?>" selected><?php echo $req[0]['departement'] ?></option>
                                                <?php foreach ($person as $value) : ?>
                                                    <option value="<?= $value['id_depart'] ?>"><?= $value['departement'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Barang / Sparepart</label>
                                            <select class="form-control select2bs4" name="kd_barang" data-placeholder="Pilih Barang / Sparepart" style="width: 100%;">
                                                <option value="<?php echo $req[0]['kd_barang'] ?>" selected><?php echo $req[0]['nm_barang'] ?></option>
                                                <?php foreach ($sparepart as $row) : ?>
                                                    <option value="<?= $row['kd_barang'] ?>"><?= $row['nm_barang'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keperluan</label>
                                            <input type="text" name="keperluan" value="<?php echo $req[0]['keperluan'] ?>" id="serial_number" class="form-control" placeholder="Keperluan">
                                        </div>
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" name="qty" value="<?php echo $req[0]['qty'] ?>" class="form-control" placeholder="Quantity">
                                        </div>
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control select2bs4" name="id_satuan" data-placeholder="Pilih Satuan" style="width: 100%;">
                                                <option value="<?php echo $req[0]['id_satuan'] ?>" selected><?php echo $req[0]['satuan'] ?></option>
                                                <?php foreach ($oum as $value) : ?>
                                                    <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer bg-transparent border-success">
                    <button type="submit" class="btn btn-outline-success d-grid gap-2 col-2 mx-auto">
                        <i class="far fa-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-outline-danger d-grid gap-2 col-2 mx-auto" onclick="javascript:history.back()">
                        <i class="fa fa-arrow-circle-left"></i> Batal
                    </button>
                    <input type="hidden" name="id_request" value="<?php echo $req[0]['id_request']; ?>">
                </div>
            </div>
        </div>
</div>
</section>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function() {
        $('#upload').on('change', function() {
            readURL(input);
        });
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
<?php echo view('layouts/Bottom') ?>