<?php

session_start();
if(isset($_SESSION["username"])){

    echo"welcome".$_SESSION["username"]."<br>";
    echo"your  fav color is".$_SESSION["color"];

}

else{
    echo"please log in you logout";
}

?>
