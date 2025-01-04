<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OpenIT Signup Form</title>
  <link rel="stylesheet" href="style/inscription.css">
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="images/Open (1).png" alt="OpenIT Logo">
    </div>
    <form class="signup-form" action="process_signup.php" method="POST">
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <input type="password" name="confirm_password" placeholder="Confirmation du mot de passe" required>
      <div class="consent">
        <input type="checkbox" id="consent" required>
        <label for="consent">
          En soumettant ce formulaire, je consens au traitement des informations saisies afin de m'envoyer la
          newsletter.
        </label>
      </div>
      <button type="submit">S'inscrire</button>
    </form>
  </div>
</body>
<script>
  document.querySelector('.signup-form').addEventListener('submit', function (event) {
    const password = document.querySelector('input[name="password"]').value;
    const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

    if (password !== confirmPassword) {
      event.preventDefault();
      alert("Les mots de passe ne correspondent pas !");
    }
  });
</script>

</html>