<?php

require_once('function/connect.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;

?>


<?php 
try {
    $stmt = $connect->query("SELECT * FROM nba");
    $nba = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Player</th>
      <th scope="col">Team</th>
      <th scope="col">Position</th>
      <th scope="col">Height</th>
      <th scope="col">Country</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1 ?>
    <?php foreach ($nba as $p) : ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><?= htmlspecialchars($p['player'], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?= htmlspecialchars($p['team'], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?= htmlspecialchars($p['position'], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?= htmlspecialchars($p['height'], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?= htmlspecialchars($p['country'], ENT_QUOTES, 'UTF-8') ?></td>
      <td>
        <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>">Delete</a>
        <a class="btn btn-info badge" href="<?= BASE_URL . 'dashboard.php?page=edit&id=' . $p['id'] ?>">Edit</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
