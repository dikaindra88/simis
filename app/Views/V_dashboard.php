<?php echo view('layouts/Top') ?>
<?php echo view('layouts/Front-end') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tools"></i></span>

            <div class="info-box-content">
              <small><span class="info-box-text">Sparepart</span></small>
              <span class="info-box-number">
                <?php echo $sparepart ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="far fa-arrow-alt-circle-down"></i></span>

            <div class="info-box-content">
              <small><span class="info-box-text">Incoming</span></small>
              <span class="info-box-number"><?php echo $sparepartin ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="far fa-arrow-alt-circle-up"></i></span>

            <div class="info-box-content">
              <small><span class="info-box-text">Outgoing</span></small>
              <span class="info-box-number"><?php echo $sparepartout ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <small><span class="info-box-text">Users</span></small>
              <span class="info-box-number"><?php echo $users ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box">
            <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-user-tie"></i></span>

            <div class="info-box-content">
              <small><span class="info-box-text">Personnel</span></small>
              <span class="info-box-number">
                <?php echo $person ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-2">
          <div class="info-box">
            <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-swatchbook"></i></span>

            <div class="info-box-content">
              <small><span class="info-box-text">Manual</span></small>
              <span class="info-box-number">
                <?php echo $manual ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- /.row -->
    </div>

    <?php echo view('layouts/Bottom') ?>