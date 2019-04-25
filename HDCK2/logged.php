<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<div class="container">
<?php
    if (userExists($_POST['username'],$conn)==True) {
            if (checkPassword($_POST['username'], $_POST['password'],$conn)==True) {
                if (checkGroupe($_POST['username'],$conn)==1) {
                    echo "<script>location.href='index.php?page=administrateur';</script>";
                }elseif (checkGroupe($_POST['username'],$conn)==2) {
                     echo "<script>location.href='index.php?page=lesnews';</script>";
                }
            }else{
                echo '<div style="Margin-left:50px; color: #ffc107;">ERREUR: Mot de passe incorrect <br><a href="index.php?page=login">Réessayer</a></div>';
            }              
    }else{
        echo '<div style="Margin-left:50px; color: #ffc107;">ERREUR: Identifiant incorrect <br><a href="index.php?page=login">Réessayer</a></div>'; 
    }    
?>
</div>