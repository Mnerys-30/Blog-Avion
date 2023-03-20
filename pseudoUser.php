<?php



if(!empty($_SESSION['user'])){
    echo $_SESSION['user']['pseudo'].' est connecté.';
}
else {
    echo 'Bonjour! Bienvenue!';
}

//session_start();