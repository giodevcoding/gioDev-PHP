<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/css/less.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/include/utils.php";
    compileLess();
?>

<?php
if(isset($_GET['exit_admin'])){
    $_SESSION['giodev_admin'] = false;
    unset($_GET['exit_admin']);
    ?><script>window.location = window.location.pathname</script><?php
} ?>

<header id="navbar">
    <a href="/"><img id="navbar-logo" src="/assets/LogoWithShadowCropped.png"/></a>
    <?php if(hasAdmin()){ ?>
        <a href="<?php echo getHome()."?exit_admin=true"; ?>"><h2 style="position: absolute; font-family: helvetica; font-weight: bold; color: red; margin: -0px; padding: 0px; margin-left: 50vw; font-size: 1vw; top: 1vh; border: 2px solid black; background-color: lightgray;">ADMIN</h2></a>
    <?php } ?>
    <div id="navbar-navpages">
        <a href="/"><div class="navpage" style="left: calc(100% - 150px - 60px - 3em - 60px - 2.5em - 60px - 2em);">About</div></a>
        <a href="/portfolio/"><div class="navpage" style="left: calc(100% - 150px - 60px - 3.5em - 60px - 1.75em);">Portfolio</div></a>
        <a href="https://medium.com/@giodevcoding" target="_blank"><div class="navpage" style="left: calc(100% - 150px - 60px - 1.5em );">Blog</div></a>
        <a href="/contact/"><div class="navpage" style="left: calc(100% - 150px);">Contact</div></a>
    </div>

    <?php
        include "friends.php";
    ?>
    <div id="social-media-container">
        <div id="social-media-bar">
            <a title="My email" href="mailto:giovanni@giodev.org"><div class="social-media-icon" id="mail"></div></a>
            <a title="My cellphone number" href="tel:623-227-1446"><div class="social-media-icon" id="phone"></div></a>
            <a title="My twitter" href="https://twitter.com/giodevcoding" target="_blank"><div class="social-media-icon" id="twitter"></div></a>
            <a title="My LinkedIn" href="https://www.linkedin.com/in/giovanni-panzetta-third/" target="_blank"><div class="social-media-icon" id="linkedin"></div></a>
            <a title="My Upwork profile" href="https://www.upwork.com/o/profiles/users/_~0159b00a75b3ba5b0f/" target="_blank"><div class="social-media-icon" id="upwork"></div></a>
            <a title="My blog on Medium" href="https://medium.com/@giodevcoding" target="_blank"><div class="social-media-icon" id="medium"></div></a>
            <a title="My Github" href="https://github.com/giodevcoding" target="_blank"><div class="social-media-icon" id="github"></div></a>
        </div>
        <div id="social-media-details">giovanni@giodev.org</div>
    </div>

    <div id="mobile-nav-menu-button">
        <img src="/assets/icon/menu.png" />
    </div>
</div>

<div id="mobile-nav-menu">

    <div id="mobile-close-menu-button">
        <img src="/assets/icon/back.png" />
    </div>

    <div id="mobile-menu-navpages">

        <a href="/"><div class="navpage"><h3>About</h3></div></a>
        <a href="/portfolio/"><div class="navpage"><h3>Portfolio</h3></div></a>
        <a href="https://medium.com/@giodevcoding" target="_blank"><div class="navpage"><h3>Blog</h3></div></a>
        <a href="/contact/"><div class="navpage"><h3>Contact</h3></div></a>
    </div>



    <div id="mobile-media-bar">
        <a title="My email" href="mailto:giovanni@giodev.org"><div class="social-media-icon" id="mail"></div></a>
        <a title="My cellphone number" href="tel:623-227-1446"><div class="social-media-icon" id="phone"></div></a>
        <a title="My twitter" href="https://twitter.com/giodevcoding" target="_blank"><div class="social-media-icon" id="twitter"></div></a>
        <a title="My LinkedIn" href="https://www.linkedin.com/in/giovanni-panzetta-third/" target="_blank"><div class="social-media-icon" id="linkedin"></div></a>
        <a title="My Upwork profile" href="https://www.upwork.com/o/profiles/users/_~0159b00a75b3ba5b0f/" target="_blank"><div class="social-media-icon" id="upwork"></div></a>
        <a title="My blog on Medium" href="https://medium.com/@giodevcoding" target="_blank"><div class="social-media-icon" id="medium"></div></a>
        <a title="My Github" href="https://github.com/giodevcoding" target="_blank"><div class="social-media-icon" id="github"></div></a>
    </div>
</header>

<div id="navblock"></div>
<script src="/js/move.min.js"></script>
<script src="/js/navbar.js"></script>
