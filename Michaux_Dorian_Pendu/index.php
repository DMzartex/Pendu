<?php 
session_start();
$title = "Pendu 5TTI";
/* functions */

require 'functions/motMasque.php';
require 'functions/evoMasque.php';

/* elements */
require 'elements/header.php';

/* Quand je clic sur le bouton */

if(!empty($_POST['mot'])){
    $_SESSION['mot'] = $_POST['mot'];
    $_SESSION['reload'] = 1;
    if($_SESSION['reload'] == 1){
        $_SESSION['motMasque'] = motMasque($_SESSION['mot']);
        $_SESSION['reload'] = 2;
    }
}



if(!empty($_POST['lettre'])){
    $_SESSION['lettre'] = $_POST['lettre'];
}else{
    $_SESSION['lettre'] = "";
}

?>


<?php if(empty($_SESSION['mot'])): ?>
    
    <form action="index.php" method="post">
        <input type="text" placeholder="Entrer votre mot :" name="mot" id="mot">
        <input type="submit" value="Envoyer">
    </form>


<?php else: ?>

    <form action="index.php" method="post">
        <input type="text" placeholder="Entrer une lettre :" name="lettre" id="lettre">
        <input type="submit" value="Envoyer">
    </form>

    <?php 
        var_dump($_SESSION['mot']);
        var_dump($_SESSION['lettre']);
        var_dump($_SESSION['reload']);
        evoMasque($_SESSION['lettre'], $_SESSION['mot'], $_SESSION['motMasque']);
        echo $_SESSION['motMasque'];
    ?>



<?php endif; ?>