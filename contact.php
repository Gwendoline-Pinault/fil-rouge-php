<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php require_once(__DIR__ . '/header.php'); ?>
  <h1>Contact</h1>
  <form action="submit_contact.php" method="POST" enctype="multipart/form-data" class="container form">
    <div class="form-subcontainer">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
      <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
    </div>
    <div class="form-subcontainer">
      <label for="message" class="form-label">Votre message</label>
      <textarea class="form-control" id="message" name="message" placeholder="Exprimez-vous"></textarea>
    </div>
    <div class="form-subcontainer">
      <div class="flex-row">
        <label for="image" class="form-label">Image</label>
        <p class="form-text">&nbsp; (1Mo max)</p>
      </div>
      <input type="file" class="form-control" id="image" name="image"/>
    </div>
    <button type="submit" class="button">Envoyer</button>
  </form>
</body>
</html>
