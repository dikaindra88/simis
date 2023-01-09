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
                    <h1 class="m-0">Update Document Manual</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Document Manual</li>
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
                    <form method="post" action="/Edit-Manual/<?= $manual[0]['id_manual'] ?>" enctype="multipart/form-data">

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Departement</label>
                                    <select class="form-control select2bs4" name="id_departement" data-placeholder="Select Departement" style="width: 100%;">
                                        <option value="<?= $manual[0]['id_departement'] ?>" selected><?= $manual[0]['depart_name'] ?></option>
                                        <?php foreach ($depart as $value) : ?>
                                            <option value="<?= $value['id_departement'] ?>"><?= $value['depart_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="<?= $manual[0]['title'] ?>" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                    <label>Level 1</label>
                                    <input type="text" name="level_1" value="<?= $manual[0]['level_1'] ?>" class="form-control" placeholder="Level 1">
                                </div>
                                <div class="form-group">
                                    <label>Level 2</label>
                                    <input type="text" name="level_2" value="<?= $manual[0]['level_2'] ?>" class="form-control" placeholder="Level 2">
                                </div>
                                <div class="form-group">
                                    <label>Level 3</label>
                                    <input type="text" name="level_3" value="<?= $manual[0]['level_3'] ?>" class="form-control" placeholder="Level 3">
                                </div>
                                <div class="form-group">
                                    <label>Issue</label>
                                    <input type="text" name="issue" value="<?= $manual[0]['issue'] ?>" class="form-control" placeholder="Issue">
                                </div>
                                <div class="form-group">
                                    <label>Revision</label>
                                    <input type="text" name="revision" <?= $manual[0]['revision'] ?> class="form-control" placeholder="Revision">
                                </div>
                                <div class="form-group">
                                    <label>Revision Date</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" name="rev_date" value="<?= $manual[0]['rev_date'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="<?= $manual[0]['rev_date'] ?>" />
                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" name="remark" value="<?= $manual[0]['remark'] ?>" class="form-control" placeholder="Remarks">
                                </div>
                                <div class="form-group">
                                    <div class="file-upload">
                                        <div class="drag-text">
                                            <h5>File Saat ini</h5>
                                        </div>
                                        <div class="file-upload-content1">
                                            <center><label class="file-upload-image1" width="100px" height="100px"><?php echo  $manual[0]['manual'] ?></label></center>
                                            <div class="image-title-wrap1">
                                                <center> <button type="button" onclick="removeUpload1()" class="remove-image">Remove <span class="image-title">Uploaded File</span></button></center>
                                            </div>
                                        </div>
                                        <div class="image-upload-wrap">

                                            <input class="file-upload-input" type="file" name="manual" onchange="readURL(this);" accept="application/*" />
                                            <div class="drag-text">
                                                <h3>Drag and drop a File</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <label class="file-upload-image"><span class="image-title"></span></label>
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded File</span></button>
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
                    <input type="hidden" name="id_manual" value="<?php echo $manual[0]['id_manual']; ?>">
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