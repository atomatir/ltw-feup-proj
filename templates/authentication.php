<?php function draw_login()
{
    /**
     * Draws the login section.
     */ ?>

    <section >
        <form id="login-form" method="post" action=""  class="center">
            <input id="username-input" type="text" placeholder="Email Adress" required>
            <input id="password-input" type="password" placeholder="Password" required>
            <input id="login-button" type="submit" value="Login" />
        </form>
    </section>

<?php } ?>

<?php function draw_signup()
{
    /**
     * Draws the login section.
     */ ?>

    <section id="signup">
        <form method="post" action="">
            <input type="text" name="username-input" placeholder="username" required>
            <input type="password" name="password-input" placeholder="password" required>
            <input id="signup-button" type="submit" value="Sign up" />
        </form>
    </section>

<?php } ?>