<article class="content">
    <section class="aboutus">
        <div class=placeforlogo>
        </div>
        <div class=abouttext>
            <?php
            echo '<h1>' . $lang['content_main_bestsolution'] . '!</h1>';
            ?>
        </div>
    </section>
    <section class="whyus">
        <div class="someart">
        </div>
        <div class="listofbenefits">
            <?php
            echo '<h2 id="whyush2"> ' . $lang['content_main_whyus'] . '?</h2>';
            echo '<ul class="list">';
            echo '<li>' . $lang['content_main_exp'] . '!</li>';
            echo '<li>' . $lang['content_main_knew'] . '!</li>';
            echo '<li>' . $lang['content_main_find'] . '.</li>';
            echo '<li>' . $lang['content_main_null'] . '.';
            echo '</li>';
            echo '<li>' . $lang['content_main_report'] . '';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '</section>';
            echo '<section class="contact">';
            echo '<div class="callme">';
            echo '<h2> ' . $lang['content_main_wow'] . '!</h2>';
            echo $lang['content_main_interesting'] . '?';
            echo '<br><br>' . $lang['content_main_youcan'] . '!';
            echo '</div>';
            echo '<div class="dialog">';
            echo '<div class="dialogform">';
            echo '<input required class="form" required type="text" placeholder="' . $lang['content_contacts_form_name'] . '?">';
            echo '<input class="form" type="tel" placeholder="' . $lang['content_contacts_form_number'] . ' +375 29 322 1337">';
            echo '<input required class="form" type="email" placeholder="Email">';
            echo '<textarea required class="textform" placeholder="' . $lang['content_contacts_form_message'] . '..." rows="3"></textarea>';
            echo '<input class="button" type="submit" value="' . $lang['content_contacts_form_send'] . '">';
            ?>
        </div>
        </div>
    </section>
</article>