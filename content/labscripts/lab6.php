<?php

function displayForm($lang)
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<button class="btnblue"  type="submit" name="useOfSession" value="1"> ' . $lang['script_lab6_show'] . ' </button> ';
    echo '<button class="btnred" type="submit" name="useOfSession" value="2"> ' . $lang['script_lab6_drop'] . ' </button> ';
    echo '</form>';
}

function showHistory($lang)
{
    if (isset($_SESSION['userHistory'])) {
        foreach ($_SESSION['userHistory'] as $str) {
            echo '<span class="spanout"> ' . $str . '</span>';
        }
    } else {
        echo '<span class="spanout">' . $lang['script_lab6_clear'] . ' </span>';
    }
}

function clearHistory() {
    if (isset($_SESSION['userHistory'])) {
        session_destroy();
    }
}

if (isset($_POST['useOfSession'])) {
    if ($_POST['useOfSession'] == 1) {
        showHistory($lang);
    } else if ($_POST['useOfSession'] == 2) {
        clearHistory();
        echo '<span class="spanout"> ' . $lang['script_lab6_cleared'] . ' </span>';
    }
}
displayForm($lang);

?>
