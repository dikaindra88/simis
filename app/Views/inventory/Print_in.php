<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Sparepart Incoming <?php echo date('F Y') ?>.pdf</title>
    <link rel="icon" href="<?= base_url('img/logo1.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    th {
        width: 100%;
        border: 1px solid #000;
        padding: 8px;

        font-family: Arial, Helvetica, sans-serif;
    }

    h4 {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <img src="img/RDG.png" style="width:200px; height:auto; position:absolute;margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     -->
    <table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">
                    LIST SPAREPART INCOMING <br>
                    <?php echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>

    <hr />

    <h6 align="center">Date Data <?php echo $first_date . ' - ' . $end_date ?></h6>
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th rowspan="2">No</th>
                <th rowspan="2">Date In</th>
                <th rowspan="2">Description</th>
                <th rowspan="2">Part Number</th>
                <th rowspan="2">Serial Number</th>
                <!-- <th>Lahir</th> -->
                <th rowspan="2">Vendors</th>
                <th rowspan="2">Condition</th>
                <th rowspan="2">Qty</th>
                <th colspan="2">Document</th>


            </tr>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th>Yes</th>
                <th>No</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($in  as $rows) : ?>
                <tr class="text-center" style="width: 100%; font-size: 8pt;
        border:1px solid #000;
        padding: 8px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;">
                    <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_in'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['description'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['part_number'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['serial_number'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['vendors'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['condition_name'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['qty_in'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?php if ($rows['document'] == 'yes') { ?>
                            <input type="checkbox" checked="checked" disabled>
                        <?php } else { ?>
                            <input type="checkbox" disabled>
                        <?php } ?>
                    </td>
                    <td style="border:1px solid #000;padding: 2px;"><?php if ($rows['document'] == 'yes') { ?>
                            <input type="checkbox" disabled>
                        <?php } else { ?>
                            <input type="checkbox" checked="checked" disabled>
                        <?php } ?>
                    </td>
                    </td>
                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>