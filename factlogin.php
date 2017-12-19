<?php
ob_start();
include("header.php");
?>
<div class="factlogin">
<?php
// $kode = password_hash("superfedside12", PASSWORD_DEFAULT);
  //  echo $kode;

$pw = '$2y$10$ewi0M.F3lQbYikpZ.VTZ1eAxSw2/B2iNJwzNTBTGRVJ9WDpQeqB8K';
// dette er den krypteret kode fra linje 2 vha. password default hash 
if(isset($_GET["login"])){
    $password = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING) or die("invalid password");
    // dette henter værdien af textboksen pw og validerer passwordet
    if(password_verify($password, $pw)){
        $_SESSION["loggedin"] = 1;
        header("Location: tilfoejfact.php");
        exit();
    } else {
        echo "<div class=\"message wrong\">Wrong password</div>";
    }
}
?>
    <form action="?login=1" method="post" class="form">    
        <input type="password" name="pw" placeholder="Password">
        <input type="submit" name="button" value="Login">
    </form>
</div>
<?php
include("footer.php");
?>