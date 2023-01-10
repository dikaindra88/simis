<?php echo view('layouts/Top') ?>
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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Data Personnel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Data Personnel</li>
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
                    <form method="post" action="/Edit-Personnel/<?= $person[0]['id_personnel'] ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <small><label>Name</label></small>
                                            <input type="text" name="name" value="<?= $person[0]['name'] ?>" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <small><label>Position</label></small>
                                            <select class="form-control select2bs4" name="id_position" data-placeholder="Select Position" style="width: 100%;">
                                                <option value="<?= $person[0]['id_position'] ?>" selected><?= $person[0]['position_name'] ?></option>
                                                <?php foreach ($pos as $value) : ?>
                                                    <option value="<?= $value['id_position'] ?>"><?= $value['position_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <small><label>Basic License No.</label></small>
                                        <div class="form-group">
                                            <small><label>A1</label></small>
                                            <input type="text" name="a1" value="<?= $person[0]['a1'] ?>" class="form-control" placeholder="Basic License No A1">
                                        </div>
                                        <div class="form-group">
                                            <small><label>A4</label></small>
                                            <input type="text" name="a4" value="<?= $person[0]['a4'] ?>" class="form-control" placeholder="Basic License No A4">
                                        </div>
                                        <div class="form-group">
                                            <small><label>A2</label></small>
                                            <input type="text" name="a2" value="<?= $person[0]['a2'] ?>" class="form-control" placeholder="Basic License No A2">
                                        </div>
                                        <div class="form-group">
                                            <small><label>A3</label></small>
                                            <input type="text" name="a3" value="<?= $person[0]['a3'] ?>" class="form-control" placeholder="Basic License No A3">
                                        </div>
                                        <div class="form-group">
                                            <small><label>C1</label></small>
                                            <input type="text" name="c1" value="<?= $person[0]['c1'] ?>" class="form-control" placeholder="Basic License No C1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <small><label>Basic License No.</label></small>
                                        <div class="form-group">
                                            <small><label>C2</label></small>
                                            <input type="text" name="c2" value="<?= $person[0]['c2'] ?>" class="form-control" placeholder="Basic License No C2">
                                        </div>
                                        <div class="form-group">
                                            <small><label>C4</label></small>
                                            <input type="text" name="c4" value="<?= $person[0]['c4'] ?>" class="form-control" placeholder="Basic License No C4">
                                        </div>
                                        <div class="form-group">
                                            <small><label>AMEL No.</label></small>
                                            <input type="text" name="amel_no" value="<?= $person[0]['amel_no'] ?>" class="form-control" placeholder="AMEL No.">
                                        </div>
                                        <div class="form-group">
                                            <small><label>AMEL Validity</label></small>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="amel_valid" value="<?= $person[0]['amel_valid'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="<?= $person[0]['amel_valid'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Company Authorized</label></small>
                                            <input type="text" name="auth_name" value="<?= $person[0]['auth_name'] ?>" class="form-control" placeholder="Company Authorized">
                                        </div>
                                        <div class="form-group">
                                            <small><label>Company Authorized Validity</label></small>
                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                <input type="text" name="auth_valid" value="<?= $person[0]['auth_valid'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="<?= $person[0]['auth_valid'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>RII No.</label></small>
                                            <input type="text" name="rii_no" value="<?= $person[0]['rii_no'] ?>" class="form-control" placeholder="RII No.">
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <small><label>Aircraft Type</label></small>
                                            <input type="text" name="ac_type" value="<?= $person[0]['ac_type'] ?>" class="form-control" placeholder="Aircraft Type">
                                        </div>
                                        <div class="form-group">
                                            <small><label>Basic Indoctrination</label></small>
                                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                <input type="text" name="date_bi" value="<?= $person[0]['date_bi'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="<?= $person[0]['date_bi'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <small><label>Human Factor</label></small>
                                        <div class="form-group">
                                            <small><label>Initial</label></small>
                                            <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                                <input type="text" name="date_hf_initial" value="<?= $person[0]['date_hf_initial'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="<?= $person[0]['date_hf_initial'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Last Rec</label></small>
                                            <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                <input type="text" name="date_hf_lastrec" value="<?= $person[0]['date_hf_lastrec'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate4" placeholder="<?= $person[0]['date_hf_lastrec'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Next Rec</label></small>
                                            <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                                                <input type="text" name="date_hf_nextrec" value="<?= $person[0]['date_hf_nextrec'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate5" placeholder="<?= $person[0]['date_hf_nextrec'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Training of Trainer</label></small>
                                            <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                                                <input type="text" name="date_tot" value="<?= $person[0]['date_tot'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate6" placeholder="<?= $person[0]['date_tot'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Basic Engineering & PPC</label></small>
                                            <div class="input-group date" id="reservationdate7" data-target-input="nearest">
                                                <input type="text" name="date_be_ppc" value="<?= $person[0]['date_be_ppc'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate7" placeholder="<?= $person[0]['date_be_ppc'] ?>" />
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
                                            <small><label>Logistic / Material Handling</label></small>
                                            <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                                                <input type="text" name="date_material" value="<?= $person[0]['date_material'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate8" placeholder="<?= $person[0]['date_material'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <small><label>Aircraft Type Rating Course</label></small>
                                        <div class="form-group">
                                            <small><label>Initial</label></small>
                                            <div class="input-group date" id="reservationdate9" data-target-input="nearest">
                                                <input type="text" name="date_atrc_initial" value="<?= $person[0]['date_atrc_initial'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate9" placeholder="date_atrc_initial" />
                                                <div class="input-group-append" data-target="#reservationdate9" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Last Rec</label></small>
                                            <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                                                <input type="text" name="date_atrc_lastrec" value="<?= $person[0]['date_atrc_lastrec'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate10" placeholder="<?= $person[0]['date_atrc_lastrec'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Next Rec</label></small>
                                            <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                                                <input type="text" name="date_atrc_nextrec" value="<?= $person[0]['date_atrc_nextrec'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate11" placeholder="<?= $person[0]['date_atrc_nextrec'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>INSP / RII</label></small>
                                            <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                                                <input type="text" name="date_insp_rii" value="<?= $person[0]['date_insp_rii'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate12" placeholder="<?= $person[0]['date_insp_rii'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Safety Management System</label></small>
                                            <div class="input-group date" id="reservationdate13" data-target-input="nearest">
                                                <input type="text" name="date_sms" value="<?= $person[0]['date_sms'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate13" placeholder="<?= $person[0]['date_sms'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate13" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>RVSM</label></small>
                                            <div class="input-group date" id="reservationdate14" data-target-input="nearest">
                                                <input type="text" name="date_rvsm" value="<?= $person[0]['date_rvsm'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate14" placeholder="<?= $person[0]['date_rvsm'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate14" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>PBN</label></small>
                                            <div class="input-group date" id="reservationdate15" data-target-input="nearest">
                                                <input type="text" name="date_pbn" value="<?= $person[0]['date_pbn'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate15" placeholder="<?= $person[0]['date_pbn'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate15" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small><label>Document Personnel</label></small>
                                            <div class="file-upload">
                                                <div class="drag-text">
                                                    <small>
                                                        <h6>File Saat ini</h6>
                                                    </small>
                                                </div>
                                                <div class="file-upload-content1">
                                                    <center><small><label class="file-upload-image1" width="100px" height="100px"><?php echo  $person[0]['doc_person'] ?></label></small></center>
                                                    <div class="image-title-wrap1">
                                                        <center> <button type="button" onclick="removeUpload1()" class="remove-image"><small><span>Remove Uploaded File</span></small></button></center>
                                                    </div>
                                                </div>
                                                <div class="image-upload-wrap">

                                                    <input class="file-upload-input" type="file" name="doc_person" onchange="readURL(this);" accept="application/*" />
                                                    <div class="drag-text">
                                                        <h6>Drag and drop a File</h6>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <small> <label class="file-upload-image"><span class="image-title"></span></label></small>
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

                </div>
                <div class="card-footer bg-transparent border-success">
                    <button type="submit" class="btn btn-outline-success d-grid gap-2 col-2 mx-auto">
                        <i class="far fa-save"></i> Save
                    </button>
                    <button type="button" class="btn btn-outline-danger d-grid gap-2 col-2 mx-auto" onclick="javascript:history.back()">
                        <i class="fa fa-arrow-circle-left"></i> Cancel
                    </button>
                    <input type="hidden" name="id_personnel" value="<?php echo $person[0]['id_personnel']; ?>">
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