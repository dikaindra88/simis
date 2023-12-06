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
    padding: 0 15px 15px 15px;
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
    width: 200px;
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
          <h1 class="m-0">Data Spare Part Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Spare Part Masuk</li>
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

    <div class="modal-dialog  modal-xl">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h4 class="modal-title" style="font-family: arial black; color:#F3CB51;font-size:18pt;">&nbsp;Input Sparepart Masuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img class="modal-title" src="<?= base_url('img/ATS.png') ?>" height="50">
          </button>

        </div>
        <form method="post" action="Add" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">



              <div class="col-md-6">
                <div class="card bg-dark">
                  <div class="card-body">

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
                      <input type="text" name="part_number" id="part_number" class="form-control" placeholder="Part number">
                    </div>
                    <div class="form-group">
                      <label>Serial Number</label>
                      <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial number">
                    </div>
                    <div class="form-group">
                      <label>Rak</label>
                      <select class="form-control select2bs4" name="id_rak" data-placeholder="Pilih Rak" style="width: 100%;">
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($location as $value) : ?>
                          <option value="<?= $value['id_rak'] ?>"><?= $value['nama_rak'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="text" name="qty_in" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <select class="form-control select2bs4" name="id_satuan" data-placeholder="Pilih Satuan" style="width: 100%;">
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($oum as $value) : ?>
                          <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Masuk</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgl_masuk" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Barang / Sparepart Masuk" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Nomor Form ARC</label>
                      <input type="text" name="arc_form_no" class="form-control" placeholder="Nomor Form ARC">
                    </div>
                    <div class="form-group">
                      <label>Nomor ARC</label>
                      <input type="text" name="arc_no" class="form-control" placeholder="Nomor ARC">
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="card bg-dark">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Vendor</label>
                      <input type="text" name="vendor" class="form-control" placeholder="Nama Vendor">
                    </div>

                    <div class="form-group">
                      <label>Kondisi Barang / Sparepart</label>
                      <select class="form-control select2bs4" name="id_kondisi" data-placeholder="Pilih Kondisi" style="width: 100%;">
                        <option value="" selected disabled>Choose Item</option>
                        <?php foreach ($condition as $value) : ?>
                          <option value="<?= $value['id_kondisi'] ?>"><?= $value['kondisi'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Remarks</label>
                      <input type="text" name="remarks" class="form-control" placeholder="Remarks">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Di Buat</label>
                      <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="create_date" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="Tanggal Dibuat" />
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Expired</label>
                      <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="exp_date" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="Tanggal Expired" />
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Dokumen ARC</i></label>
                      <div class="input-group">
                        <div class="file-upload">
                          <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' name="document_arc" onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                              <h3>Klik atau Tarik dan lepaskan gambar</h3>
                            </div>
                          </div>
                          <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="remove-image">Hapus <span class="image-title">Gambar</span></button>
                            </div>
                          </div>
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
                <tr class=" text-center" style=" font-size: 9pt;">
                  <th>No</th>
                  <th>Tanggal Masuk</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang / Sparepart</th>
                  <th>Part Number</th>
                  <th>Serial Number</th>
                  <!-- <th>Lahir</th> -->
                  <th>Vendor</th>
                  <th>Kondisi</th>
                  <th>Qty</th>
                  <th>Dokumen ARC</th>
                  <th>Rak</th>
                  <th>Aksi</th>
                </tr>

              </thead>
              <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($out as $row) : ?>
                  <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                    <td><?php echo $nomor++ ?>.</td>
                    <td><?= $row['tgl_masuk'] ?></td>
                    <td><?= $row['kd_barang'] ?></td>
                    <td><?= $row['nm_barang'] ?></td>
                    <td><?= $row['part_number'] ?></td>

                    <td><?= $row['serial_number'] ?></td>
                    <td><?= $row['vendor'] ?></td>
                    <td><?= $row['kondisi'] ?></td>
                    <td><?= $row['qty_in'] ?></td>

                    <td><img class="img-thumbnail" width="80px" height="80px" src="<?= base_url('foto/' . $row['document_arc']) ?>"></td>
                    <td><?= $row['nama_rak'] ?></td>
                    <td>

                      <div class="nav-item dropup">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                          <i class="far fa-caret-square-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <form action="<?= base_url('/Data-in/detail') . '/' . $row['id_masuk'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Details">
                            <button type="submit" data-toggle="modal" data-target="#modal-lg" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                              Lihat
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>

                          <form action="<?= base_url('/Data-in/update') . '/' . $row['id_masuk'] ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="Edit">
                            <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                              Ubah
                            </button>
                          </form>
                          <div class="dropdown-divider"></div>
                          <form action="<?= base_url('/delete') . '/' . $row['id_masuk'] ?>" method="post">
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