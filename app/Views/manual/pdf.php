<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Manual <?php $manual[0]['manual'] ?></title>
    <link rel="icon" href="<?= base_url('img/logo1.png') ?>">
</head>

<body>
    <iframe src="<?= base_url('Document-Manual/' . $manual[0]['manual']) ?>" frameBorder="0" style="margin: 0;" scrolling="auto" height="900" width="1300"></iframe>
</body>

</html>