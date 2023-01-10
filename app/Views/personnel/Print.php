<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT DOCUMENT ONBOARD PK-RDA <?php echo date('F Y') ?>.pdf</title>
    <link rel="icon" href="<?= base_url('img/logo1.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    @media print {
        @page {
            margin-top: 20px;
            size: landscape;
        }

        .btn,
        footer,
        a#debug-icon-link {
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
    <img src="<?= base_url('img/logo2.png') ?>" style="width:120px; height:auto; position:absolute; margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     -->
    <table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold;">
                    AIRCRAFT DOCUMENT ONBOARD LISTING PK - RDA <br>
                    <?php echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>
    <hr>

    <table class="table table-bordered border-dark" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 5pt; color:white;">
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
            <tr class="bg-secondary text-center" style=" font-size: 5pt; color:white;">
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
                <tr class="text-center" style=" font-size: 6pt;">
                    <td><?php echo $nomor++ ?>.</td>
                    <td><?= $rows['name'] ?></td>
                    <td><?= $rows['position_name'] ?></td>
                    <td><?= $rows['a1'] ?></td>
                    <td><?= $rows['a4'] ?></td>
                    <td><?= $rows['a2'] ?></td>
                    <td><?= $rows['a3'] ?></td>
                    <td><?= $rows['c1'] ?></td>
                    <td><?= $rows['c2'] ?></td>
                    <td><?= $rows['c4'] ?></td>
                    <td><?= $rows['amel_no'] ?></td>
                    <td><?= $rows['amel_valid'] ?></td>
                    <td><?= $rows['auth_name'] ?></td>
                    <td><?= $rows['auth_valid'] ?></td>
                    <td><?= $rows['rii_no'] ?></td>
                    <td><?= $rows['ac_type'] ?></td>
                    <td><?= $rows['date_bi'] ?></td>
                    <td><?= $rows['date_hf_initial'] ?></td>
                    <td><?= $rows['date_hf_lastrec'] ?></td>
                    <td><?= $rows['date_hf_nextrec'] ?></td>
                    <td><?= $rows['date_tot'] ?></td>
                    <td><?= $rows['date_be_ppc'] ?></td>
                    <td><?= $rows['date_material'] ?></td>
                    <td><?= $rows['date_atrc_initial'] ?></td>
                    <td><?= $rows['date_atrc_lastrec'] ?></td>
                    <td><?= $rows['date_atrc_nextrec'] ?></td>
                    <td><?= $rows['date_insp_rii'] ?></td>
                    <td><?= $rows['date_sms'] ?></td>
                    <td><?= $rows['date_rvsm'] ?></td>
                    <td><?= $rows['date_pbn'] ?></td>
                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>