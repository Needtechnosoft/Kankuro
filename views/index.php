<?php $viewbag=$GLOBALS['viewbag'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nepali Notes</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="/views/css/bootstrap.min.css">
    <?php
 $GLOBALS['renderjs']();
  ?>

</head>
<body>
<?php require 'common/menu.php';?>
<?php require  $GLOBALS['currentview'];?>
</body>
</html>
