<?php

define("REGEXP", "(?i)http(s)?:\/\/(?!(www\.)?bsuir\.by([\w.,@?^=%&;:\/~+#-]*[\w@?^=%&;\/~+#-]*))(([\w-]+)(\.[\w-]+)+)([\w.,@?^=%&;:\/~+#-]*[\w@?^=%&;\/~+#-])");
define("FILE_MESSAGE_HISTORY", "messageHistory.php");

function displayForm($lang)
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<input required class="form" name="username" required type="text" placeholder="' . $lang['script_lab4_username'] . '">';
    echo '<textarea required class="textform" name="message" placeholder="' . $lang['script_lab4_message'] . '..." rows="3"></textarea>';
    echo '<input class="button" type="submit" value="' . $lang['script_lab4_send'] . '">';
    echo '</form>';
}

function prepareString($str, $lang): string
{
    $result = strip_tags($str);
    $result = preg_replace("/" . REGEXP . "/", '#' . $lang['script_lab4_link'] . '#', $result);
    return $result;
}

function makeMessageBox($username, $message, $lang): string
{
    return '<section class="messagebox">
            <h2 class="username">' . prepareString($username, $lang) . '</h2>
            <div class="message">' . prepareString($message, $lang) . '
             </div>
            </section>';
}

function addMessageInFile($message)
{
    if (!file_exists(FILE_MESSAGE_HISTORY)) {
        $file = fopen(FILE_MESSAGE_HISTORY, "w");
    } else {
        $file = fopen(FILE_MESSAGE_HISTORY, "a");
    }
    fwrite($file, $message);
    fclose($file);
}

function loadMessageHistory($lang)
{
    if (!file_exists(FILE_MESSAGE_HISTORY)) {
        $file = fopen(FILE_MESSAGE_HISTORY, "w");
        fclose($file);
    } else {
        $str = file_get_contents(FILE_MESSAGE_HISTORY);
        if ($str !== false) {
            echo $str;
        }
    }
    displayForm($lang);
}

if (isset($_POST['message'], $_POST['username'])) {
    addMessageInFile(makeMessageBox($_POST['username'], $_POST['message'], $lang));
}

loadMessageHistory($lang);
?>
