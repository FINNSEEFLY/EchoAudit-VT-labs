<head>
<meta charset="utf-8">
<meta name="css/author" content="FINNSEEFLY">
<link href="css/global.css" rel="stylesheet" type="text/css" />
<?php
    if (!isset($_GET['page'])) {
       echo "<link href='css/main.css' rel='stylesheet' type='text/css'/>"; 
       echo '<meta name="description" content="Главная страница лучшей аудиторской компании в этой вселенной!">';
       echo "<title>EchoAudit | Главная страница</title>";
    } else {
        $page = $_GET['page'];
        switch($_GET['page']) {
            case 'main':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Главная страница лучшей аудиторской компании в этой вселенной!">';
                echo "<title>EchoAudit | Главная страница</title>";
            break;
            case 'contacts':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Контакты лучшей аудиторской компании в этой вселенной!">';
                echo "<title>EchoAudit | Контакты</title>";
            break;
            case 'easteregg':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Магазин наушников лучшей аудиторской компании в этой вселенной!">';
                echo "<title>EchoAudit | Магазин наушников</title>";
            break;
            case 'news':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Новости лучшей аудиторской компании в этой вселенной!">';
                echo "<title>EchoAudit | Новости</title>";
            break;
            case 'lab2':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Лаба 2">';
                echo "<title>EchoAudit | Лаба 2</title>";
            break;
            case 'services':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Услуги лучшей аудиторской компании в этой вселенной!">';
                echo "<title>EchoAudit | Услуги</title>";
            break;
            case 'staff':
                echo "<link href='css/".$page.".css' rel='stylesheet' type='text/css'  />";
                echo '<meta name="description" content="Сотрудники лучшей аудиторской компании в этой вселенной">';
                echo "<title>EchoAudit | Сотрудники</title>";
            break;
            default:
                echo "<link href='css/main.css' rel='stylesheet' type='text/css'/>";
                echo '<meta name="description" content="Главная страница лучшей аудиторской компании в этой вселенной!">';
                echo "<title>EchoAudit | Главная страница</title>";
        }
    }
?>
</head>