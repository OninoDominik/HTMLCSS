
<div class="container">
  <nav class="navbar navbar-expand-md text-warning" style='background-color:#1C1A1B'>
  <a class="navbar-brand" href="index.php?page=accueil"><img src="HBCK2.jpg" id="imgHBCKLogo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-warning " href="index.php?page=Historique">Historique<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-warning " href="index.php?page=lesmatch">Match<span class="sr-only"></span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link text-warning " href="index.php?page=lesNews">News<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="index.php?page=partenaire">Partenaire</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Equipe
        </a>
        <div class="dropdown-menu text-warning" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=1">Baby 7ans</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=2">M9</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=3">M11</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=4">M13</a>
          <div class="dropdown-divider text-danger"></div>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=5">M15 départemental</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=6">M15 regional</a>
           <div class="dropdown-divider"></div>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=7">M18 régional</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=8">M18 national</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=9">Senior départemental</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=10">Senior pré-national</a>
          <a class="dropdown-item text-warning" href="index.php?page=equipe&id=11">Senior national 1</a>

        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contact
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-warning" href="index.php?page=adresse">Adresse</a>
          <a class="dropdown-item text-warning" href="index.php?page=formulaire">Formulaire de pre-inscription</a>
        </div>
      </li>
      <li class="nav-item text-warning">
        <a class="nav-link disabled" href="#">
          <?php if (isset( $_COOKIE["hbck"]))
  {if ($_COOKIE["hbck"]==1) {
echo 'Administrateur';
}
if ($_COOKIE["hbck"]==2)
{
echo 'Rédacteur';
}
}  ?></a>
      </li>
    </ul>
<div>
   <a href="index.php?page=login" style='max-width:40px;'><div class="glyphicon glyphicon-log-in" > Login</div></a>
</div>
  </div>
</nav>
</div>
 
