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
                    <h1>List Sparepart Overhauled</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Sparepart Overhauled</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            <form action="Overhauled-search" method="POST" enctype="multipart/form-data">
            <div class="row ml-2">
                
                <div class="col-lg-3">
                    <div class="form-group">
                       
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="first_date" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="First Date" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                      <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="End Date" />
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <button type="submit" name="show" class="btn btn-info">Show</button>
                    <a href="<?= base_url('Overhauled/print') . '/' . $first_date . '/' . $end_date?>" target="_blank" class="btn btn-outline btn-danger ">
                        <i class="fas fa-file-pdf"></i> Pdf
                    </a>
                    <a href="<?= base_url('Overhauled/Print') .'/'. $first_date . '/' . $end_date?>" target="_blink"class="btn btn-outline-secondary btn-light">
                        <i class="fas fa-print"></i> Print</a>
                    </div>
                   
                </div>

                <div class="col-lg-3">
                
               
                    

                
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
                        <table class="table table-hover table-striped table-condensed "  id="example3">
                            <thead>
                                <tr class="bg-navy color-light text-center" style=" font-size: 9pt;">
                                    <th>No</th>
                                    <th>Description</th>
                                    <th>Part Number</th>
                                    <th>Serial Number</th>
                                    <!-- <th>Lahir</th> -->
                                    <th>Location</th>
                                    <th>Qty</th>
                                    <th>Oum</th>
                                    <th>Date In</th>
                                    <th>PO / RO</th>
                                    <th>ARC / C of c Form No</th>
                                    <th>ARC / C of c No.</th>
                                    <th>Vendors</th>
                                    <th>condition</th>
                                    <th>Consumable / Rotable</th>
                                    <th>AWB</th>
                                    <th>A/C Reg</th>
                                    <th>MR Number</th>
                                    <th>Remarks</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>

                                <?php foreach ($over  as $rows) : ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?php echo $nomor++ ?>.</td>
                                        <td><?= $rows['description'] ?></td>
                                        <td><?= $rows['part_number'] ?></td>
                                        <td><?= $rows['serial_number'] ?></td>
                                        <td><?= $rows['location_name'] ?></td>
                                        <td><?= $rows['qty_in'] ?></td>
                                        <td><?= $rows['oum_name'] ?></td>
                                        <td><?= $rows['date_in'] ?></td>
                                        <td><?= $rows['order_name'] ?></td>
                                        <td><?= $rows['arc_form_no'] ?></td>
                                        <td><?= $rows['arc_no'] ?></td>
                                        <td><?= $rows['vendors'] ?></td>
                                        <td><?= $rows['condition_name'] ?></td>
                                        <td><?= $rows['consumable'] ?></td>
                                        <td><?= $rows['awb'] ?></td>
                                        <td><?= $rows['acreg_name'] ?></td>
                                        <td><?= $rows['mr_number'] ?></td>
                                        <td><?= $rows['remarks'] ?></td>
                                        </div>
                    </tr>
                <?php endforeach ?>

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