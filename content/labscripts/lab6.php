<?php

function displayForm()
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<button class="btnblue"  type="submit" name="useOfSession" value="1"> Вывести список посещенных страниц </button> ';
    echo '<button class="btnred" type="submit" name="useOfSession" value="2"> Очистить список посещенных страниц </button> ';
    echo '</form>';
}

function showHistory()
{
    if (isset($_SESSION['userHistory'])) {
        foreach ($_SESSION['userHistory'] as $str) {
            echo '<span class="spanout"> ' . $str . '</span>';
        }
    } else {
        echo '<span class="spanout"> История пустая </span>';
    }
}

function clearHistory() {
    if (isset($_SESSION['userHistory'])) {
        session_destroy();
    }
}

if (isset($_POST['useOfSession'])) {
    if ($_POST['useOfSession'] == 1) {
        showHistory();
    } else if ($_POST['useOfSession'] == 2) {
        clearHistory();
        echo '<span class="spanout"> История очищена </span>';
    }
}
displayForm();

?>
