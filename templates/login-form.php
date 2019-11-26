<?php function draw_login()
{
    /**
     * Draws the login section.
     */ ?>

    <section id="login">
        <form method="post" action="">
            <input type="text" name="username-input" placeholder="username" required>
            <input type="password" name="password-input" placeholder="password" required>
            <input id="search-button-input" type="submit" value="Login" />
        </form>
    </section>

<?php } ?>