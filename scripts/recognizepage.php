<?php
function recognizePage()
{
    if (!isset($_GET['page'])) {
        return 'main';
    } else {
        switch ($_GET['page']) {
            case 'main':
            case 'contacts':
            case 'easteregg':
            case 'news':
            case 'lab2':
            case 'services':
            case 'staff':
            case 'lab3':
            case 'lab4':
            case 'lab5':
            case 'lab6':
            case 'lab7':
            case 'lab8':
                return $_GET['page'];
                break;
            default:
                return 'main';
        }
    }
}

?>