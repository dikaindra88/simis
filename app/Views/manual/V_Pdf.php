<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT COMPANY MANUAL CONTROL LIST <?php echo date('F Y') ?>.pdf</title>
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
                    TRI - M.G (RDG AIRLINES) AOC 135 COMPANY MANUAL CONTROL LIST <br>
                    <?php echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>

    <hr />
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th rowspan="2">No</th>
                <th rowspan="2">Departement</th>
                <th colspan="4">Description of Manual</th>
                <th rowspan="2">Issue</th>
                <th rowspan="2">Revision</th>
                <th rowspan="2">Revision Date</th>
                <th rowspan="2">Remark</th>

            </tr>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th>Title</th>
                <th>Level 1</th>
                <th>Level 2</th>
                <th>Level 3</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($manual  as $rows) : ?>
                <tr class="text-center" style="width: 100%; font-size: 8pt;
        border:1px solid #000;
        padding: 8px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;">
                    <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['depart_name'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['title'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['level_1'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['level_2'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['level_3'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['issue'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['revision'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['rev_date'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['remark'] ?></td>
                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <p style="font-family:Arial, Helvetica, sans-serif; font-size:10pt;">Prepare By&nbsp;:<br>Issued Date&nbsp;:<br>Revision&nbsp;:</p>
</body>

</html>