<?php

require('external classes/PHPMailer.php');
require('external classes/SMTP.php');
require('external classes/Exception.php');

define("REGEXP_WORD", "\b[\w\_\-\@\.]*\b");


function displayForm()
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<input required class="form" name="recipients" required type="text" placeholder="Получатели">';
    echo '<input required class="form" name="topic" required type="text" placeholder="Тема">';
    echo '<textarea required class="textform" name="message" placeholder="Сообщение..." rows="3"></textarea>';
    echo '<input class="button" type="submit" value="Отправить">';
    echo '</form>';
}

function parseEmailList(string $str): ?array
{
    $str = trim(strip_tags($str));
    if (preg_match_all("/" . REGEXP_WORD . "/", $str, $wordArray)) {
        $resultArray = array_unique($wordArray[0]);
        unset($resultArray[array_search('', $resultArray)]);
        foreach ($resultArray as $item) {
            if (!filter_var($item, FILTER_VALIDATE_EMAIL)) {
                return null;
            }
        }
        return $resultArray;
    } else {
        return null;
    }
}

function saveRecipientList(array $emailList)
{
    $file = fopen("RecipientList.txt", "a");
    foreach ($emailList as $email) {
        fwrite($file, $email . PHP_EOL);
    }
    fclose($file);
}

if (isset($_POST['recipients'], $_POST['topic'], $_POST['message'])) {
    $parseResult = parseEmailList($_POST['recipients']);
    if ($parseResult === null) {
        echo '<span class="spanerr"> Ошибка в списке адресатов. Письмо не отправлено.</span>';
    } else {
        try {
            // Настройки
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Username = "Username";
            $mail->Password = "Password";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->setFrom("example@gmail.com", "name");
            foreach ($parseResult as $emailAddress) {
                $mail->addAddress($emailAddress);
            }

            $mail->isHTML(true);
            $mail->Subject = trim(strip_tags($_POST['topic']));
            $mail->Body = trim(strip_tags($_POST['message']));

            if (!$mail->send()) {
                echo '<span class="spanerr"> Ошибка. Письмо не отправлено</span>';
                echo '<span class="spanerr"> Не верно указаны настройки почты</span>';
                echo '<span class="spanerr"> Расшифровка ошибки: ' . $mail->ErrorInfo . '</span>';
            } else {
                echo '<span class="spanout"> Сообщение отправлено </span>';
                saveRecipientList($parseResult);
            }
        } catch (Exception $e) {
            echo '<span class="spanerr"> Ошибка. Письмо не отправлено</span>';
            echo '<span class="spanerr"> Расшифровка ошибки: ' . $mail->ErrorInfo . '</span>';
        }
    }
}
displayForm();

?>
