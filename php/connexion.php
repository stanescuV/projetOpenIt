<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion OpenIT</title>
  <link rel="stylesheet" href="style/connexion.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="Images/Open (1).png" alt="Logo OpenIT">
    </div>
    <form class="login-form" action="process_login.php" method="POST">
  <input type="email" name="email" placeholder="E-mail" required>
  <input type="password" name="password" placeholder="Mot de passe" required>
  <div class="extra-options">
    <a href="#" class="forgot-password">Mot de passe oublié ?</a>
  </div>
  <button type="submit">Se connecter</button>
  <a href="inscription.php" class="create-account">Créer un compte</a>
</form>
  </div>
</body>
</html>
