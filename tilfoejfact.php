<?php
ob_start(); // den eneste måde, som man kan fikse header funktionen på 
include("header.php");
?>
<div class="factindhold">
<?php
if(!isset($_SESSION["loggedin"])){
    header("Location: index.php");
    exit();
    // ! = ikke 
    // hvis deres login ikke har en værdi, så sendes de tilbage til forsiden og alt indhold bliver slettet med exit 
}
if(isset($_GET["slet"])) {
    mysqli_query($link, "DELETE FROM facts WHERE id = '{$_GET["slet"]}'");
    // denne funktion sletter facten og viser derved Delete i CRUD 
    echo "<div class=\"message\">Fact deleted</div>";
}
if(isset($_GET["rediger"])) {
    $hentFact = mysqli_query($link, "SELECT * FROM facts WHERE id = '{$_GET["rediger"]}'");
    while($fact = mysqli_fetch_array($hentFact)) {
        ?>
    <form action="?edit=<?=$fact["id"]?>" method="post" class="form">
        <input type="text" name="text" value="<?=$fact["text"]?>"><br>
        <input type="submit" name="opret" value="Edit Fact">
    </form>
    <?php
        
    }
} 
if(isset($_GET["edit"])) {
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING) or die("Invalid text");
    mysqli_query($link, "UPDATE facts SET text='$text' WHERE id = '{$_GET["edit"]}'");
    echo "<div class=\"message\">Fact edited</div>";
}

if(isset($_GET["opret"])) {
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING) or die("Invalid text");
    mysqli_query($link, "INSERT INTO `facts` (`text`) VALUES ('$text')");
    echo "<div class=\"message\">Fact created</div>";
}
    if(isset($_GET["logud"])) {
        session_unset();
        session_destroy();
        header("Location: factlogin.php");
        exit();
    }
?>
    <div class="factlist">
        <h1>Fact list</h1>
<?php
    $hentFacts = mysqli_query($link, "SELECT * FROM facts");
    while($fact = mysqli_fetch_array($hentFacts)) {
?>
    
    
    
    <div class="fact">
        <?=substr($fact["text"], 0, 10)?>..
        <div class="factbuttons">
            <a href="?rediger=<?=$fact["id"]?>"><i class="fa fa-pencil"></i></a>
            <a href="?slet=<?=$fact["id"]?>"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    
    
    
    <?php
    }
?>
    </div>
<?php
if(isset($_GET["rediger"])){
    
} else {
?>
    <form action="?opret=1" method="post" class="form">
        <input type="text" name="text" placeholder="Fact text"><br>
        <input type="submit" name="opret" value="Create Fact">
    </form>
    <a href="?logud">Log out</a>
<?php
}
?>
</div>
<?php
include("footer.php");
?>