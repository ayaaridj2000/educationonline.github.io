<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- Include CSS File Here -->
<link rel="stylesheet" href="MyCSS/LoginStyle.css"/>


<!-- Include JS File Here -->
<script src="MyJS/jquery-3.5.1.min.js"></script>
<script src="MyJS/bootstrap.min.js"></script>
<script src="MyJS/Login.js"></script> 
</head>
<body>
 
  <?php
 require('config.php');
 session_start();
 
 if (isset($_POST["loginForm"])) {
 //if (isset($_POST['btnLogin'])){
 if (isset($_POST['username'])){
   $username = stripslashes($_REQUEST['username']);
   $username = mysqli_real_escape_string($conn, $username);
   $password = stripslashes($_REQUEST['password']);
   $password = mysqli_real_escape_string($conn, $password);
     $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
   $result = mysqli_query($conn,$query) or die(mysqli_error(header("Location:login.php")));
   $rows = mysqli_num_rows($result);
   if($rows==1){
       $_SESSION['username'] = $username;
       header("Location: index.php");
   }else{
     $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
   }
 }
}
if (isset($_POST["signForm"])) {
//if (isset($_POST['btnSignUP'])){
  if (isset($_REQUEST['username1'], $_REQUEST['email1'], $_REQUEST['password1'])){
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $username1 = stripslashes($_REQUEST['username1']);
    $username1 = mysqli_real_escape_string($conn, $username1); 
    // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $email1 = stripslashes($_REQUEST['email1']);
    $email1 = mysqli_real_escape_string($conn, $email1);
    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    $password1 = stripslashes($_REQUEST['password1']);
    $password1 = mysqli_real_escape_string($conn, $password1);
    //requéte SQL + mot de passe crypté
      $query1 = "INSERT into `users` (username, email, password)
                VALUES ('$username1', '$email1', '$password1')" ;
    // Exécute la requête sur la base de données
      $res = mysqli_query($conn, $query1);
      if($res){
        echo"<script>alert('Vous êtes inscrit avec succès');</script>"; 
        //  echo "<div class='sucess'>
        //        <h3>Vous êtes inscrit avec succès.</h3>
        //        <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
        //  </div>";
      }else{
        echo"<script>alert('Vous êtes failed.');</script>"; 
        // echo "<div class='sucess'>
        // <h3>Vous êtes failed.</h3>
        // </div>";
      }
  }  
}

  ?>

<div class="login-signup l-attop" id="login">
<form class="box" action="" method="post" name="login">
<input type="hidden" name="loginForm" />
    <div class="login-signup-title">
      LOG IN
    </div>
    <div class="login-signup-content">
      <div class="input-name">
        <h2>Username</h2>
      </div>
      <input type="text" name="username" value="" placeholder="Username" class="field-input" />
      <div class="input-name input-margin">
        <h2>Password</h2>
  
      </div>
      <input type="password" name="password" value="" placeholder="Password" class="field-input" />
      <!-- <div class="input-r">
             <div class="check-input">
               <input type="checkbox" id="remember-me-2" name="rememberme" value="" class="checkme">
               <label class="remmeberme-blue" for="remember-me-2"></label>
             </div>
             <div class="rememberme"><label for="remember-me-2">Remember Me</label></div>
           </div> -->
      <br><br><br>
      <button class="submit-btn" name="btnLogin">
            Enter
          </button>
  
  
      <div class="forgot-pass">
        <a href="#">Forgot Password?</a>
      </div>
  
    </div>
    </form>
  </div>
    
  
<div class="login-signup s-atbottom" id="signup">
  <form class="box" action="" method="post" name="signup">
  <input type="hidden" name="signForm" />
    <div class="login-signup-title">
      SIGN UP
    </div>
    <div class="login-signup-content">
      <div class="input-name">
        <h2>Username</h2>
      </div>
      <input type="text" name="username1" value="" class="field-input" />
      <div class="input-name input-margin">
        <h2>E-Mail</h2>
      </div>
      <input type="text" name="email1" value="" class="field-input" />
      <div class="input-name input-margin">
        <h2>Password</h2>
      </div>
      <input type="password" name="password1" value="" class="field-input" />
  
      <button class="submit-btn" name="btnSignUp">
                Enter
      </button>
    </div>
  </form>
</div>
              
  </body>
</html>