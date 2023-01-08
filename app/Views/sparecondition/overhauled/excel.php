<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Print</title>
    <link rel="icon" href="<?= base_url('img/logo1.png')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
</head>
<style>
    @media print{
        @page{
            margin-top: 20px;
            size: landscape;
        }
        .btn, footer, a#debug-icon-link{
            display: none;
        }
    }
    table {

        border-collapse: collapse;
    }
    
</style>
<script>
    window.print()
</script>
    


<body>
    <img src="<?= base_url('img/RDG.png') ?>" style="width:200px; height:auto; position:absolute; margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     --><table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold;">
                    LIST SPAREPART OVERHAULED<br>
                    <?=  date('F Y');?>
                </span>
            </td>
        </tr>
    </table>
<hr>

    <h6 align="center">Date Data <?php echo $first_date .' - '. $end_date ?></h6>
    <table class="table table-bordered border-dark" width="100%" cellpadding="0">
    <thead>
                                <tr class="bg-secondary text-center" style=" font-size: 9pt; color:white;">
                                    <th width='1%'>No</th>
                                    <th>Description</th>
                                    <th>Part Number</th>
                                    <th>Serial Number</th>
                                    <!-- <th>Lahir</th> -->
                                    <th>Location</th>
                                    <th>Qty</th>
                                    <th>Oum</th>
                                    <th>Date In</th>
                                    <th>PO / RO</th>
                                    <th>ARC / C of c Form No</th>
                                    <th>ARC / C of c No.</th>
                                    <th>Vendors</th>
                                    <th>condition</th>
                                    <th>Consumable / Rotable</th>
                                    <th>AWB</th>
                                    <th>A/C Reg</th>
                                    <th>MR Number</th>
                                    <th>Remarks</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($over  as $rows) : ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 8pt;">
                                        <td><?php echo $nomor++ ?>.</td>
                                        <td><?= $rows['description'] ?></td>
                                        <td><?= $rows['part_number'] ?></td>
                                        <td><?= $rows['serial_number'] ?></td>
                                        <td><?= $rows['location_name'] ?></td>
                                        <td><?= $rows['qty_in'] ?></td>
                                        <td><?= $rows['oum_name'] ?></td>
                                        <td><?= $rows['date_in'] ?></td>
                                        <td><?= $rows['order_name'] ?></td>
                                        <td><?= $rows['arc_form_no'] ?></td>
                                        <td><?= $rows['arc_no'] ?></td>
                                        <td><?= $rows['vendors'] ?></td>
                                        <td><?= $rows['condition_name'] ?></td>
                                        <td><?= $rows['consumable'] ?></td>
                                        <td><?= $rows['awb'] ?></td>
                                        <td><?= $rows['acreg_name'] ?></td>
                                        <td><?= $rows['mr_number'] ?></td>
                                        <td><?= $rows['remarks'] ?></td>
                                        </div>
                    </tr>
                <?php endforeach ?>

                </tbody>
    </table>
</body>

</html>