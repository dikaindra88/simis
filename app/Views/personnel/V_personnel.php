<?php

use Faker\Provider\Base;

echo view('layouts/Top') ?>
<?php echo view('layouts/Front-end') ?>
<style>
    .file-upload {
        background-color: #ffffff;
        width: auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #999;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #999;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 15 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #000;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: auto;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

    td {
        font-size: 7pt;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Personnel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Personnel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
                <i class="fas fa-plus"></i>
            </button>
            <a href="<?= base_url('Personnel/Convert') ?>" target="_blank" class="btn btn-outline btn-danger ">
                <i class="fas fa-file-pdf"></i> Pdf
            </a>
            <a href="<?= base_url('Personnel/Print') ?>" target="_blink" class="btn btn-outline-secondary btn-light">
                <i class="fas fa-print"></i> Print</a>
        </div>
    </div>



    <div class="modal fade" id="modal-xl">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family: arial black; color:#000080;font-size:18pt;">&nbsp;Input Data Personnel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img class="modal-title" src="<?= base_url('img/RDG.png') ?>" height="30">
                    </button>

                </div>
                <form method="post" action="Personnel-add" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Position</label>
                                            <select class="form-control select2bs4" name="id_position" data-placeholder="Select Position" style="width: 100%;" required>
                                                <option value="" selected disabled>Choose Item</option>
                                                <?php foreach ($pos as $value) : ?>
                                                    <option value="<?= $value['id_position'] ?>"><?= $value['position_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <small><label>Basic License No.</label></small>
                                        <div class="form-group">
                                            <label>A1</label>
                                            <input type="text" name="a1" class="form-control" placeholder="Basic License No A1">
                                        </div>
                                        <div class="form-group">
                                            <label>A4</label>
                                            <input type="text" name="a4" class="form-control" placeholder="Basic License No A4">
                                        </div>
                                        <div class="form-group">
                                            <label>A2</label>
                                            <input type="text" name="a2" class="form-control" placeholder="Basic License No A2">
                                        </div>
                                        <div class="form-group">
                                            <label>A3</label>
                                            <input type="text" name="a3" class="form-control" placeholder="Basic License No A3">
                                        </div>
                                        <div class="form-group">
                                            <label>C1</label>
                                            <input type="text" name="c1" class="form-control" placeholder="Basic License No C1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <small><label>Basic License No.</label></small>
                                        <div class="form-group">
                                            <label>C2</label>
                                            <input type="text" name="c2" class="form-control" placeholder="Basic License No C2">
                                        </div>
                                        <div class="form-group">
                                            <label>C4</label>
                                            <input type="text" name="c4" class="form-control" placeholder="Basic License No C4">
                                        </div>
                                        <div class="form-group">
                                            <label>AMEL No.</label>
                                            <input type="text" name="amel_no" class="form-control" placeholder="AMEL No.">
                                        </div>
                                        <div class="form-group">
                                            <label>AMEL Validity</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="amel_valid" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="AMEL Validity" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Company Authorized</label>
                                            <input type="text" name="auth_name" class="form-control" placeholder="Company Authorized">
                                        </div>
                                        <div class="form-group">
                                            <label>Company Authorized Validity</label>
                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                <input type="text" name="auth_valid" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="Authorized Validity" />
                                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>RII No.</label>
                                            <input type="text" name="rii_no" class="form-control" placeholder="RII No.">
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Aircraft Type</label>
                                            <input type="text" name="ac_type" class="form-control" placeholder="Aircraft Type">
                                        </div>
                                        <div class="form-group">
                                            <label>Basic Indoctrination</label>
                                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                <input type="text" name="date_bi" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="Basic Indoctrination" />
                                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <small><label>Human Factor</label></small>
                                        <div class="form-group">
                                            <label>Initial</label>
                                            <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                                <input type="text" name="date_hf_initial" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="Human Factor Initial" />
                                                <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Rec</label>
                                            <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                <input type="text" name="date_hf_lastrec" class="form-control datetimepicker-input" data-target="#reservationdate4" placeholder="Human Factor Last Rec" />
                                                <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Next Rec</label>
                                            <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                                                <input type="text" name="date_hf_nextrec" class="form-control datetimepicker-input" data-target="#reservationdate5" placeholder="Human Factor Next Rec" />
                                                <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Training of Trainer</label>
                                            <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                                                <input type="text" name="date_tot" class="form-control datetimepicker-input" data-target="#reservationdate6" placeholder="Training of Trainer" />
                                                <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Basic Engineering & PPC</label>
                                            <div class="input-group date" id="reservationdate7" data-target-input="nearest">
                                                <input type="text" name="date_be_ppc" class="form-control datetimepicker-input" data-target="#reservationdate7" placeholder="Basic Engineering & PPC" />
                                                <div class="input-group-append" data-target="#reservationdate7" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Logistic / Material Handling</label>
                                            <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                                                <input type="text" name="date_material" class="form-control datetimepicker-input" data-target="#reservationdate8" placeholder="Logistic / Material Handling" />
                                                <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <small><label>Aircraft Type Rating Course</label></small>
                                        <div class="form-group">
                                            <label>Initial</label>
                                            <div class="input-group date" id="reservationdate9" data-target-input="nearest">
                                                <input type="text" name="date_atrc_initial" class="form-control datetimepicker-input" data-target="#reservationdate9" placeholder="Aircraft Type Rating Course Initial" />
                                                <div class="input-group-append" data-target="#reservationdate9" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Rec</label>
                                            <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                                                <input type="text" name="date_atrc_lastrec" class="form-control datetimepicker-input" data-target="#reservationdate10" placeholder="Aircraft Type Rating Course Last Rec" />
                                                <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Next Rec</label>
                                            <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                                                <input type="text" name="date_atrc_nextrec" class="form-control datetimepicker-input" data-target="#reservationdate11" placeholder="Aircraft Type Rating Course Next Rec" />
                                                <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>INSP / RII</label>
                                            <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                                                <input type="text" name="date_insp_rii" class="form-control datetimepicker-input" data-target="#reservationdate12" placeholder="INSP / RII" />
                                                <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Safety Management System</label>
                                            <div class="input-group date" id="reservationdate13" data-target-input="nearest">
                                                <input type="text" name="date_sms" class="form-control datetimepicker-input" data-target="#reservationdate13" placeholder="Safety Management System" />
                                                <div class="input-group-append" data-target="#reservationdate13" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>RVSM</label>
                                            <div class="input-group date" id="reservationdate14" data-target-input="nearest">
                                                <input type="text" name="date_rvsm" class="form-control datetimepicker-input" data-target="#reservationdate14" placeholder="RVSM" />
                                                <div class="input-group-append" data-target="#reservationdate14" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>PBN</label>
                                            <div class="input-group date" id="reservationdate15" data-target-input="nearest">
                                                <input type="text" name="date_pbn" class="form-control datetimepicker-input" data-target="#reservationdate15" placeholder="PBN" />
                                                <div class="input-group-append" data-target="#reservationdate15" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Document Personnel</i></label>

                                            <div class="file-upload">
                                                <div class="image-upload-wrap">
                                                    <input class="file-upload-input" type='file' name="doc_person" onchange="readURL(this);" accept="application/*" />
                                                    <div class="drag-text">
                                                        <h6>Click or Drag and drop a File</h6>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <center><small><label class="image-title"> <span class="image-title">Uploaded File</span> </label></small></center>
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="remove-image"><small><span>Remove Uploaded File</span></small></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- /.form-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
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
                        <table class="table table-hover table-striped table-condensed " id="example3">
                            <thead>
                                <tr class="bg-navy color-light text-center" style=" font-size: 7pt;">
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Position</th>
                                    <th colspan="7">Basic License No.</th>
                                    <th rowspan="2"> AMEL No.</th>
                                    <th rowspan="2">AMEL Validity</th>
                                    <th rowspan="2">Company Authorized</th>
                                    <th rowspan="2">Company Authorized Validity</th>
                                    <th rowspan="2">RII No.</th>
                                    <th rowspan="2">Aircraft Type</th>
                                    <th rowspan="2">Basic Indoctrination</th>
                                    <th colspan="3">Human Factor</th>
                                    <th rowspan="2">Training of Trainer</th>
                                    <th rowspan="2">Basic Engineering & PPC</th>
                                    <th rowspan="2">Logistic / Material Handling</th>
                                    <th colspan="3">Aircraft Type Rating Course</th>
                                    <th rowspan="2">INSP/RII</th>
                                    <th rowspan="2">SMS</th>
                                    <th rowspan="2">RVSM</th>
                                    <th rowspan="2">PBN</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr class="bg-navy color-light text-center" style=" font-size: 7pt;">
                                    <th>A1</th>
                                    <th>A4</th>
                                    <th>A2</th>
                                    <th>A3</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C4</th>

                                    <th>Initial</th>
                                    <th>Last Rec</th>
                                    <th>Next Rec</th>

                                    <th>Initial</th>
                                    <th>Last Rec</th>
                                    <th>Next Rec</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="text-center" style="padding: 5%; font-size: 7pt;">
                                    <?php $nomor = 1; ?>
                                    <?php foreach ($person as $row) : ?>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['position_name'] ?></td>
                                        <td><?= $row['a1'] ?></td>
                                        <td><?= $row['a4'] ?></td>
                                        <td><?= $row['a2'] ?></td>
                                        <td><?= $row['a3'] ?></td>
                                        <td><?= $row['c1'] ?></td>
                                        <td><?= $row['c2'] ?></td>
                                        <td><?= $row['c4'] ?></td>
                                        <td><?= $row['amel_no'] ?></td>
                                        <td><?= $row['amel_valid'] ?></td>
                                        <td><?= $row['auth_name'] ?></td>
                                        <td><?= $row['auth_valid'] ?></td>
                                        <td><?= $row['rii_no'] ?></td>
                                        <td><?= $row['ac_type'] ?></td>
                                        <td><?= $row['date_bi'] ?></td>
                                        <td><?= $row['date_hf_initial'] ?></td>
                                        <td><?= $row['date_hf_lastrec'] ?></td>
                                        <td><?= $row['date_hf_nextrec'] ?></td>
                                        <td><?= $row['date_tot'] ?></td>
                                        <td><?= $row['date_be_ppc'] ?></td>
                                        <td><?= $row['date_material'] ?></td>
                                        <td><?= $row['date_atrc_initial'] ?></td>
                                        <td><?= $row['date_atrc_lastrec'] ?></td>
                                        <td><?= $row['date_atrc_nextrec'] ?></td>
                                        <td><?= $row['date_insp_rii'] ?></td>
                                        <td><?= $row['date_sms'] ?></td>
                                        <td><?= $row['date_rvsm'] ?></td>
                                        <td><?= $row['date_pbn'] ?></td>
                                        <td>
                                            <div class="nav-item dropup">
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                    <i class="far fa-caret-square-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="<?= base_url('/Personnel/pdf') . '/' . $row['id_personnel'] ?>" method="post" target="__blink">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-file-pdf"></i>
                                                            Document
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('/Personnel/update') . '/' . $row['id_personnel'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                                                            Update
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('/Personnel/Delete') . '/' . $row['id_personnel'] ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="Delete">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin?');"><i class="nav-icon fas fa-trash-alt"></i>
                                                            Delete
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
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-image1').hide();
                    $('.file-upload-content').show();
                    $('.file-upload-content1').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }

        function removeUpload1() {

            $('.file-upload-content1').hide();
            $('.image-title-wrap1').hide();
        }
        $('.image-upload-wrap').bind('dragover', function() {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function() {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $('#flash_data').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove()
            });
        }, 2500);
    </script>
    <?php echo view('layouts/Bottom') ?>