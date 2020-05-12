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
    displayForm($lang);
} else {
    $readyToSearch = true;
    if (strtotime($_POST['startRange']) > strtotime($_POST['endRange'])) {
        echo '<span class="spanerr"> ' . $lang['script_lab3_errdate'] . ' </span>';
        $readyToSearch = false;
    }
    if ($readyToSearch) {
        $resultArray = findFiles($_POST['dirPath'], $_POST['startRange'], $_POST['endRange'], $_POST['charCombination']);
        if ($resultArray !== null) {
            if (count($resultArray) !== 0) {
                if (displayArray($resultArray) == 0) {
                    echo '<span class="spanout"> ' . $lang['script_lab3_errfile'] . ' </span>';
                    displayForm($lang);
                };
            } else {
                echo '<span class="spanout"> ' . $lang['script_lab3_errfile'] . ' </span>';
                displayForm($lang);
            }
        } else {
            echo '<span class="spanout"> ' . $lang['script_lab3_errdir'] . ' </span>';
            displayForm($lang);
        }
    } else {
        displayForm($lang);
    }
}
function displayForm($lang)
{
    echo '<form class="dialogform" action="index.php?page=lab3" method="post">';
    echo '<input required type="text" name="dirPath" placeholder="' . $lang['script_lab3_dir'] . ' ' . (isset($_POST['dirPath']) ? $_POST['dirPath'] : '""') . '>';
    echo '<input required type="date" name="startRange" title="' . $lang['script_lab3_date_1'] . '" value =' . (isset($_POST['startRange']) ? $_POST['startRange'] : '""') . '>';
    echo '<input required type="date" name="endRange" title="' . $lang['script_lab3_date_2'] . ' " value =' . (isset($_POST['endRange']) ? $_POST['endRange'] : '""') . '>';
    echo '<input required type="text" name="charCombination" placeholder="' . $lang['script_lab3_str'] . '" value =' . (isset($_POST['charCombination']) ? $_POST['charCombination'] : '""') . '>';
    echo '<input type="submit" class="button">';
    echo '</form>';
}
?>
