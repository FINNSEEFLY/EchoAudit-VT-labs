<?php

define("REGEXP", "(?i)http(s)?:\/\/(?!(www\.)?bsuir\.by([\w.,@?^=%&;:\/~+#-]*[\w@?^=%&;\/~+#-]*))(([\w-]+)(\.[\w-]+)+)([\w.,@?^=%&;:\/~+#-]*[\w@?^=%&;\/~+#-])");
define("FILE_MESSAGE_HISTORY", "messageHistory.php");

function displayForm()
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<input required class="form" name="username" required type="text" placeholder="Ваше имя">';
    echo '<textarea required class="textform" name="message" placeholder="Сообщение..." rows="3"></textarea>';
    echo '<input class="button" type="submit" value="Отправить">';
    echo '</form>';
}

function prepareString($str): string
{
    $result = strip_tags($str);
    $result = preg_replace("/" . REGEXP . "/", "#Внешние ссылки запрещены#", $result);
    return $result;
}

function makeMessageBox($username, $message): string
{
    return '<section class="messagebox">
            <h2 class="username">' . prepareString($username) . '</h2>
            <div class="message">' . prepareString($message) . '
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

function loadMessageHistory()
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
    displayForm();
}

if (isset($_POST['message'], $_POST['username'])) {
    addMessageInFile(makeMessageBox($_POST['username'], $_POST['message']));
}

loadMessageHistory();
?>
