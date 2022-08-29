<?php session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/include/utils.php";
    $db;
    if(strpos($_SERVER["HTTP_HOST"], "localhost") !== false){
        $db = connectToDB();
    }else{
        $db = connectToDB("localhost", "giodevDB", "giodev", "temp_password");
    }

    createTables($db);
?>
<!DOCTYPE HTML>
<html>

    <head>

        <title>My Portfolio</title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href = "/css/giodev.css" />
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    </head>

    <body >
        <?php require($_SERVER["DOCUMENT_ROOT"]."/navbar.php"); ?>

        <div class = "container">

            <?php //Buttons ?>

                <div class="portfolio-button-container">

                    <button class="portfolio-button" id="featured-projects-button" data-section="featured-project-section" type="button">Featured</button>
                    <button class="portfolio-button" id="web-projects-button" data-section="web-project-section" type="button">Web</button>
                    <button class="portfolio-button" id="mobile-projects-button" data-section="mobile-project-section" type="button">Mobile</button>
                    <button class="portfolio-button" id="game-projects-button" data-section="game-project-section" type="button">Game</button>
                    <button class="portfolio-button" id="software-projects-button" data-section="software-project-section" type="button">Software</button>
                    <button class="portfolio-button" id="other-projects-button" data-section="other-project-section" type="button">Other</button>
                    <button id="github-button" type="button">GitHub</button>

                </div>

            <?php if(hasAdmin()){ ?>
                <input type="button" onclick="location.href='/portfolio/projectentry.php';" value="New Project" />

            <?php }

            //Sections ?>
            <div class="portfolio-project-section" id="featured-project-section">

                <div id="portfolio-introduction">

                    <h1>Welcome to my Portfolio!</h1>
                    <p>
                        This is my portfolio. You can check out all my past and current projects here in my portfolio. You can browse the categories
                        by clicking the assosciated button above, and you can see my featured projects by scrolling down here in the
                        featured section. For each project there's a title, a link, the tools used, and the starting and ending dates for the projects.
                        Click "Show Details" to see more about the project.
                    </p>
                </div>

                <?php

                    $query = $db->prepare('SELECT * FROM projects WHERE categories LIKE "%featured%" ORDER BY startDate DESC;');
                    $query->execute();
                    $projects = $query->fetchAll();

                    for($i = 0; $i < count($projects); $i++){
                        $entry = $projects[$i];
                        $imagequery = $db->prepare('SELECT url FROM projectimages WHERE id = ?');
                        $imagequery->execute(array($entry[0]));
                        $images = $imagequery->fetchAll();
                        addProject($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry [5], $entry[6], $entry[7], $images);
                    }

                ?>
            </div>
            <div class="portfolio-project-section" id="web-project-section">
                <?php
                    $query = $db->prepare('SELECT * FROM projects WHERE categories LIKE "%web%" ORDER BY startDate DESC;');
                    $query->execute();
                    $projects = $query->fetchAll();
                    $num = -1;
                    for($i = 0; $i < count($projects); $i++){
                        $entry = $projects[$i];
                        $imagequery = $db->prepare('SELECT url FROM projectimages WHERE id = ?');
                        $imagequery->execute(array($entry[0]));
                        $images = $imagequery->fetchAll();
                        addProject($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry [5], $entry[6], $entry[7], $images);
                        $num = $i;
                    }
                    if($num < 0){ ?>
                                <h1 style="margin-top: 12vw;">Nothing here yet :(</h1>
                <?php }

                ?>
            </div>
            <div class="portfolio-project-section" id="mobile-project-section">
                <?php
                    $query = $db->prepare('SELECT * FROM projects WHERE categories LIKE "%mobile%" ORDER BY startDate DESC;');
                    $query->execute();
                    $projects = $query->fetchAll();
                    $num = -1;
                    for($i = 0; $i < count($projects); $i++){
                        $entry = $projects[$i];
                        $imagequery = $db->prepare('SELECT url FROM projectimages WHERE id = ?');
                        $imagequery->execute(array($entry[0]));
                        $images = $imagequery->fetchAll();
                        addProject($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry [5], $entry[6], $entry[7], $images);
                        $num = $i;
                    }
                    if($num < 0){ ?>
                                <h1 style="margin-top: 12vw;">Nothing here yet :(</h1>
                <?php }

                ?>
            </div>
            <div class="portfolio-project-section" id="game-project-section">
                <?php
                    $query = $db->prepare('SELECT * FROM projects WHERE categories LIKE "%game%" ORDER BY startDate DESC;');
                    $query->execute();
                    $projects = $query->fetchAll();
                    $num = -1;
                    for($i = 0; $i < count($projects); $i++){
                        $entry = $projects[$i];
                        $imagequery = $db->prepare('SELECT url FROM projectimages WHERE id = ?');
                        $imagequery->execute(array($entry[0]));
                        $images = $imagequery->fetchAll();
                        addProject($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry [5], $entry[6], $entry[7], $images);
                        $num = $i;
                    }
                    if($num < 0){ ?>
                                <h1 style="margin-top: 12vw;">Nothing here yet :(</h1>
                <?php }

                ?>
            </div>
            <div class="portfolio-project-section" id="software-project-section">
                <?php
                    $query = $db->prepare('SELECT * FROM projects WHERE categories LIKE "%software%" ORDER BY startDate DESC;');
                    $query->execute();
                    $projects = $query->fetchAll();
                    $num = -1;
                    for($i = 0; $i < count($projects); $i++){
                        $entry = $projects[$i];
                        $imagequery = $db->prepare('SELECT url FROM projectimages WHERE id = ?');
                        $imagequery->execute(array($entry[0]));
                        $images = $imagequery->fetchAll();
                        addProject($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry [5], $entry[6], $entry[7], $images);
                        $num = $i;
                    }
                    if($num < 0){ ?>
                            <h1 style="margin-top: 12vw;">Nothing here yet :(</h1>
                <?php }

                ?>
            </div>
            <div class="portfolio-project-section" id="other-project-section">
                <?php
                    $query = $db->prepare('SELECT * FROM projects WHERE categories LIKE "%other%" ORDER BY startDate DESC;');
                    $query->execute();
                    $projects = $query->fetchAll();
                    $num = -1;
                    for($i = 0; $i < count($projects); $i++){
                        $entry = $projects[$i];
                        $imagequery = $db->prepare('SELECT url FROM projectimages WHERE id = ?');
                        $imagequery->execute(array($entry[0]));
                        $images = $imagequery->fetchAll();
                        addProject($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry [5], $entry[6], $entry[7], $images);
                        $num = $i;
                    }
                    if($num < 0){ ?>
                            <h1 style="margin-top: 12vw;">Nothing here yet :(</h1>
                <?php }

                ?>
            </div>

            <?php
            function addProject($projectID, $projectName, $projectLink, $categories, $startDate, $endDate, $tools, $details, $images){

                $startDate = strtotime($startDate);
                $startDate = date("m/d/Y", $startDate);
                if(strpos($endDate, 'current') === false){
                    $endDate = strtotime($endDate);
                    $endDate = date("m/d/Y", $endDate);
                }else{
                    $endDate = "Present";
                }
                ?>
                    <div class="portfolio-project">

                        <div class="portfolio-project-summary">

                            <table class="project-primary-img"><tr>
                                <td>
                                    <img src="<?php echo $images[0][0]?>" /></table>
                                </td>
                            </tr>
                            <div class="project-title"><h1><?php echo $projectName; ?></h1></div>
                            <?php if(strtolower($projectLink) != "none") { ?>
                            <div class="project-link"><a href="<?php echo $projectLink; ?>" target="_blank"><h1>(<?php echo $projectLink; ?>)</h3></div></a>
                            <?php } ?>
                            <div class="tools"><h1><?php echo $tools ?></h2></div>
                            <div class="portfolio-date"><h1><i><?php echo "($startDate - $endDate)"?></i></h2></div>
                            <?php if(hasAdmin()){ ?>
                                    <form action="projectentry.php" class="project-remove-form" method="post">
                                        <input type="hidden" name="project_id" value="<?php echo $projectID; ?>"/>
                                        <input type="hidden" name="project_name" value="<?php echo $projectName; ?>"/>
                                        <input type="hidden" name="remove_project" value="true"/>
                                        <input type="submit" class="remove-project-button" value="Remove." />
                                    </form>
                                    <form action="projectentry.php" class="project-edit-from" method="post">
                                        <input type="hidden" name="project_id" value="<?php echo $projectID; ?>"/>
                                        <input type="submit" class="edit-project-button" value="Edit" />
                                    </form>

                            <?php } ?>
                        </div>

                        <div class="portfolio-project-details">
                            <hr class="portfolio-project-separator" />
                            <p>
                                <?php echo $details; ?>
                            </p>
                        </div>
                        <div class="portfolio-details-button-container">
                            <button class="portfolio-details-button">Show details...</button>
                        </div>


                    </div>

                <?php
            }
            ?>
        </div>
        <?php require($_SERVER["DOCUMENT_ROOT"]."/footer.php"); ?>

        <script src="/js/portfolio.js"></script>

    </body>
</html>
