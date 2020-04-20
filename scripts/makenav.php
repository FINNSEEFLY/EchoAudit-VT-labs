<?php 
    if (!isset($_GET['page'])) {
        echo '<a id = "a1" class="active" href="index.php?page=main"> Главная </a>';
        echo '<a id = "a2" href="index.php?page=services"> Услуги </a>';
        echo '<a id = "a3" href="index.php?page=staff"> Сотрудники </a>';
        echo '<a id = "a4" href="index.php?page=contacts"> Контакты </a>';
        echo '<a id = "a5" href="index.php?page=news"> Новости </a>';
    }
    else {
        echo '<a id = "a1" class ='.(($_GET['page'] == "main") ? "'active' " : "'' ").'href="index.php?page=main"> Главная </a>';
        echo '<a id = "a2" class ='.(($_GET['page'] == "services") ? "'active' " : "'' ").'href="index.php?page=services"> Услуги </a>';
        echo '<a id = "a3" class ='.(($_GET['page'] == "staff") ? "'active' " : "'' ").'href="index.php?page=staff"> Сотрудники </a>';
        echo '<a id = "a4" class ='.(($_GET['page'] == "contacts") ? "'active' " : "'' ").'href="index.php?page=contacts"> Контакты </a>';
        echo '<a id = "a5" class ='.(($_GET['page'] == "news") ? "'active' " : "'' ").'href="index.php?page=news"> Новости </a>';
    }
?>