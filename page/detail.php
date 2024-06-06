<?php
require_once 'function/Connector.php';
require_once 'function/Account.php';
require_once 'function/helper.php';


$host = 'localhost';
$db = 'login';
$user = 'root';
$pass = '';

$connector = new Connector($host, $db, $user, $pass);
$account = new Account($connector);

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    die("No ID provided.");
}

try {
    $player = $account->getPlayerById($id);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Player Detail</title>
  </head>
  <body style="background: #E8E8D0;">
    <div class="container text-center">
      <h1 class="text-center" style="color: #5B5B5B;">Player Detail</h1>
      <?php if ($player): ?>
        <p><strong>Player:</strong> <?= htmlspecialchars($player['player'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>Team:</strong> <?= htmlspecialchars($player['team'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>Position:</strong> <?= htmlspecialchars($player['position'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>Height:</strong> <?= htmlspecialchars($player['height'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>Country:</strong> <?= htmlspecialchars($player['country'], ENT_QUOTES, 'UTF-8') ?></p>
      <?php else: ?>
        <p>Player not found.</p>
      <?php endif; ?>
      <a style="background: #B9B973;" href="<?= base_url('dashboard.php?page=home') ?>" class="btn btn-primary">Back to Player List</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
