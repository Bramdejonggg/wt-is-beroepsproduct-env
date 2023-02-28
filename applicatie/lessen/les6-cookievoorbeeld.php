<?php
session_start();

if (isset($_SESSION['pagecount'])) {
    $_SESSION['pagecount'] = 1;
}else {
    $_SESSION['pagecount']++;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les 6</title>
</head>
<body>
    <h1>Hallo allemaal</h1>

aantal bezoeken: <? $_SESSION['pagecount'] ?> 

</body>
</html>