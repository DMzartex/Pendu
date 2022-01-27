<?php 
session_start();

/* functions */

/* elements */
require 'elements/header.php';

?>
<?php if(empty($_SESSION['mot'])): ?>
    
<form action="index.php" method="post">

</form>

<?php else: ?>


<?php endif; ?>