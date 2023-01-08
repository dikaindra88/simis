<?php

use Faker\Provider\Base;

echo view('layouts/Top') ?>
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
          <h1 class="m-0">Data Sparepart Outgoing</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Sparepart Outgoing</li>
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
          <h4 class="modal-title" style="font-family: arial black; color:#000080;font-size:18pt;">&nbsp;Input Sparepart Out</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img class="modal-title" src="<?= base_url('img/RDG.png') ?>" height="30">
          </button>

        </div>
        <form method="post" action="Out" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Date Out</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="date_out" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Date Sparepart In" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
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
                      <input type="text" name="part_number" class="form-control" id="part_number" placeholder="Part number item" required>
                    </div>
                    <div class="form-group">
                      <label>Serial Number</label>
                      <input type="text" name="serial_number" class="form-control" id="serial_number" placeholder="Serial number item" required>
                    </div>
                    <div class="form-group">
                      <label>Conditions</label>
                      <select class="form-control select2bs4" name="id_condition" data-placeholder="Select a Condition" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($condition as $value) : ?>
                          <option value="<?= $value['id_condition'] ?>"><?= $value['condition_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>

                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Reason Out</label>
                      <input type="text" name="reason_out" class="form-control" placeholder="Reason Out">
                    </div>
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="text" name="qty_out" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                      <label>OUM</label>
                      <select class="form-control select2bs4" name="id_oum" data-placeholder="Select Oum" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($oum as $value) : ?>
                          <option value="<?= $value['id_oum'] ?>"><?= $value['oum_name'] ?></option>
                        <?php endforeach ?>
                      </select>

                      </select>
                    </div>
                    <div class="form-group">
                      <label>Given to / Remarks</label>
                      <select class="form-control select2bs4" name="id_given_to" data-placeholder="Select Given" style="width: 100%;">
                      <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($given as $value) : ?>
                          <option value="<?= $value['id_given_to'] ?>"><?= $value['name'] ?></option>
                        <?php endforeach ?>
                      </select>
                      </select>
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
            <table class="table table-hover table-striped table-condensed " id="example3">
              <thead>
                <tr class="bg-navy color-light text-md text-center" style=" font-size: 9pt; height:30px;">
                  <th>No</th>
                  <th>Date Out</th>
                  <th>Description</th>
                  <th>Part Number</th>
                  <th>Serial Number</th>
                  <th>Condition</th>
                  <th>Reason Out</th>
                  <th>Qty</th>
                  <th>Oum</th>
                  <th>Given to / Remarks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($out as $row) : ?>
                  <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                    <td><?= $nomor++ ?></td>
                    <td><?= $row['date_out'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['part_number'] ?></td>
                    <td><?= $row['serial_number'] ?></td>
                    <td><?= $row['condition_name'] ?></td>
                    <td><?= $row['reason_out'] ?></td>
                    <td><?= $row['qty_out'] ?></td>
                    <td><?= $row['oum_name'] ?></td>
                    <td><?= $row['name'] ?></td>

                    <td>

                      <div class="nav-item dropup">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                          <i class="far fa-caret-square-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <form action="<?= base_url('/Data-out/detail') . '/' . $row['id_partout'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Details">
                            <button type="submit" data-toggle="modal" data-target="#modal-lg" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                              Lihat
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>

                          <form action="<?= base_url('/Data-out/update') . '/' . $row['id_partout'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Edit">
                            <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                              Ubah
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>
                          <form action="<?= base_url('/Data-out/Delete') . '/' . $row['id_partout'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Delete">
                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin?');"><i class="nav-icon fas fa-trash-alt"></i>
                              Hapus
                            </button>
                          </form>
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
  <!-- <script>
    $('#description').on('change', function(event) {
      getData(event.target.value).then(out => {
        $('#part_number').val(out.part_number);
        $('#serial_number').val(out.serial_number);
      });
    });

    async function getData(id_partin) {
      let response = await fetch('/api/home/' + id_partin)
      let data = await response.json();

      return data;
    }
  </script> -->
  <?php echo view('layouts/Bottom') ?>