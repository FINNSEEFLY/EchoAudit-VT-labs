<?php

define("REGEXP", "[\w]+[\w\d\-_\.]*@[\w][\w\d\-_\.]*\.[\w][\w\d\-_\.]*");

function displayForm()
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<input required class="form" name="email" placeholder="email"></input>';
    echo '<input class="button" type="submit" value="Отправить">';
    echo '</form>';
}

function addToDataBase($email): int
{
    $host = 'localhost';
    $databaseName = 'emaildatabase';
    $user = 'root';
    $password = '';
    $result = 1;
    @$mysqli = new mysqli($host, $user, $password, $databaseName);
    if ($mysqli->connect_error) {
        echo '<span class="spanerr"> Не удалось подключится к базе данных</span>';
        echo '<span class="spanerr"> Вывод ошибки: <br> '.mysqli_connect_error().'</span>';
        return $result;
    }
    $mysqli->set_charset('UTF8');
    $request = $mysqli->query("SELECT email FROM emailtable WHERE email = '$email' LIMIT 1");
        if ($request->num_rows > 0) {
            $result = 2;
        } else {
            $request = $mysqli->query("INSERT INTO emailtable VALUES ('$email')");
            $result = 0;
        }
    $mysqli->close();
    return $result;
}

if (isset($_POST['email'])) {
    $email = strip_tags($_POST['email']);
    if (!preg_match("/" . REGEXP . "/", $email)) {
        echo '<span class="spanerr"> Введен некорректный email </span>';
    } else {
        switch (addToDatabase($email)) {
            case 0:
                echo '<span class="spanout"> Email ' . $email . ' успешно добавлен</span>';
                break;
            case 1:
                echo '<span class="spanerr"> Email добавлен не был.</span>';
                break;
            case 2:
                echo '<span class="spanerr"> Ошибка добавления, такой email уже существует.</span>';
                break;
        }
    }
}
displayForm();
?>
