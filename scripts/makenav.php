<?php
echo '<a id = "a1" class =' . (($page == "main") ? "'active' " : "'' ") . 'href="index.php?page=main"> Главная </a>';
echo '<a id = "a2" class =' . (($page == "services") ? "'active' " : "'' ") . 'href="index.php?page=services"> Услуги </a>';
echo '<a id = "a3" class =' . (($page == "staff") ? "'active' " : "'' ") . 'href="index.php?page=staff"> Сотрудники </a>';
echo '<a id = "a4" class =' . (($page == "contacts") ? "'active' " : "'' ") . 'href="index.php?page=contacts"> Контакты </a>';
echo '<a id = "a5" class =' . (($page == "news") ? "'active' " : "'' ") . 'href="index.php?page=news"> Новости </a>';
?>