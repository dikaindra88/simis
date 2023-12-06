<?php echo view('layouts/Top'); ?>
<?php echo view('layouts/Front-end'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Spare Part Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Spare Part Masuk</li>
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
                            <th width="20%">Tanggal Masuk</th>
                            <td width="1%">:</td>
                            <td><?php echo $in[0]['tgl_masuk'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Kode Barang</th>
                            <td>:</td>
                            <td><?php echo $in[0]['kd_barang'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Nama Barang / Sparepart</th>
                            <td>:</td>
                            <td><?php echo $in[0]['nm_barang'];
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
                            <td><?php echo $in[0]['vendor'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>:</td>
                            <td><?php echo $in[0]['kondisi']; ?></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td>:</td>
                            <td><?php echo $in[0]['qty_in'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Dokumen ARC</th>
                            <td>:</td>
                            <td><a href="<?= base_url('foto/' . $in[0]['document_arc']) ?>" class="preview" target="_blink"><img class="img-thumbnail" width="100px" height="100px" src="<?= base_url('foto/' . $in[0]['document_arc']) ?>"></a></td>
                            </td>
                        </tr>
                        <tr>
                            <th>Rak</th>
                            <td>:</td>
                            <td><?php echo $in[0]['nama_rak'];
                                ?></td>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Di buat</th>
                            <td>:</td>
                            <td><?php echo $in[0]['create_date'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Expired</th>
                            <td>:</td>
                            <td><?php echo $in[0]['exp_date'];
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