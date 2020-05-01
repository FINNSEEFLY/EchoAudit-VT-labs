<?php
include('scripts/recognizepage.php');
$page = recognizePage(); ?>
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
        EchoAudit.com All rights reserved © 1840-2020
    </footer>
</div>
</body>
</html> 