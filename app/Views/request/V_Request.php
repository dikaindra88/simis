<?php

use Faker\Provider\Base;

echo view('layouts/Top') ?>
<?php echo view('layouts/Front-end') ?>
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
                    <h1 class="m-0">Data Request</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Request</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>

        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <?php
            session()->getFlashdata('pesan');
            if (session()->getFlashdata('pesan')) {
                echo '  <div class="mt-4 swalDefaultSuccess">
                       
                        ';

                echo '</div>';
            } ?>
            <div class="card">

                <!-- /.card-header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-condensed " id="example3">
                            <thead>
                                <tr class="text-center" style=" font-size: 9pt;">
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Departement</th>
                                    <th>Tanggal Request</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Keperluan</th>
                                    <th>Approve</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($request as $row) : ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['nip'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['departement'] ?></td>
                                        <td><?= $row['tgl_request'] ?></td>
                                        <td><?= $row['nm_barang'] ?></td>
                                        <td><?= $row['qty'] ?></td>
                                        <td><?= $row['satuan'] ?></td>
                                        <td><?= $row['keperluan'] ?></td>
                                        <td><?php if ($row['approve'] == 'progress') {
                                            ?>
                                                <button class="btn btn-warning btn-sm" disabled>Progress</button>
                                            <?php  } elseif ($row['approve'] == 'approve') { ?>
                                                <button class="btn btn-success btn-sm" disabled>Approve</button>
                                            <?php  } elseif ($row['approve'] == 'not approve') { ?>
                                                <button class="btn btn-danger btn-sm" disabled>Not Approve</button>
                                            <?php  } ?>
                                        </td>
                                        <td>

                                            <div class="nav-item dropup">
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                    <i class="far fa-caret-square-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="<?= base_url('/Request-sparepart/update') . '/' . $row['id_request'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                                                            Ubah
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.modal-dialog -->
    <!-- /.container-fluid -->

    <!-- /.content-header -->
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
    <!-- <script>
    $('#description').on('change', function(event) {
      getData(event.target.value).then(out => {
        $('#part_number').val(out.part_number);
        $('#serial_number').val(out.serial_number);
      });
    });

    async function getData(id_partin) {
      let response = await fetch('/api/home/' + id_partin)
      let data = await response.json();

      return data;
    }
  </script> -->
    <?php echo view('layouts/Bottom') ?>