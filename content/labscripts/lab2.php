<?php
if (!isset($_POST['arraysize'])) {
    if (!isset($_POST['array'])) {
        echo '<form class="dialogform" action="index.php?page=lab2" method="post">';
        echo '<input required type="text" name="arraysize" placeholder="Размер массива">';
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
            echo '<input required type="text" name="array[' . $i . ']" placeholder="Элемент массива №' . ($i + 1) . '">';
        }
        echo '<input type="submit" class="button">';
        echo '</form>';
    } else {
        echo '<form action="index.php?page=lab2" class="dialogform" method="post">';
        echo "<h3>Ошибка ввода, введите число от 1 до 100</h3>";
        echo '<input type="submit" class="button" value="Перезагрузить"/>';
        echo '</form>';
    }
}
?>
