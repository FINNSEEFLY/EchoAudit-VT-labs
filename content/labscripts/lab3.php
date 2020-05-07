<?php

function findFiles($dirPath, $startRange, $endRange, $charCombination)
{
    if (is_dir($dirPath)) {
        $dirFiles = scandir($dirPath);
        unset($dirFiles[array_search('.', $dirFiles, true)],
            $dirFiles[array_search('..', $dirFiles, true)]);
        if (count($dirFiles) == 0) {
            return [];
        }
        $resultArray = [];
        foreach ($dirFiles as $fileOrDir) {
            if (is_dir(($dirPath . '/' . $fileOrDir))) {
                $otherDirFiles = findFiles($dirPath . '/' . $fileOrDir, $startRange, $endRange, $charCombination);
                if ($otherDirFiles !== null) {
                    array_push($resultArray, $otherDirFiles);
                }
            } else {
                $isValidCreateTime = (filectime($dirPath . '/' . $fileOrDir) >= strtotime($startRange)) &&
                    (filectime($dirPath . '/' . $fileOrDir) <= strtotime($endRange));
                $substringIsFound = stripos($fileOrDir, $charCombination);
                if (($substringIsFound !== false) && $isValidCreateTime) {
                    array_push($resultArray, $fileOrDir);
                }
            }
        }
        return $resultArray;
    } else {
        return null;
    }
}

function displayForm()
{
    echo '<form class="dialogform" action="index.php?page=lab3" method="post">';
    echo '<input required type="text" name="dirPath" placeholder="Имя дериктории" value =' . (isset($_POST['dirPath']) ? $_POST['dirPath'] : '""') . '>';
    echo '<input required type="date" name="startRange" title="Начало диапазона дат создания файла" value =' . (isset($_POST['startRange']) ? $_POST['startRange'] : '""') . '>';
    echo '<input required type="date" name="endRange" title="Конец диапазона дат создания " value =' . (isset($_POST['endRange']) ? $_POST['endRange'] : '""') . '>';
    echo '<input required type="text" name="charCombination" placeholder="Подстрока в названии" value =' . (isset($_POST['charCombination']) ? $_POST['charCombination'] : '""') . '>';
    echo '<input type="submit" class="button">';
    echo '</form>';
}


function displayArray($array): int
{
    $result = 0;
    foreach ($array as $element) {
        if (is_array($element)) {
            displayArray($element);
        } else {
            echo '<span class="spanout"> ' . $element . '</span>';
            $result++;
        }
    }
    return $result;
}


if (!isset($_POST['startRange'], $_POST['endRange'], $_POST['dirPath'], $_POST['charCombination'])) {
    displayForm();
} else {
    $readyToSearch = true;
    if (strtotime($_POST['startRange']) > strtotime($_POST['endRange'])) {
        echo '<span class="spanerr"> Начальное время в диапазоне дат не может быть меньше конечного </span>';
        $readyToSearch = false;
    }
    if ($readyToSearch) {
        $resultArray = findFiles($_POST['dirPath'], $_POST['startRange'], $_POST['endRange'], $_POST['charCombination']);
        if ($resultArray !== null) {
            if (count($resultArray) !== 0) {
                if (displayArray($resultArray) == 0) {
                    echo '<span class="spanout"> В директории нет подходящих файлов </span>';
                    displayForm();
                };
            } else {
                echo '<span class="spanout"> В директории нет подходящих файлов </span>';
                displayForm();
            }
        } else {
            echo '<span class="spanout"> Данной директории не существует </span>';
            displayForm();
        }
    } else {
        displayForm();
    }
}
?>
