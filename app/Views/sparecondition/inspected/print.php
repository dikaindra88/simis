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
    th{
        width: 100%;
        border:1px solid #000;
        padding: 8px;
        
        font-family: Arial, Helvetica, sans-serif;
    }
    h4{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <img src="img/RDG.png" style="width:200px; height:auto; position:absolute;margin-top:1%;">
    <table  width="100%">
        <tr>
            <td align="center">
            <span style="line-height:1.6; font-weight:bold;font-family:Arial, Helvetica, sans-serif;">
                    LIST SPAREPART INSPECTED / TESTED<br>
                    <?=  date('F Y');?>
                </span>
            </td>
        </tr>
    </table>

    <hr />

    <h6 align="center">Date Data <?php echo $first_date .' - '. $end_date ?></h6>
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
    <thead>
                                <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                                    <th>No</th>
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

                                <?php foreach ($inspected  as $rows) : ?>
                                    <tr class="text-center" style="width: 100%; font-size: 8pt;
        border:1px solid #000;
        padding: 8px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;">
                                        <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['description'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['part_number'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['serial_number'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['location_name'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['qty_in'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['oum_name'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_in'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['order_name'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['arc_form_no'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['arc_no'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['vendors'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['condition_name'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['consumable'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['awb'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['acreg_name'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['mr_number'] ?></td>
                                        <td style="border:1px solid #000;padding: 2px;"><?= $rows['remarks'] ?></td>
                                        </div>
                    </tr>
                <?php endforeach ?>

                </tbody>
    </table>
</body>

</html>