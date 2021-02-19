<?php 
include 'function.php'; 

cabezera();
?>

<?php 
if(isset($_SESSION['rol'])){
    menu($_SESSION['rol']);
}else{
    menu('default');
}


?>

