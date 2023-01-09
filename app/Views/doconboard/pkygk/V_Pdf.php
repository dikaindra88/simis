<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT DOCUMENT ONBOARD PK-YGK <?php echo date('F Y') ?>.pdf</title>
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
    <img src="img/logo2.png" style="width:120px; height:auto; position:absolute;margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     -->
    <table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">
                    AIRCRAFT DOCUMENT ONBOARD LISTING PK - YGK <br>
                    <?php echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>

    <hr />
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th>No</th>
                <th>A / C Document</th>
                <th>Issued</th>
                <th>Expired</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($doc  as $rows) : ?>
                <tr class="text-center" style="width: 100%; font-size: 8pt;
                border:1px solid #000;
                padding: 8px;
                color: #000;
                font-family: Arial, Helvetica, sans-serif;">
                    <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['doc_name'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['issued'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['expired'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['status'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['remark'] ?></td>
                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <p style="font-family:Arial, Helvetica, sans-serif; font-size:10pt;">TD-RDG/060</p>
</body>

</html>