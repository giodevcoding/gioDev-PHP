<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Contact</title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href = "/css/giodev.css" />
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    </head>
    <body>
        <?php require($_SERVER["DOCUMENT_ROOT"]."/navbar.php"); ?>
        <div class="container">
            <div class="separatorline"></div>
            <br /><br />
            <h2 class="contact">My Contact Information</h2>

            <div class = "textsection" style="width: 50%;">
                <p>
                    <b>Email</b >   <br />
                    <a href="mailto:giovanni@giodev.org" target="_blank">giovanni@giodev.org</a>
                </p>
                <p>
                    <b>Cellphone Number</b >   <br />
                    <a href="tel:623-227-1446" target="_blank">623-227-1446</a>
                </p>
                <p>
                    <b>LinkedIn</b >   <br />
                    <a href="https://www.linkedin.com/in/giovanni-panzetta-third/" target="_blank">Giovanni Panzetta</a>
                </p>
                <p>
                    <b>Twitter</b >   <br />
                    <a href="https://twitter.com/giodevcoding" target="_blank">@giodevcoding</a>
                </p>
                <p>
                    <b>GitHub</b >   <br />
                    <a href="https://github.com/giodevcoding" target="_blank">@giodevcoding</a>
                </p>
                <p>
                    <b>Upwork</b >   <br />
                    <a href="https://www.upwork.com/o/profiles/users/_~0159b00a75b3ba5b0f/" target="_blank">Giovanni Panzetta</a>
                </p>
                <p>
                    <b>Medium Blog</b >   <br />
                    <a href="https://medium.com/@giodevcoding" target="_blank">@giodevcoding</a>
                </p>

            </div>
        </div>
    </body>
</html>
