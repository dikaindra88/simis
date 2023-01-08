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
          <h1 class="m-0">Data Sparepart Incoming</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Sparepart Incoming</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <hr>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
        <i class="fas fa-plus"></i>
      </button>

    </div>
  </div>



  <div class="modal fade" id="modal-xl">

    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="font-family: arial black; color:#000080;font-size:18pt;">&nbsp;Input Sparepart Masuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img class="modal-title" src="<?= base_url('img/RDG.png') ?>" height="30">
          </button>

        </div>
        <form method="post" action="Add" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">



              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">

                    <div class="form-group">
                      <label>Description</label>
                      <select name="kd_sparepart" id="kd_sparepart" data-placeholder="Select Item" class="form-control select2bs4" required>
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($sparepart as $value) : ?>
                          <option value="<?= $value['kd_sparepart'] ?>"><?= $value['description'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Part Number</label>
                      <input type="text" name="part_number" id="part_number" class="form-control" placeholder="Part number item">
                    </div>
                    <div class="form-group">
                      <label>Serial Number</label>
                      <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial number item">
                    </div>
                    <div class="form-group">
                      <label>Location</label>
                      <select class="form-control select2bs4" name="id_location" data-placeholder="Select Location" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($location as $value) : ?>
                          <option value="<?= $value['id_location'] ?>"><?= $value['location_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="text" name="qty_in" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                      <label>OUM</label>
                      <select class="form-control select2bs4" name="id_oum" data-placeholder="Select Oum" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($oum as $value) : ?>
                          <option value="<?= $value['id_oum'] ?>"><?= $value['oum_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Date in</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="date_in" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Date Sparepart In" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>PO / RO</label>
                      <select class="form-control select2bs4" name="id_pro" data-placeholder="Select PO / RO" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($order as $value) : ?>
                          <option value="<?= $value['id_pro'] ?>"><?= $value['order_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>ARC Form Number</label>
                      <input type="text" name="arc_form_no" class="form-control" placeholder="ARC Form Number">
                    </div>
                    <div class="form-group">
                      <label>ARC Number</label>
                      <input type="text" name="arc_no" class="form-control" placeholder="ARC Number">
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Vendors</label>
                      <input type="text" name="vendors" class="form-control" placeholder="Vendor Name">
                    </div>

                    <div class="form-group">
                      <label>Conditions</label>
                      <select class="form-control select2bs4" name="id_condition" data-placeholder="Select Condition" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($condition as $value) : ?>
                          <option value="<?= $value['id_condition'] ?>"><?= $value['condition_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Consumable</label>
                      <input type="text" name="consumable" class="form-control" placeholder="Consumable">
                    </div>
                    <div class="form-group">
                      <label>AWB</label>
                      <input type="text" name="awb" class="form-control" placeholder="Air Way Bill Number">
                    </div>
                    <div class="form-group">
                      <label>A / C Registration</label>
                      <select class="form-control select2bs4" name="id_acreg" data-placeholder="Select A / C Registration" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($acreg as $value) : ?>
                          <option value="<?= $value['id_acreg'] ?>"><?= $value['acreg_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>MR Number</label>
                      <input type="text" name="mr_number" class="form-control" placeholder="MR Number">
                    </div>

                    <div class="form-group">
                      <label>Remarks</label>
                      <input type="text" name="remarks" class="form-control" placeholder="Remarks">
                    </div>
                    <div class="form-group">
                      <label>Document</label>
                      <div class="form-group clearfix">
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

                      </div>
                    </div>
                    <div class="form-group">
                      <label>Create Date</label>
                      <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="create_date" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="Create Date" />
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Expired Date</label>
                      <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="expired_date" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="Expired Date" />
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Image Item</label>
                      <div class="row py-4">
                        <div class="col-lg-6 mx-auto">

                          <!-- Upload image input-->
                          <div class="input-group mb-0 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted"></label>
                            <div class="input-group-append">
                              <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class=" font-weight-bold text-muted">Choose Image</small></label>
                            </div>
                          </div>

                          <!-- Uploaded image area-->

                          <div class="image-area mt-1"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

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
            <table class="table table-hover table-striped table-condensed" id="example3">
              <thead>
                <tr class="bg-navy color-light text-md text-center" style=" font-size: 9pt; height:30px;">
                  <th rowspan="2">No</th>
                  <th rowspan="2">Date In</th>
                  <th rowspan="2">Description</th>
                  <th rowspan="2">Part Number</th>
                  <th rowspan="2">Serial Number</th>
                  <!-- <th>Lahir</th> -->
                  <th rowspan="2">Vendors</th>
                  <th rowspan="2">Condition</th>
                  <th rowspan="2">Qty</th>


                  <th rowspan="2">Image</th>
                  <th colspan="2">Document</th>

                  <th rowspan="2">Action</th>
                </tr>
                <tr class="bg-navy color-light text-center" style=" font-size: 9pt;">



                  <!-- <th>Lahir</th> -->


                  <th>Yes</th>
                  <th>No</th>


                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($out as $row) : ?>
                  <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                    <td><?php echo $nomor++ ?>.</td>
                    <td><?= $row['date_in'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['part_number'] ?></td>

                    <td><?= $row['serial_number'] ?></td>
                    <td><?= $row['vendors'] ?></td>
                    <td><?= $row['condition_name'] ?></td>
                    <td><?= $row['qty_in'] ?></td>
                    <td><img class="img-thumbnail" width="80px" height="80px" src="<?= base_url('foto/' . $row['image']) ?>"></td>
                    <td><?php
                        if ($row['document'] == 'yes') {
                        ?>


                        <input type="checkbox" checked="checked" disabled>



                      <?php } else {
                      ?>

                        <input type="checkbox" disabled>

                      <?php } ?>
                    </td>
                    <td><?php
                        if ($row['document'] == 'no') {
                        ?>

                        <input type="checkbox" checked="checked" disabled>

                      <?php } else {
                      ?>

                        <input type="checkbox" disabled>

                      <?php } ?>
                    </td>
                    <td>

                      <div class="nav-item dropup">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                          <i class="far fa-caret-square-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <form action="<?= base_url('/Data-in/detail') . '/' . $row['id_partin'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Details">
                            <button type="submit" data-toggle="modal" data-target="#modal-lg" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                              Lihat
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>

                          <form action="<?= base_url('/Data-in/update') . '/' . $row['id_partin'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Edit">
                            <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                              Ubah
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>
                          <form action="<?= base_url('/delete') . '/' . $row['id_partin'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Delete">
                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin?');"><i class="nav-icon fas fa-trash-alt"></i>
                              Hapus
                            </button>
                          </form>
                        </div>
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
  </section>
  <!-- /.modal-dialog -->
  <!-- /.container-fluid -->

  <!-- /.content-header -->
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
  <script>
    $.ajax('#id_sparepart').on('change', (event) => {
      getData(event.target.value).then(out => {
        $('#part_number').val(out.part_number);
        $('#serial_number').val(out.serial_number);
      });
    });

    async function getData(id_sparepart) {
      let response = await get('/api/home/' + id_sparepart);
      let data = await response.json();

      return data;
    }
  </script>
  <?php echo view('layouts/Bottom') ?>