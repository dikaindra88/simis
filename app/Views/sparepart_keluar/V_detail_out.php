<?php echo view('layouts/Top'); ?>
<?php echo view('layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Sparepart Keluar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Data Sparepart Keluar</li>
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
                    <table class="table table-striped table-middle">
                        <tr>
                            <th width="20%">Tanggal Keluar</th>
                            <td width="1%">:</td>
                            <td><?php echo $out[0]['tgl_keluar'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Nama Barang / Sparepart</th>
                            <td>:</td>
                            <td><?php echo $out[0]['nm_barang'];
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
                            <th>Kondisi</th>
                            <td>:</td>
                            <td><?php echo $out[0]['kondisi']; ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td><?php echo $out[0]['keterangan']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td>:</td>
                            <td><?php echo $out[0]['qty_out'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td>:</td>
                            <td><?php echo $out[0]['satuan'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Di Berikan Kepada</th>
                            <td>:</td>
                            <td><?php echo $out[0]['nama_personnel'];
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