<?php
    if (!isset($_GET['page'])) {
        include('main.php');
    }
    else {
        switch($_GET['page']) {
            case 'main':
                include ('main.php');
            break;
            case 'contacts':
                include ('contacts.php');
            break;
            case 'easteregg':
                include ('easteregg.php');
            break;
            case 'news':
                include ('news.php');
            break;
            case 'lab2':
                include ('lab2.php');
            break;
            case 'services':
                include ('services.php');
            break;
            case 'staff':
                include ('staff.php');
            break;
            default:
                include ('main.php');
        }
    }
?>