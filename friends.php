<?php
$benjcolor = "#B600F2";
$soboycolor = "#00C400";
if(isset($_GET["benj"])){
    if($_GET["benj"] == "yup"){?>
        <div class="navpage" id="benj" style="left: calc(100% - 150px - 60px - 3em - 60px - 3.5em - 60px - 2em - 60px - 2em - 60px - 1.5em);"><a href="/benj/yourewelcome/">Benj</a></div>
        <style>
            #benj{
                color: <?php echo $benjcolor; ?>;
            }
            #navlogotext{
                color: <?php echo $benjcolor; ?>;
            }
            #welcome{
                color: <?php echo $benjcolor; ?>;
            }
            #welcomeexclaim{
                color: <?php echo $benjcolor; ?>;
            }
        </style>
        <?php
    }
}
if(isset($_GET["soboy"])){
    if($_GET["soboy"] == "yup"){?>
        <div class="navpage" id="soboy" style="left: calc(100% - 150px - 60px - 3em - 60px - 3.5em - 60px - 2em - 60px - 2em - 60px - 2em);"><a href="/soboy/nerd/">Soboy</a></div>
        <style>
            #soboy{
                color: <?php echo $soboycolor; ?>;
            }
            #navlogotext{
                color: <?php echo $soboycolor; ?>;
            }
            #welcome{
                color: <?php echo $soboycolor; ?>;
            }
            #welcomeexclaim{
                color: <?php echo $soboycolor; ?>;
            }
        </style>
    <?php
    }
}
?>
