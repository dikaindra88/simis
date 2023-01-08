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
                                                <option selected="selected" value="<?=$in[0]['id_location'] ?>"><?= $in[0]['location_name'] ?></option>
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
                                                <option selected="selected" value="<?= $in[0]['id_pro']?>"><?= $in[0]['order_name'] ?></option>
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
                                                <option selected="selected" value="<?= $in[0]['id_acreg']?>"><?= $in[0]['acreg_name'] ?></option>
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
                                            <label>Image Item</label>
                                            <div class="row py-4">
                                                <div class="col-lg-6 mx-auto">
                                                    <p class="text-center">Gambar Saat ini</p>
                                                    <div class="image-area"><img id="imageResult" height="100px" width="100px" src="<?= base_url('foto/' . $in[0]['image']) ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                    <!-- Upload image input-->
                                                    <div class="input-group mb-0 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                        <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                                                        <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                                                        <div class="input-group-append">
                                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class=" font-weight-bold text-muted">Choose Image</small></label>
                                                        </div>
                                                    </div>

                                                    <!-- Uploaded image area-->

                                                    <!-- <div class="image-area mt-1"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div> -->

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