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
        padding: 0 15px 15px 15px;
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
        width: 200px;
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
                    <h1 class="m-0">Update Data Sparepart Incoming</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Data Sparepart Incoming</li>
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
                    <form method="post" action="/Edit-in/<?= $in[0]['id_partin'] ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Description</label>
                                            <select class="form-control select2bs4" name="kd_sparepart" data-placeholder="Select a State" style="width: 100%;">
                                                <option value="<?php echo $in[0]['kd_sparepart'] ?>" selected><?php echo $in[0]['description'] ?></option>
                                                <?php foreach ($sparepart as $row) : ?>
                                                    <option value="<?= $row['kd_sparepart'] ?>"><?= $row['description'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Part Number</label>
                                            <input type="text" value="<?= $in[0]['part_number'] ?>" name="part_number" class="form-control" placeholder="Part number item">
                                        </div>
                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <input type="text" value="<?= $in[0]['serial_number'] ?>" name="serial_number" class="form-control" placeholder="Serial number item">
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control select2bs4" name="id_location" data-placeholder="Select a State" style="width: 100%;">
                                                <option selected="selected" value="<?= $in[0]['id_location'] ?>"><?= $in[0]['location_name'] ?></option>
                                                <?php foreach ($location as $row) : ?>
                                                    <option value="<?= $row['id_location'] ?>"><?= $row['location_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" value="<?= $in[0]['qty_in'] ?>" name="qty_in" class="form-control" placeholder="Quantity">
                                        </div>
                                        <div class="form-group">
                                            <label>OUM</label>
                                            <select class="form-control select2bs4" name="id_oum" data-placeholder="Select a State" style="width: 100%;">
                                                <option selected="selected" value="<?= $in[0]['id_oum'] ?>"><?= $in[0]['oum_name'] ?></option>
                                                <?php foreach ($oum as $row) : ?>
                                                    <option value="<?= $row['id_oum'] ?>"><?= $row['oum_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date in</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="date_in" value="<?php echo $in[0]['date_in'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="<?php echo $in[0]['date_in'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>PO / RO</label>
                                            <select class="form-control select2bs4" name="id_pro" style="width: 100%;">
                                                <option selected="selected" value="<?= $in[0]['id_pro'] ?>"><?= $in[0]['order_name'] ?></option>
                                                <?php foreach ($order as $row) : ?>
                                                    <option value="<?= $row['id_pro'] ?>"><?= $row['order_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>ARC Form Number</label>
                                            <input type="text" value="<?= $in[0]['arc_form_no'] ?>" name="arc_form_no" class="form-control" placeholder="ARC Form Number">
                                        </div>
                                        <div class="form-group">
                                            <label>ARC Number</label>
                                            <input type="text" value="<?= $in[0]['arc_no'] ?>" name="arc_no" class="form-control" placeholder="ARC Number">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Vendors</label>
                                            <input type="text" value="<?= $in[0]['vendors'] ?>" name="vendors" class="form-control" placeholder="Vendor Name">
                                        </div>

                                        <div class="form-group">
                                            <label>Conditions</label>
                                            <select class="form-control select2bs4" name="id_condition" data-placeholder="Select a State" style="width: 100%;">
                                                <option selected="selected" value="<?= $in[0]['id_condition'] ?>"><?= $in[0]['condition_name'] ?></option>
                                                <?php foreach ($condition as $row) : ?>
                                                    <option value="<?= $row['id_condition'] ?>"><?= $row['condition_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Consumable</label>
                                            <input type="text" value="<?= $in[0]['consumable'] ?>" name="consumable" class="form-control" placeholder="Consumable">
                                        </div>
                                        <div class="form-group">
                                            <label>AWB</label>
                                            <input type="text" value="<?= $in[0]['awb'] ?>" name="awb" class="form-control" placeholder="Air Way Bill Number">
                                        </div>
                                        <div class="form-group">
                                            <label>A / C Registration</label>
                                            <select class="form-control select2bs4" name="id_acreg" data-placeholder="Select a State" style="width: 100%;">
                                                <option selected="selected" value="<?= $in[0]['id_acreg'] ?>"><?= $in[0]['acreg_name'] ?></option>
                                                <?php foreach ($acreg as $row) : ?>
                                                    <option value="<?= $row['id_acreg'] ?>"><?= $row['acreg_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>MR Number</label>
                                            <input type="text" value="<?= $in[0]['mr_number'] ?>" name="mr_number" class="form-control" placeholder="MR Number">
                                        </div>

                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <input type="text" value="<?= $in[0]['remarks'] ?>" name="remarks" class="form-control" placeholder="Remarks">
                                        </div>
                                        <div class="form-group">
                                            <label>Document</label>

                                            <div class="form-group clearfix">
                                                <?php
                                                if ($in[0]['document'] == 'yes') {
                                                ?>
                                                    <div class="icheck-primary d-inline">

                                                        <input type="checkbox" name="document" value="yes" id="checkboxPrimary1" checked="checked">
                                                        <label for="checkboxPrimary1">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="document" value="no" id="checkboxPrimary2">
                                                        <label for="checkboxPrimary2">No
                                                        </label>
                                                    </div>
                                                <?php } elseif ($in[0]['document'] == 'no') {
                                                ?>
                                                    <div class="icheck-primary d-inline">

                                                        <input type="checkbox" name="document" value="yes" id="checkboxPrimary1">
                                                        <label for="checkboxPrimary1">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="document" value="no" id="checkboxPrimary2" checked="checked">
                                                        <label for="checkboxPrimary2">No
                                                        </label>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="icheck-primary d-inline">

                                                        <input type="checkbox" name="document" value="yes" id="checkboxPrimary1">
                                                        <label for="checkboxPrimary1">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="document" value="no" id="checkboxPrimary2">
                                                        <label for="checkboxPrimary2">No
                                                        </label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Create_date</label>
                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                <input type="text" name="create_date" value="<?php echo $in[0]['create_date'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="<?php echo $in[0]['create_date'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Date in</label>
                                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                <input type="text" name="expired_date" value="<?php echo $in[0]['expired_date'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="<?php echo $in[0]['expired_date'] ?>" />
                                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="file-upload">
                                                <div class="drag-text">
                                                    <h5>Gambar Saat ini</h5>
                                                </div>
                                                <div class="file-upload-content1">
                                                    <center><img class="file-upload-image1" width="100px" height="100px" src="<?php echo base_url('foto/' . $in[0]['document_arc']) ?>" alt="your image" /></center>
                                                    <div class="image-title-wrap1">
                                                        <center> <button type="button" onclick="removeUpload1()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button></center>
                                                    </div>
                                                </div>
                                                <div class="image-upload-wrap">

                                                    <input class="file-upload-input" type="file" name="document_arc" onchange="readURL(this);" accept="image/*" />
                                                    <div class="drag-text">
                                                        <h3>Drag and drop a Image</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" width="100px" height="100px" src="#" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
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
                    <input type="hidden" name="id_partin" value="<?php echo $in[0]['id_partin']; ?>">
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
<?php echo view('layouts/Bottom') ?>