<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERSONNEL TRAINING QUALIFICATION RECORD.pdf</title>
    <link rel="icon" href="<?= base_url('img/logo1.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    th {
        width: 100%;
        border: 1px solid #000;
        padding: 5px;

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
                    PERSONNEL TRAINING QUALIFICATION RECORD<br>TRI-M.G. INTRA ASIA AIRLINES
                </span>
            </td>
        </tr>
    </table>

    <hr />
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 4pt; background-color:#999; color:white;border:1px solid #000;">
                <th rowspan="2">No.</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Position</th>
                <th colspan="7">Basic License No.</th>
                <th rowspan="2"> AMEL No.</th>
                <th rowspan="2">AMEL Validity</th>
                <th rowspan="2">Company Authorized</th>
                <th rowspan="2">Company Authorized Validity</th>
                <th rowspan="2">RII No.</th>
                <th rowspan="2">Aircraft Type</th>
                <th rowspan="2">Basic Indoctrination</th>
                <th colspan="3">Human Factor</th>
                <th rowspan="2">Training of Trainer</th>
                <th rowspan="2">Basic Engineering & PPC</th>
                <th rowspan="2">Logistic / Material Handling</th>
                <th colspan="3">Aircraft Type Rating Course</th>
                <th rowspan="2">INSP/RII</th>
                <th rowspan="2">SMS</th>
                <th rowspan="2">RVSM</th>
                <th rowspan="2">PBN</th>
            </tr>
            <tr class="bg-secondary text-center" style=" font-size: 4pt; background-color:#999; color:white;border:1px solid #000;">
                <th>A1</th>
                <th>A4</th>
                <th>A2</th>
                <th>A3</th>
                <th>C1</th>
                <th>C2</th>
                <th>C4</th>

                <th>Initial</th>
                <th>Last Rec</th>
                <th>Next Rec</th>

                <th>Initial</th>
                <th>Last Rec</th>
                <th>Next Rec</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($person  as $rows) : ?>
                <tr class="text-center" style="width: 100%; font-size: 4pt;
                border:1px solid #000;
                padding: 8px;
                color: #000;
                font-family: Arial, Helvetica, sans-serif;">
                    <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['name'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['position_name'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['a1'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['a4'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['a2'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['a3'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['c1'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['c2'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['c4'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['amel_no'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['amel_valid'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['auth_name'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['auth_valid'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['rii_no'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['ac_type'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_bi'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_hf_initial'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_hf_lastrec'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_hf_nextrec'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_tot'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_be_ppc'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_material'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_atrc_initial'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_atrc_lastrec'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_atrc_nextrec'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_insp_rii'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_sms'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_rvsm'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['date_pbn'] ?></td>
                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</body>

</html>