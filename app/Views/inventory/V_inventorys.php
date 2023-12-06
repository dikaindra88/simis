<?php echo view('layouts/Top') ?>
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
                    <h1>Laporan Inventory Sparepart</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Inventory Sparepart</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            <form action="Report-search" method="POST" enctype="multipart/form-data">
                <div class="row ml-2">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <a href="<?= base_url('Report/Prints') ?>" target="_blank" class="btn btn-outline btn-danger ">
                                <i class="fas fa-file-pdf"></i> Pdf
                            </a>
                            <a href="<?= base_url('print-stock') ?>" target="_blink" class="btn btn-outline-secondary btn-light">
                                <i class="fas fa-print"></i> Cetak</a>
                        </div>
                    </div>


                </div>
            </form>

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
                                    <th>Kode Barang</th>
                                    <th>Nama Barang / Sparepart</th>
                                    <th>Stock</th>
                                    <th>Satuan</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>

                                <?php foreach ($sparepart  as $row) : ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?php echo $nomor++ ?>.</td>
                                        <td><?= $row['kd_barang'] ?></td>
                                        <td><?= $row['nm_barang'] ?></td>
                                        <td><?= $row['stock'] ?></td>
                                        <td><?= $row['satuan'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                    </div>
                    </tbody>
                    </table>
                </div>
            </div>

            <!-- /.modal-dialog -->


        </div>
    </section><!-- /.container-fluid -->

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
    <?php echo view('layouts/Bottom') ?>