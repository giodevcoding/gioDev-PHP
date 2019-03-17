<?php session_start();
    include $_SERVER["DOCUMENT_ROOT"]."/include/utils.php";
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>GioDev</title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="/css/normalize.css" />
        <link rel="stylesheet" href = "/css/giodev.css" />
        <link rel="icon" type="image/png" href="favicon_new.ico" />

    </head>
    <body>

        <?php require($_SERVER["DOCUMENT_ROOT"]."/navbar.php"); ?>
        <div class="container">

            <div class="cover">

                <div id="coverimg"></div>

                <div id="cover-container">
                    <h1 id="mobile-welcome">Hi there</h1>
                    <div id="cover-headshot" ></div>
                    <h1 id="welcome">Hi there</h1>
                </div>
            </div>

            <div class="separatorline"></div>

            <div class = "textsection" id="about-textsection" style = "padding-top: 40px; margin: auto; left: 0;">

                <h1 id="name-intro">I'm Giovanni</h1>

                <h2 id="sub-intro">Your Web, App, and Software Developer</h2>

                <div class="home-section services-section">
                    <h2>What I do</h2>
                    <p id="service-offer">
                        Here are some of the services I offer:
                    </p>
                    <div class="service-ul-container">

                        <ul>

                            <li>I build and design <span style="font-weight: bold; color: #0040ff;">websites.</span> <button class="service-button" type="button">More info</button></li>

                            <div class="service-details service-details-hidden" style="display: none;" text-height="500px">

                                <p>
                                    I build and design websites however you need. I can build websites the the traditional way with HTML and Bootstrap with CSS and JavaScript for design and functionality,
                                     or the more modern way of using JavaScript frameworks such as React, VueJS, or Angular. Whether you have a PSD that needs to be converted, or you need me to do all the design,
                                     I'll do anything and everything you need for your website.
                                </p>
                            </div>

                            <li>I develop the <span style="font-weight: bold; color: #0d2dad;">backend</span> for websites. <button class="service-button" type="button">More info</button></li>

                            <div class="service-details service-details-hidden" style="display: none;" text-height="200px">

                                <p>
                                    Developing the backend for websites is my favorite part of web development. With the power of Java, PHP, JavaScript with NodeJS, Go, Ruby on Rails, Python, or any other tool for backend development,
                                    building the foundation and functionality that makes a website do what it is supposed to do is the best part of web development to me. If you need an application or custom
                                    functionality for your website, you can be guaranteed that I will make it happen, and that the final result will meet or exceed your expectations.
                                </p>
                            </div>

                            <li>I create <span style="font-weight: bold; color: #007005;">mobile</span> applications. <button class="service-button" type="button">More info</button></li>

                            <div class="service-details service-details-hidden" style="display: none;" text-height="100px">

                                <p>
                                    Whether developing apps natively with Java for Android and Swift for iOS, or cross-platform development using C# with Xamarin Studio, or HTML/CSS and JavaScript with tools like PhoneGap,
                                    I can build the app you're wanting to build on whatever platform you want to build it on.
                                </p>
                            </div>

                            <li>I develop desktop and mobile <span style="font-weight: bold; color: #dd3500;">games</span>. <button class="service-button" type="button">More info</button></li>

                            <div class="service-details service-details-hidden" style="display: none;" text-height="100px">

                                <p>
                                    Game development is my passion. I can make games with the basic libraries and frameworks, like SDL2 or Allegro with C++, or libGDX with Java. I can also make games using popular
                                    engines like Unity or Unreal Engine 4. Whatever the game that is being developed, you can be sure that I'll make the game with care and quality regardless of the specific tools
                                    chosen for the project.
                                </p>
                            </div>

                            <li>I build <span style="font-weight: bold; color: #cc1000;">software</span>. <button class="service-button" type="button">More info</button></li>

                            <div class="service-details service-details-hidden" style="display: none;" text-height="100px">

                                <p>
                                    I build software that will be a useful tool and application for those who need it. Whether using higher-level tools such as Java or Python, or getting closer to the metal with C/C++ and Rust,
                                    I'd be happy to take on the challenge to build the piece of software that needs to be built.
                                </p>
                            </div>
                        </ul>
                    </div>

                    <p>
                        You can view all my past and current projects in my <a href="portfolio"><u>Portfolio.</u></a> If you're needing something done that is within or related to these categories, feel free to contact me at <a href="mailto:giodevcoding@gmail.com">giovanni@giodev.org</a>
                        , or if you'd like to contact me in a different way, visit my <a href="contact"><u>Contact page.</u></a>
                    </p>
                </div>

                <span class="about-section-divider"></span>

                <div class="home-section-container">

                    <div class="home-section about-section" >

                        <h2>Who I Am</h2>

                        <p>
                            I'm a young, fresh freelance developer. I'm a determined problem-solver
                            who loves to make things that work and are helpful to people. While I love programming
                            for all kinds of applications, my passion is game development. I dream of making a
                            well-constructed game with heart that will leave an impact on people. I'm also a musician
                            who enjoys playing many instruments and writing music, and I wish I was a skateboarder,
                            but time does not allow for it.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php require($_SERVER["DOCUMENT_ROOT"]."/footer.php"); ?>
        <script src="/js/move.min.js"></script>
        <script src="/js/about.js"></script>
    </body>
</html>
