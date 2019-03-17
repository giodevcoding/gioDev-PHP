<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/include/utils.php';
    if(!hasAdmin()){
        gotoPage(getHome());
    }
?>
<script>
    let lastBoxID = 2;
    function addImage(button, value = -1){
        console.log(lastBoxID);
        let input = document.createElement("input");
        input.type = "text";
        input.name = "img" + lastBoxID;
        input.value = input.name;
        if(value != -1){
            input.value = value;
        }
        button.parentElement.insertBefore(input, button);
        button.parentElement.insertBefore(document.createElement("br"), button);
        document.querySelector("#imageNum").value = lastBoxID;
        lastBoxID++;
    }
</script>
<?php

    $db;
    if(strpos($_SERVER["HTTP_HOST"], "localhost") !== false){
        $db = connectToDB();
    }else{
        $db = connectToDB("db720651841.db.1and1.com", "db720651841", "dbo720651841", "Gyo135795816b!");
    }

    $error_message = "";

    $projectID = '';
    $projectName = "";
    $projectLink = "";
    $categories;
    $featuredChecked = "";
    $webChecked = "";
    $mobileChecked = "";
    $gameChecked = "";
    $softwareChecked = "";
    $otherChecked = "";
    $startDate = "";
    $endDate = "";
    $tools = "";
    $imgurls = array("");
    $description = "";

    $editing = false;
    $removing = false;

    $testid = '';

    //check if is edit or new project
    if(isset($_POST['project_id']) && !$removing){
        $projectID = $_POST['project_id'];
        $editing = true;
    }else if(!$removing){
        $projectID = -1;
    }

    //check if is processing submitted form
    if(isset($_POST['process_project'])){
        processProject();
    }

    //check to remove project
    if(isset($_POST['remove_project'])){
        $removing = true;
        $projectID = $_POST['project_id'];
        $projectName = $_POST['project_name'];
    }

    //Remove project after confirming removal
    if(isset($_POST['project_removing'])){
        removeProject($_POST['project_id']);
        gotoPage(gotoPage(getSiteURL()."/portfolio/"));
    }

    //Page information based on whether or not it's edit or creation
    $title = "Update";
    if($projectID == -1 && !$removing){
        $title = "Creation";
    }

    if($editing){
        setUpEdit();
    }

    function setUpEdit(){
        global $projectID;
        global $projectName;
        global $projectLink;
        global $categories;
        global $featuredChecked;
        global $webChecked;
        global $mobileChecked ;
        global $gameChecked;
        global $softwareChecked;
        global $otherChecked;
        global $startDate;
        global $endDate;
        global $tools;
        global $imgurls;
        global $description;

        global $db;

        $query = $db->prepare("SELECT * FROM projects WHERE id = ?");
        $query->execute(array($projectID));
        $values = $query->fetch();

        $query = $db->prepare("SELECT url FROM projectimages WHERE id = ?");
        $query->execute(array($projectID));
        $images = $query->fetch();

        $projectName = $values["name"];
        $projectLink = $values["link"];
        $categories = $values["categories"];

        if(strpos($categories, "Featured") !== false){
            $featuredChecked = "checked";
        }
        if(strpos($categories, "Web") !== false){
            $webChecked = "checked";
        }
        if(strpos($categories, "Mobile") !== false){
            $mobileChecked = "checked";
        }
        if(strpos($categories, "Game") !== false){
            $gameChecked = "checked";
        }
        if(strpos($categories, "Software") !== false){
            $softwareChecked = "checked";
        }
        if(strpos($categories, "Other") !== false){
            $otherChecked = "checked";
        }

        $startDate = $values["startDate"];
        $endDate = $values["endDate"];
        $tools = $values["tools"];

        $imgurls = $images;

        $description = $values["details"];
    }

    function processProject(){
        global $error_message;
        consoleOut("PROCESS");
        $missing = checkMissing();

        if(!empty($missing)){
            $error_message = "MISSING: ".$missing;
        }else{
            addProject();
        }

    }
    //Check if anything is missing before adding project
    function checkMissing(){
        global $projectName;
        global $projectLink;
        global $categories;
        global $featuredChecked;
        global $webChecked;
        global $mobileChecked ;
        global $gameChecked;
        global $softwareChecked;
        global $otherChecked;
        global $startDate;
        global $endDate;
        global $tools;
        global $imgurls;
        global $description;
        $result = "";

        if(isset($_POST['project_name']) && !empty($_POST['project_name'])){
            $projectName = $_POST['project_name'];
        }else{
            $result .= "Project Name, ";
        }

        if(isset($_POST['project_link']) && !empty($_POST['project_link'])){
            $projectLink = $_POST['project_link'];
        }

        foreach($_POST as $key => $value){
            if (strpos($key, 'cat_') !== false) {
                if(strpos($key, 'featured')){
                    if(!empty($categories)) $categories .= ", ";
                    $categories .= "Featured";
                    $featuredChecked = "checked";

                }
                if(strpos($key, 'web')){
                    if(!empty($categories)) $categories .= ", ";
                    $categories .= "Web";
                    $webChecked = "checked";
                }
                if(strpos($key, 'mobile')){
                    if(!empty($categories)) $categories .= ", ";
                    $categories .= "Mobile";
                    $mobileChecked = "checked";
                }
                if(strpos($key, 'game')){
                    if(!empty($categories)) $categories .= ", ";
                    $categories .= "Game";
                    $gameChecked = "checked";
                }
                if(strpos($key, 'software')){
                    if(!empty($categories)) $categories .= ", ";
                    $categories .= "Software";
                    $softwareChecked = "checked";
                }
                if(strpos($key, 'other')){
                    if(!empty($categories)) $categories .= ", ";
                    $categories .= "Other";
                    $otherChecked = "checked";
                }
            }
        }
        if(empty($categories)){
            $result .= "No Category(s) selected, ";
        }

        if(isset($_POST['start_date']) && !empty($_POST['start_date'])){
            $startDate = $_POST['start_date'];
        }else{
            $result .= "Starting Date, ";
        }

        if(isset($_POST['end_date']) && !empty($_POST['end_date'])){
            $endDate = $_POST['end_date'];
        }else{
            $result .= "Ending Date, ";
        }

        if(isset($_POST['tools']) && !empty($_POST['tools'])){
            $tools = $_POST['tools'];
        }else{
            $result .= "Tools ";
        }

        if(isset($_POST['img1']) && !empty($_POST['img1'])){
            $imgurls[0] = $_POST['img1'];
        }else{
            $result .= "Primary Image URL, ";
        }

        if(isset($_POST['image_num'])){
            for($i = 1; $i < $_POST['image_num']; $i++){
                $num = $i+1;
                if(!empty($_POST["img$num"])){
                    array_push($imgurls, $_POST["img$num"]);
                }
            }
        }

        if(isset($_POST['description']) && !empty($_POST['description'])){
            $description = $_POST['description'];
        }else{
            $result .= "Description, ";

        }
        return $result;
    }

    function addProject(){
        global $projectID;
        global $projectName;
        global $categories;
        global $startDate;
        global $endDate;
        global $tools;
        global $imgurls;
        global $description;
        global $error_message;
        global $editing;
        global $projectLink;

        global $db;



        if($editing){

            //If a project is being edited, delete the project entries with same id
            //Make SQL statement insert ID

            removeProject($projectID);

            $insert = $db->prepare("INSERT INTO projects
                (id, name, link, categories, startDate, endDate, tools, details)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $values = array($projectID, $projectName, $projectLink, $categories, $startDate, $endDate, $tools, $description);
        }else{
            $checkExists = $db->prepare("SELECT id FROM projects WHERE name = ?;");
            $checkExists->execute(array($projectName));
            $exists = $checkExists->fetch();
            $insert = $db->prepare("INSERT INTO projects
                (name, link, categories, startDate, endDate, tools, details)
                VALUES(?, ?, ?, ?, ?, ?, ?)");
            $values = array($projectName, $projectLink, $categories, $startDate, $endDate, $tools, $description);

        }

        if(!empty($exists)){
            $error_message = "PROJECT ALREADY EXISTS";
        }else{
            $insert->execute($values);
            $queryID = $db->prepare("SELECT id FROM projects WHERE name = ? AND link = ? AND categories = ? AND startDate = ? AND endDate = ? AND tools = ? AND details = ?;");
            $values = array($projectName, $projectLink, $categories, $startDate, $endDate, $tools, $description);
            $queryID->execute($values);
            $imgid = $queryID->fetch();

            for($i = 0; $i < count($imgurls); $i++){
                $imgadd = $db->prepare("INSERT INTO projectimages (id, url) VALUES(?, ?)");
                $imgadd->execute(array($imgid[0], $imgurls[$i]));
            }
        }
    }

    function removeProject($projectID){
        global $db;

        $removeProj = $db->prepare("DELETE FROM projects WHERE id = ?");
        $removeProj = $removeProj->execute(array($projectID));

        $removeImg = $db->prepare("DELETE FROM projectimages WHERE id = ?");
        $removeImg = $removeImg->execute(array($projectID));


    }

?>




<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            font-family: helvetica;
        }
    </style>
</head>
<body>
    <?php if($removing){ ?>
        <h1>Remove Project</h1>
        <h3 style="color: red;">Are you sure you want to remove <?php echo $projectName ?>?</h3>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="project_removing" value="removed"/>
            <input type="hidden" name="project_id" value="<?php echo $projectID; ?>"/>
            <input type="submit" value="REMOVE"/>
        </form>
    <?php }else{ ?>
    <style>
        input{
            margin: 10px;
        }
        input[type="checkbox"]{
            margin: 5px;
        }
    </style>
    <h1>Project <?php echo $title; ?> Page</h1>
    <h3 style="color: red;"><?php echo $error_message; ?></h3>
    <form id="entryform" name="projectform" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="process_project" value="1" />
        <?php if($editing){ ?>
            <input name="project_id" type="hidden" value= "<?php echo $projectID ?>" />
        <?php } ?>
        Project Name:  <input name="project_name" type="text" value="<?php echo $projectName ?>" /> <br />
        Project Link:  <input name="project_link" type="text" value="<?php echo $projectLink ?>" /> <br />
        Project Categories:
        <div style = "margin-left: 20px;">
            <label><input type="checkbox" name="cat_featured" value="featured" <?php echo $featuredChecked; ?>> Featured</label> <br />
            <label><input type="checkbox" name="cat_web" value="web" <?php echo $webChecked; ?>> Web</label> <br />
            <label><input type="checkbox" name="cat_mobile" value="mobile" <?php echo $mobileChecked; ?>> Mobile</label> <br />
            <label><input type="checkbox" name="cat_game" value="game" <?php echo $gameChecked; ?>> Game</label> <br />
            <label><input type="checkbox" name="cat_software" value="software" <?php echo $softwareChecked; ?>> Software</label> <br />
            <label><input type="checkbox" name="cat_other" value="other" <?php echo $otherChecked; ?>> Other</label> <br />
        </div>
        Project Start Date: <input type="text" name="start_date" value="<?php echo $startDate; ?>" /> ( YYYY-MM-DD) <br />
        Project End Date: <input type="text" name="end_date" value="<?php echo $endDate; ?>" /> ( YYYY-MM-DD <i>or</i> "current" ) <br />
        Tools Used: <input type="text" name="tools" value="<?php echo $tools; ?>" /> <br />
        Image URLs: <br />
        <input class="imageurlbox" type="text" name="img1" value='<?php echo $imgurls[0]; ?>' /> <br />
        <input type="button" id="addImageButton" value ="Add Image..."/> <br />
        <input id="imageNum" type="hidden" name="image_num" value="1" />
        <?php for($i = 1; $i < count($imgurls); $i++){?>/
                    <script>addImage(document.querySelector("#addImageButton"), "<?php echo $imgurls[$i] ?>")</script>
            <?php } ?>
        Description (HTML Applicable): <br />
        <textarea name="description"><?php echo $description ?></textarea> </br>

        <input type="submit" value="Submit"/>
    </form>
    <script>
        let button = document.querySelector("#addImageButton");
        button.addEventListener("click", function(){
            addImage(button);
        });
    </script>
    <?php } ?>
</body>
</html>
