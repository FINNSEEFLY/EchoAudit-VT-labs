<?php
echo '<a id = "a1" class =' . (($page == "main") ? "'active' " : "'' ") . 'href="index.php?page=main">'.$lang['nav_main'].'</a>';
echo '<a id = "a2" class =' . (($page == "services") ? "'active' " : "'' ") . 'href="index.php?page=services">'.$lang['nav_services'].'</a>';
echo '<a id = "a3" class =' . (($page == "staff") ? "'active' " : "'' ") . 'href="index.php?page=staff">'.$lang['nav_staff'].'</a>';
echo '<a id = "a4" class =' . (($page == "contacts") ? "'active' " : "'' ") . 'href="index.php?page=contacts">'.$lang['nav_contacts'].'</a>';
echo '<a id = "a5" class =' . (($page == "news") ? "'active' " : "'' ") . 'href="index.php?page=news">'.$lang['nav_news'].'</a>';
?>