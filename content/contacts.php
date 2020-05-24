<article class="content">
<?php
echo '<h1> '.$lang['content_contacts_contact_us'].'</h1>';
?>
    <section class="conteiner">
        <div class="info">
            <?php
            echo '<h2>'.$lang['content_contacts_h2_address'].'</h2>';
            echo '<span>'.$lang['content_contacts_address'].'</span>';
            echo '<br>';
            echo '<h2>'.$lang['content_contacts_phonenumber'].':</h2>';
            echo '<span>+375 44 322 13 37</span>';
            echo '<br>';
            echo '<h2>'.$lang['content_contacts_email'].':</h2>';
            ?>
            <span>EchoAudit@echoaudit.echoaudit</span>
        </div>
        <div class="dialog">
            <div class="dialogform">
                <?php
                echo '<input required class="form" required type="text" placeholder="'.$lang['content_contacts_form_name'].'?">';
                echo '<input class="form" type="tel" placeholder="'.$lang['content_contacts_form_number'].' +375 29 322 1337">';
                echo '<input required class="form" type="email" placeholder="Email">';
                echo '<textarea required class="textform" placeholder="'.$lang['content_contacts_form_message'].'..." rows="3"></textarea>';
                echo '<input class="button" type="submit" value="'.$lang['content_contacts_form_send'].'">';
                ?>
            </div>
        </div>
    </section>
</article>