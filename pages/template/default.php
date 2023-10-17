<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <title><?= App::getInstanceDb()->title; ?></title>
</head>
<body>
    <?= $content; ?>
</body>
</html>