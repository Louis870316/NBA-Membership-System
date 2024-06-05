<?php

require_once('function/helper.php');
require_once('function/connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$process = isset($_GET['process']) ? $_GET['process'] : false;

if (!isset($_SESSION['id'])) {
    header("location: " . BASE_URL);
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : false;

try {
    $stmt = $connect->prepare("SELECT * FROM nba WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $nba = $stmt->fetch();
} catch (PDOException $e) {
    die("查询失败: " . $e->getMessage());
}

$error = isset($_GET['emptyform']) ? $_GET['emptyform'] : false;

?>

<?php if ($error == 'true') : ?>
  <div class="alert alert-danger" role="alert">
    Proses
  </div>
<?php endif; ?>

<div class="row">
  <h1 style="text-align: center; color: #185ADB;">Form Edit</h1>
</div>
<form method="POST" action="<?= BASE_URL . 'process/process_edit.php' ?>">
  <input type="hidden" name="id" value="<?= htmlspecialchars($nba['id'], ENT_QUOTES, 'UTF-8') ?>">
  <div class="mb-3">
    <label for="player" class="form-label">Player</label>
    <input type="text" class="form-control" id="player" name="player" value="<?= htmlspecialchars($nba['player'], ENT_QUOTES, 'UTF-8') ?>">
  </div>
   <div class="mb-3">
    <label for="team" class="form-label">Team</label>
    <input type="text" class="form-control" id="team" name="team" value="<?= htmlspecialchars($nba['team'], ENT_QUOTES, 'UTF-8') ?>">
  </div>
   <div class="mb-3">
    <label for="position" class="form-label">Position</label>
    <input type="text" class="form-control" id="position" name="position" value="<?= htmlspecialchars($nba['position'], ENT_QUOTES, 'UTF-8') ?>">
  </div>
  <div class="mb-3">
    <label for="height" class="form-label">Height</label>
    <input type="number" class="form-control" id="height" name="height" value="<?= htmlspecialchars($nba['height'], ENT_QUOTES, 'UTF-8') ?>">
  </div>
  <div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <input type="text" class="form-control" id="country" name="country" value="<?= htmlspecialchars($nba['country'], ENT_QUOTES, 'UTF-8') ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
