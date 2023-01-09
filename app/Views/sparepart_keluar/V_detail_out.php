<?php echo view('layouts/Top'); ?>
<?php echo view('layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Sparepart Outgoing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Data Sparepart Outgoing</li>
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
                        <i class="fa fa-arrow-circle-left"></i> Back
                    </button>
                    <h1></h1>
                    <table class="table table-striped table-middle">
                        <tr>
                            <th width="20%">Date Out</th>
                            <td width="1%">:</td>
                            <td><?php echo $out[0]['date_out'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>:</td>
                            <td><?php echo $out[0]['description'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Part Number</th>
                            <td>:</td>
                            <td><?php echo $out[0]['part_number'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Serial Number</th>
                            <td>:</td>
                            <td><?php echo $out[0]['serial_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Condition</th>
                            <td>:</td>
                            <td><?php echo $out[0]['condition_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Reason Out</th>
                            <td>:</td>
                            <td><?php echo $out[0]['reason_out']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td>:</td>
                            <td><?php echo $out[0]['qty_out'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Oum</th>
                            <td>:</td>
                            <td><?php echo $out[0]['oum_name'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Given To</th>
                            <td>:</td>
                            <td><?php echo $out[0]['name'];
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