<div class="container">
    <div class="row">


        <div class="main">


            <div class="col-xs-6 col-sm-6 col-sm-offset-1" style="color:#8797EF;">

                <h1>Pré-inscription</h1>
                <h2>Renseignements</h2>

                <form name="formulaire" action="submit.php" method="post" >

                    <label for="nom">Nom</label><br/>
                    <input type="text" class="form-control" id="nom" name="nom"><br/><br/>

                    <label for="prenom">Prénom</label><br/>
                    <input type="text" class="form-control" id="prenom" name="prenom"><br/><br/>
                    <span id='missPrenom'></span>
                    
                    <label for="Date de naissance">Date de naissance</label><br/>
                    <input type="Date" class="form-control" id="datenaissance" name = "datenaissance"><br/><br/>

                    <label for="adresse">Adresse</label><br/>
                    <input type="text" class="form-control" id="adresse" name = "adresse"><br/><br/>

                    <label for="code postal">Code Postal</label><br/>
                    <input type="text" class="form-control" id="cpostal" name = "cpostal"><br/><br/>

                    <label for="Ville">Ville</label><br/>
                    <input type="text" class="form-control" id="ville" name ="ville"><br/>

                    <label for="numero de telephone">Numéro de téléphone</label><br/>
                    <input type="tel" class="form-control" id="numtel" name = "numtel"><br/>
                    
                    <label for="email">Adresse Email</label><br/>
                    <input type="email" placeholder="mail@serveur.com" class="form-control" id="email" name = "email"><br/>

                    <p> Sélectionner un ou plusieurs souhaits</p>
                    <label for="joueuse">Joueuse</label>    
                    <input type="checkbox" name="joueuse" id="joueuse" value="joueuse" />
                    <label for="benevole">Bénévole</label>    
                    <input type="checkbox" name="benevole" id="benevole" value="benevole" />
                    <label for="entraineur">Entraîneur</label>    
                    <input type="checkbox" name="entraineur" id="entraineur" value="entraineur" /><br/>
                    <br/><br/>

                    <p>Etes vous licencié(e)? </p><br/>
                    
                    <label for="oui">Oui</label>
                    <input type="radio" name="licencie" value="1" id="oui"/>
                    <label for="non">Non</label>
                    <input type="radio" name="licencie" value="0" id="non" /><br/><br/><br/>

                    <p>Si oui, dans quel club ?</p><br/>


                    <label for="club">Club</label><br/>
                    <input type="text" class="form-control" id="club" name = "club"><br/>

                    <button type="submit" class="btn btn-primary" value = "Envoyer">Envoyer</button>
                </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>
