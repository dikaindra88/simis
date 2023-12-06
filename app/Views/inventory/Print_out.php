<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> <?php echo date('F Y') ?>.pdf</title>
    <link rel="icon" href="<?= base_url('img/ATS.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    th {
        width: 100%;
        border: 1px solid #000;
        padding: 8px;

        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <img src="img/navbar-logo.png" style="width:300px; height:auto; position:absolute;margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     -->
    <table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">
                    LIST SPAREPART / BARANG KELUAR <br>
                    PERIODE <?php echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>

    <hr />

    <p align="left" style="
        color: #000;
        font-family: Arial, Helvetica, sans-serif; font-size: 8pt;">Tanggal Data &nbsp; : <?php echo $first_date . ' - ' . $end_date ?></p>
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th style="width: 2px;">No</th>
                <th>Tanggal Keluar</th>
                <th>Nama Barang / Sparepart</th>
                <th>Part Number</th>
                <th>Serial Number</th>
                <th>Kondisi</th>
                <th style="width:5px;">Satuan</th>
                <th>Diberikan Kepada</th>
                <th>Keterangan</th>
                <th style="width: 2px;">Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($out  as $rows) : ?>
                <tr class="text-center" style="width: 100%; font-size: 8pt;
        border:1px solid #000;
        padding: 8px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;">
                    <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['tgl_keluar'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['nm_barang'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['part_number'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['serial_number'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['kondisi'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['satuan'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['nama_personnel'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['keterangan'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['qty_out'] ?></td>
                    </div>
                </tr>
            <?php endforeach ?>
            <tr class="text-center" style="width: 100%; font-size: 8pt;border:1px solid #000;padding: 8px;color: #000;font-family: Arial, Helvetica, sans-serif;">
                <th colspan="9">Total Barang / Sparepart Keluar</th>
                <td><?= $sum[0]['qty_out'] ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>