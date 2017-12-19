<?php
session_start();
include("dbcon.php");
include("functions.php");
$filNavn = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Madrid in heights</title> 
    <link rel="shortcut icon" href="">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/simplegrids.css" type="text/css" rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
     <!-- jQuery library (served from Google) -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="lib/jquery.bxslider.css" rel="stylesheet" />

    <script src="js/slider.js" type="text/javascript"></script>
    
    </head>
    <body>
        
    <div class="navigation">
    <div class="container menuPlacering">
        <a href="index.php" class="logolink"><div class="hey"><img src="img/logo_madrid.png"></div></a>
        <ul class="menu">
            <li><a href="culture.php"<?php if($filNavn == "culture.php"){ echo " class=\"active\""; } ?>><b>Explore</b>culture</a></li>
            <li><a href="hybrid.php"<?php if($filNavn == "hybrid.php"){ echo " class=\"active\""; } ?>><b>Explore</b>hybrid</a></li>
            <li><a href="leisure.php"<?php if($filNavn == "leisure.php"){ echo " class=\"active\""; } ?>><b>Explore</b>leisure</a></li>
            <li>
                <a class="map" href="map.php" <?php if($filNavn == "map.php"){ echo " class=\"active\""; } ?>>
                        &nbsp;<i class="fa fa-map-pin" aria-hidden="true"></i>&nbsp;
                </a>
            </li>
        </ul> <br>

        <ul class="menuMobil" style="display: none;">
               <li><a href="culture.php"<?php if($filNavn == "culture.php"){ echo " class=\"active\""; } ?>><b>Explore</b>culture</a></li>
            <li><a href="hybrid.php"<?php if($filNavn == "hybrid.php"){ echo " class=\"active\""; } ?>><b>Explore</b>hybrid</a></li>
            <li><a href="leisure.php"<?php if($filNavn == "leisure.php"){ echo " class=\"active\""; } ?>><b>Explore</b>leisure</a></li>
            <li>
                <a href="map.php"<?php if($filNavn == "map.php"){ echo " class=\"active\""; } ?>>
                    <i class="fa fa-map-pin" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
        <button class="menuMobilKnap"></button>
    </div>
</div>
<div class="factbox">
    <div class="facttext">
        <div>FACT</div>
    </div>
    <div class="thefact">
        <div><?=hentFacts($link)?></div>
    </div>
</div>