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
          <h1 class="m-0">Data Sparepart Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Sparepart Keluar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <hr>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
        <i class="fas fa-plus"></i> Tambah
      </button>

    </div>
  </div>



  <div class="modal fade" id="modal-xl">

    <div class="modal-dialog modal-xl">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title" style="font-family: arial black; color:#F3CB51;font-size:18pt;">&nbsp;Input Sparepart Out</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img class="modal-title" src="<?= base_url('img/ATS.png') ?>" height="50">
          </button>

        </div>
        <form method="post" action="Out" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="card bg-dark">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tanggal Keluar</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgl_keluar" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Barang / Sparepart Keluar" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Barang / Sparepart</label>
                      <select name="kd_barang" id="kd_barang" data-placeholder="Pilih Barang / Sparepart" class="form-control select2bs4" required>
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($sparepart as $value) : ?>
                          <option value="<?= $value['kd_barang'] ?>"><?= $value['nm_barang'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Part Number</label>
                      <input type="text" name="part_number" class="form-control" id="part_number" placeholder="Part number" required>
                    </div>
                    <div class="form-group">
                      <label>Serial Number</label>
                      <input type="text" name="serial_number" class="form-control" id="serial_number" placeholder="Serial number" required>
                    </div>
                    <div class="form-group">
                      <label>Kondisi</label>
                      <select class="form-control select2bs4" name="id_kondisi" data-placeholder="Pilih Kondisi" style="width: 100%;">
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($condition as $value) : ?>
                          <option value="<?= $value['id_kondisi'] ?>"><?= $value['kondisi'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>

                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="card bg-dark">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                    </div>
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="text" name="qty_out" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select class="form-control select2bs4" name="id_satuan" data-placeholder="Pilih Satuan" style="width: 100%;">
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($oum as $value) : ?>
                          <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan'] ?></option>
                        <?php endforeach ?>
                      </select>

                      </select>
                    </div>
                    <div class="form-group">
                      <label>Di Berikan Kepada</label>
                      <select class="form-control select2bs4" name="id_personnel" data-placeholder="Di Berikan Kepada" style="width: 100%;">
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($given as $value) : ?>
                          <option value="<?= $value['id_personnel'] ?>"><?= $value['nama_personnel'] ?></option>
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
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
            <table class="table table-bordered table-hover table-striped table-condensed " id="example3">
              <thead>
                <tr class="text-center" style=" font-size: 9pt;">
                  <th>No</th>
                  <th>Tanggal Keluar</th>
                  <th>Nama Barang / Sparepart</th>
                  <th>Part Number</th>
                  <th>Serial Number</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                  <th>Qty</th>
                  <th>Satuan</th>
                  <th>Di Berikan Kepada</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($out as $row) : ?>
                  <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                    <td><?= $nomor++ ?></td>
                    <td><?= $row['tgl_keluar'] ?></td>
                    <td><?= $row['nm_barang'] ?></td>
                    <td><?= $row['part_number'] ?></td>
                    <td><?= $row['serial_number'] ?></td>
                    <td><?= $row['kondisi'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td><?= $row['qty_out'] ?></td>
                    <td><?= $row['satuan'] ?></td>
                    <td><?= $row['nama_personnel'] ?></td>

                    <td>

                      <div class="nav-item dropup">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                          <i class="far fa-caret-square-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <form action="<?= base_url('/Data-out/detail') . '/' . $row['id_keluar'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Details">
                            <button type="submit" data-toggle="modal" data-target="#modal-lg" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                              Lihat
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>

                          <form action="<?= base_url('/Data-out/update') . '/' . $row['id_keluar'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Edit">
                            <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                              Ubah
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>
                          <form action="<?= base_url('/Data-out/Delete') . '/' . $row['id_keluar'] ?>" method="post">
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