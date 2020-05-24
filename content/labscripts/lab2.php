<?php
if (!isset($_POST['arraysize'])) {
    if (!isset($_POST['array'])) {
        echo '<form class="dialogform" action="index.php?page=lab2" method="post">';
        echo '<input required type="text" name="arraysize" placeholder="' . $lang['script_lab2_arraysize'] . '">';
        echo '<input type="submit" class="button">';
        echo '</form>';
    } else {
        $array = $_POST['array'];
        $tmpArray = [];
        for ($i = 0; $i < count($array); $i++) {
            if (!in_array($array[$i], $tmpArray)) {
                array_push($tmpArray, $array[$i]);
                echo '<span class="spanout">' . $array[$i] . '</span>';
            }
        }
    }
} else {
    if (($_POST['arraysize'] >= 1 && $_POST['arraysize'] <= 100)) {
        echo '<form class="dialogform" action="index.php?page=lab2" method="post">';
        for ($i = 0; $i < $_POST['arraysize']; $i++) {
            echo '<input required type="text" name="array[' . $i . ']" placeholder="' . $lang['script_lab2_arrayitem'] . ' №' . ($i + 1) . '">';
        }
        echo '<input type="submit" class="button">';
        echo '</form>';
    } else {
        echo '<form action="index.php?page=lab2" class="dialogform" method="post">';
        echo '<h3>' . $lang['script_lab2_error'] . '</h3>';
        echo '<input type="submit" class="button" value="' . $lang['script_lab2_reload'] . '"/>';
        echo '</form>';
    }
}
?>
