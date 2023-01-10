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
          <h1 class="m-0">Report Sparepart Outgoing</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Report Sparepart Outgoing</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
      <form action="Report-Search" method="POST" enctype="multipart/form-data">
        <div class="row ml-2">
          <div class="col-lg-3">
            <div class="form-group">

              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="first_date" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="First Date" required />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">

              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="End Date" required />
                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <button type="submit" name="show" class="btn btn-info">Show</button>
              <a href="<?= base_url('Report/Print') . '/' . $first_date . '/' . $end_date ?>" target="_blank" class="btn btn-outline btn-danger ">
                <i class="fas fa-file-pdf"></i> Pdf
              </a>
              <a href="<?= base_url('print-out') . '/' . $first_date . '/' . $end_date ?>" target="_blink" class="btn btn-outline-secondary btn-light">
                <i class="fas fa-print"></i> Print</a>
            </div>
          </div>
        </div>
      </form>
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
                <tr class="bg-navy color-light text-center" style=" font-size: 9pt;">
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