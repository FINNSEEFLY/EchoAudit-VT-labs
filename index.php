<?php
include('scripts/recognizepage.php');
$page = recognizePage();
include('scripts/sessioncontrol.php');
$lang = $_SESSION['language_ini'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="css/author" content="FINNSEEFLY">
    <link href="css/global.css" rel="stylesheet" type="text/css"/>
    <?php include('heads/' . $page . '_head.php') ?>
</head>
<body class="body">
<div class="grid">
    <header class="header">
        <nav class="nav">
            <?php include('scripts/makenav.php'); ?>
        </nav>
    </header>
    <?php include('content/' . $page . '.php') ?>
    <footer class="footer">
        <?php echo $lang['footer'] ?>
    </footer>
</div>
</body>

</html> 