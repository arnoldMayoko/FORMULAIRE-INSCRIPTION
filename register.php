    <?php
        require_once "composants/nav.php"; //J'inclu ma na-bare
        require_once "inc/data_base.php"; //j'inclu ma connexion à la base de donnéé
        if(isset($_POST['form_inscription']))
        {
                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $mdp1 = htmlspecialchars($_POST['mdp1']);
                    $email = htmlspecialchars( $_POST['email']);
                    $portable = htmlspecialchars($_POST['portable']) ;
                    $mdp2 =htmlspecialchars( $_POST['mdp2']);


                    $requete = $data_base ->prepare("INSERT INTO user_registration(nom_user, prenom_user, email_user, portable_user, mdp_user, date_inscription) VALUES (:nom_user,:prenom_user,:mail_user,:portable_user,:mdp_user, NOW())");
                    $requete->bindParam( "nom_user", $_POST['nom'], PDO::PARAM_STR);
                    $requete->bindParam( "prenom_user", $_POST['prenom'], PDO::PARAM_STR);
                    $requete->bindParam( "email_user", $_POST['email'], PDO::PARAM_STR);
                    $requete->bindParam( "portable_user", $_POST['portable'], PDO::PARAM_STR);
                    $requete->bindParam( "mdp_user", $_POST['mdp1'], PDO::PARAM_STR);
                $requete->execute();
              

        }
         
    ?>
       
    <div class="registration_main">
   
        <div class="form_group">
        <div class="erreur_global">
    <p><?php
    if(isset($erreur)){
        echo" $erreur";
    }
    
   ?></p>
    </div>
    <div class="h1">
    <h1> <center> Créer un compte</center></h1>
    </div>
       
        <form action="" method="POST" class="form_registration" id="forme_registration">
            <div class="user_infos-group">
    <div class="main_user_infos_1">
        <label for="text">Nom</label>
        <input type="text"class="" id="nom" placeholder="votre nom" name="nom" class="nom" value="<?php echo @$nom ?>">
        <span class="erreur_nom" id="erreur_nom"> <?php  echo @$erreur_nom?> </span>
        <label for="">Prenom</label>
        <input type="text"class="" id="prenom" placeholder="votre prenom" name="prenom" value="<?php echo @$prenom ?>">
        <span class="erreur_prenom" id="erreur_prenom"> <?php  echo @$erreur_prenom?></span>
        <label for="">Mot de passe</label>
        <input type="password"class="" id="mdp_1" placeholder="créer un mot de passe" name="mdp1" value="<?php echo @$mdp1 ?>">
        <span class="erreur_mdp" id="erreur_mdp"> <?php echo @$erreur_mdp1?></span>
    </div>

    <div class="main_user_infos_2">
        <label for="">E-mail</label>
        <input type="text"class="" id="email" placeholder="Exemple@gmail.com" name="email" value="<?php echo @$email ?>">
        <span class="erreur_email" id="erreur_email"><?php  echo @$erreur_email?></span>
        <label for="">Portable</label>
        <input type="text"class="" id="portable" placeholder="06 xx xx xx xx" name="portable" value="<?php echo @$portable ?>">
        <span class="erreur_portable" id="erreur_portable"><?php  echo @$erreur_portable?></span>
        <label for="">Confirmer mot de passe</label>
        <input type="password"class="" id="mdp_2" placeholder="confirmer mot de passe" name="mdp2"value="<?php echo @$mdp2 ?>">
        <span class="erreur_mdp2" id="erreur_mdp2"><?php  echo @$erreur_mdp2?></span>

    </div>

    </div>

 
        <div class="problem">

            <div class="mdp_oublie"> <a href=""> Mot de passe oublié ?</a>
        <div class="line_mdp_oublie"></div>
        </div>



    <div class="deja_inscrit"> <a href="">Déjà inscrit ?</a>
    <div class="line_deja_inscrit"></div>
    </div>
    
    </div>
    <input type="submit"" class="btn_register" name="form_inscription" value="Valider"></input>
  
        </form>

        </div>

    
    </div>
