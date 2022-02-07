<?php 
session_start();
$title = "Pendu 5TTI";
$erreur = null;
$erreurText = "";

/* functions */

require 'functions/motMasque.php';
require 'functions/evoMasque.php';

/* elements */
require 'elements/header.php';



if(!empty($_POST['mot'])){
    $_SESSION['mot'] = strtoupper($_POST['mot']);
    $_SESSION['reload'] = 1;
    if($_SESSION['reload'] == 1){
        $_SESSION['motMasque'] = motMasque($_SESSION['mot']);
        $_SESSION['chances'] = 10;
        $_SESSION['reload'] = 2;
    }
}

if(!empty($_POST['lettre'])){
    if(strlen($_POST['lettre']) == 1){
        $_SESSION['lettre'] = strtoupper($_POST['lettre']);
        $erreur = true;
    }else{
        $erreurText = "Vous ne pouvez entrer qu'une lettre !";
        $erreur = false;
    }
}else{
    $_SESSION['lettre'] = "";
}

if(!empty($_SESSION['chances'])){
    if(!evoMasque($_SESSION['lettre'], $_SESSION['mot'], $_SESSION['motMasque']) && $erreur == true){
         $_SESSION['chances'] = $_SESSION['chances'] - 1;
    }
}
 
?>


<?php if(empty($_SESSION['mot'])): ?>
    
    <form action="index.php" method="post">
        <input type="text" placeholder="Entrer votre mot :" name="mot" id="mot" class="form-control">
        <input type="submit" value="Envoyer" class="btn btn-success btn-lg">
    </form>


<?php else: ?>
    
    <?php if($_SESSION['motMasque'] == $_SESSION['mot']): ?>

        <h1>Bravo, vous avez gagné :) !</h1>

    <?php else: ?>

    <?php if($_SESSION['chances'] != 0): ?>

    <form action="index.php" method="post">
        <input type="text" placeholder="Entrer une lettre :" name="lettre" id="lettre" class="form-control">
        <input type="submit" id="click" name="click" value="Envoyer" class="btn btn-success btn-lg">
    </form>

    <h2>Il vous reste <?=$_SESSION['chances']?> chances</h2>


    <?php 
        evoMasque($_SESSION['lettre'], $_SESSION['mot'], $_SESSION['motMasque']);
    ?>

    <h1><?=$_SESSION['motMasque']?></h1>

    <h4><?=$erreurText?></h4>

    <?php else: ?>
        
        <h1>Vous avez perdu !</h1>
    
    <?php endif; ?>   

    <?php endif; ?>

<?php endif; ?>

<?php require_once 'elements/footer.php'; ?>