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
                    LIST SPAREPART INCOMING <br>
                    <?php echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>
    <hr>

    <h6 align="center">Date Data <?php echo $first_date . ' - ' . $end_date ?></h6>
    <table class="table table-bordered border-dark" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 9pt; color:white;">
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
            <tr class="bg-secondary color-light text-center" style=" font-size: 9pt; color:white;">



                <!-- <th>Lahir</th> -->


                <th>Yes</th>
                <th>No</th>


            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($in  as $row) : ?>
                <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                    <td><?php echo $nomor++ ?>.</td>
                    <td><?= $row['date_in'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['part_number'] ?></td>

                    <td><?= $row['serial_number'] ?></td>
                    <td><?= $row['vendors'] ?></td>
                    <td><?= $row['condition_name'] ?></td>
                    <td><?= $row['qty_in'] ?></td>
                    <td><?php
                        if ($row['document'] == 'yes') {
                        ?>


                            <input type="checkbox" checked="checked" disabled>



                        <?php } else {
                        ?>

                            <input type="checkbox" disabled>

                        <?php } ?>
                    </td>
                    <td><?php
                        if ($row['document'] == 'no') {
                        ?>

                            <input type="checkbox" checked="checked" disabled>

                        <?php } else {
                        ?>

                            <input type="checkbox" disabled>

                        <?php } ?>
                    </td>
                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>