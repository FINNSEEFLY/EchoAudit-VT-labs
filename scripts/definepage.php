<?php
function definepage() {
    if (!isset($_GET['page'])) {
        return 'main';
    }
    else {
        switch($_GET['page']) {
            case 'main':
            case 'contacts':
            case 'easteregg':
            case 'news':
            case 'lab2':
            case 'services':
            case 'staff':
                return $_GET['page'];
            break;
            default:
                return 'main';
        }
    }
}
?>