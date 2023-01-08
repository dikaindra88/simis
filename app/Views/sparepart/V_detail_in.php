<?php echo view('layouts/Top'); ?>
<?php echo view('layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Sparepart Incoming</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Detail Sparepart Incoming</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
                        <i class="fa fa-arrow-circle-left"></i> Kembali
                    </button>
                    <h1></h1>
                    <table class="table table-middle">
                        <tr>
                            <th width="20%">Date In</th>
                            <td width="1%">:</td>
                            <td><?php echo $in[0]['date_in'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>:</td>
                            <td><?php echo $in[0]['description'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Part Number</th>
                            <td>:</td>
                            <td><?php echo $in[0]['part_number'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Serial Number</th>
                            <td>:</td>
                            <td><?php echo $in[0]['serial_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Vendors</th>
                            <td>:</td>
                            <td><?php echo $in[0]['vendors'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Condition</th>
                            <td>:</td>
                            <td><?php echo $in[0]['condition_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td>:</td>
                            <td><?php echo $in[0]['qty_in'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>:</td>
                            <td><a href="<?= base_url('foto/' . $in[0]['image']) ?>" class="preview" target="_blink"><img class="img-thumbnail" width="100px" height="100px" src="<?= base_url('foto/' . $in[0]['image']) ?>"></a></td>
                            </td>
                        </tr>
                        <tr>
                            <th>Document</th>
                            <td>:</td>
                            <td><?php echo $in[0]['document'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Create Date</th>
                            <td>:</td>
                            <td><?php echo $in[0]['create_date'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Expired Date</th>
                            <td>:</td>
                            <td><?php echo $in[0]['expired_date'];
                                ?></td>
                        </tr>
                    </table>

                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>

<!-- /.content-wrapper -->



<?php echo view('layouts/Bottom'); ?>