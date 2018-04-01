<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 30/03/2018
 * Time: 12:41
 */
include "header.php";
?>
<div class="container">
    <form class="form-signin" action="/chat/user/loginpost/" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <?php
                if(isset($args['message'])){
                   echo "<div class=\"alert alert-danger\" role=\"alert\">".$args["message"]."</div>";
               }

            ?>

        </div>
        <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur" required
               autofocus>
        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>

        <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        <p>Pas encore membre ?</p>
        <div><a href="/chat/user/register/" class="btn btn-lg btn-info btn-block ">Inscrivez-vous maintenant !</a></div>
    </form>
</div>

<?php include 'footer.php'; ?>