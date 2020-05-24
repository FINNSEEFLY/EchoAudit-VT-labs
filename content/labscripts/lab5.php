<?php

define("REGEXP", "[\w]+[\w\d\-_\.]*@[\w][\w\d\-_\.]*\.[\w][\w\d\-_\.]*");

function displayForm($lang)
{
    echo '<form class="dialogform" action="" method="post">';
    echo '<input required class="form" name="email" placeholder="email"></input>';
    echo '<input class="button" type="submit" value="' . $lang['script_lab5_send'] . '">';
    echo '</form>';
}

function addToDataBase($email, $lang): int
{
    $host = 'localhost';
    $databaseName = 'emaildatabase';
    $user = 'root';
    $password = '';
    $result = 1;
    @$mysqli = new mysqli($host, $user, $password, $databaseName);
    if ($mysqli->connect_error) {
        echo '<span class="spanerr"> ' . $lang['script_lab5_DB_connecterr'] . '</span>';
        echo '<span class="spanerr">' . $lang['script_lab5_DB_err'] . ': <br> '.mysqli_connect_error().'</span>';
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
        echo '<span class="spanerr"> ' . $lang['script_lab5_email'] . ' </span>';
    } else {
        switch (addToDatabase($email, $lang)) {
            case 0:
                echo '<span class="spanout"> Email ' . $email . ' ' . $lang['script_lab5_emailadded'] . '</span>';
                break;
            case 1:
                echo '<span class="spanerr"> Email ' . $lang['script_lab5_emailnotadded'] . '.</span>';
                break;
            case 2:
                echo '<span class="spanerr"> ' . $lang['script_lab5_emailexist'] . '.</span>';
                break;
        }
    }
}
displayForm($lang);
?>
