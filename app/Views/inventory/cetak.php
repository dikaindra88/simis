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
    <img src="<?= base_url('img/navbar-logo.png') ?>" style="width:300px; height:auto; position:absolute; margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     -->
    <table width="100%">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold;">
                    LIST INVENTORY BARANG / SPAREPART <br>
                    PERIODE <?php  echo date('F Y') ?>
                </span>
            </td>
        </tr>
    </table>
    <hr>

   
    <table class="table table-bordered border-dark" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 12pt; color:white;">
                <th style="width: 2px;">No</th>
                <th>Kode Barang</th>
                <th>Nama Barang / Sparepart</th>
                <th>Stock</th>
                <th>Satuan</th>



            </tr>

        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($sparepart  as $row) : ?>
                <tr class="text-center" style="padding: 5%; font-size: 12pt;">
                    <td><?php echo $nomor++ ?>.</td>
                    <td><?= $row['kd_barang'] ?></td>
                    <td><?= $row['nm_barang'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td><?= $row['satuan'] ?></td>

                    </div>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>