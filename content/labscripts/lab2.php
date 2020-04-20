<?php
    if (!isset($_POST['arraysize'])) {
        if (!isset($_POST['array'])) {
            echo '<form action="index.php?page=lab2" method="post">';
            echo '<input required type="text" name="arraysize" placeholder="Размер массива">';
            echo '<input type="submit" class="button">';
            echo '</form>';
        } 
        else {
            $array = $_POST['array'];
            $i = 0;
            settype($tmparray,'array');
            foreach($array as &$element) {
                if (!in_array($element,$tmparray)) {
                    $tmparray[$i]=$element;
                    $i++;
                }
            }
            foreach($tmparray as &$element) {
                echo '<span class="spanout">'.$element.'</span>';
                //echo '<input type="text" placeholder="'.$element.'">';
            }
        }
    } 
    else {
        if (($_POST['arraysize']>=1&&$_POST['arraysize']<=100)) {
            echo '<form action="index.php?page=lab2" method="post">';
            for($i = 0; $i<$_POST['arraysize']; $i++) {
                echo '<input required type="text" name="array['.$i.']" placeholder="Элемент массива №'.($i+1).'">';
            }
            echo '<input type="submit" class="button">';
            echo '</form>';
        }
        else {
            echo '<form action="index.php?page=lab2" method="post"';
            echo "<h3>Ошибка ввода, введите число от 1 до 100</h3>";
            echo '<input type="submit" class="button" value="Перезагрузить"/>';
            echo '</form>' ;
        }        
    }
?>