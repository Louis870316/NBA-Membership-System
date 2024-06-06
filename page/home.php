<?php
require_once('function/Connector.php');
require_once('function/helper.php');

$host = 'localhost';
$db = 'login';
$user = 'root';
$pass = '';

$connector = new Connector($host, $db, $user, $pass);
$conn = $connector->getConnection();

try {
    $stmt = $conn->query("SELECT * FROM nba");
    $players = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<div class="content">
    <div class="container">
         <div class="sub-content mt-5 text-center">
            <h1>Player List</h1>
            <table class="table" style="transform: scale(0.9); transform-origin: top center;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Player</th>
                        <th>Team</th>
                        <th>Position</th>
                        <th>Height</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($players) > 0): ?>
                        <?php $counter = 1; ?>
                        <?php foreach ($players as $player): ?>
                            <tr>
                                <td><?= $counter++ ?></td>
                                <td><?= htmlspecialchars($player['player'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($player['team'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($player['position'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($player['height'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($player['country'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <a href="process/process_delete.php?id=<?= $player['id'] ?>" class="btn btn-danger">Delete</a>
                                    <a href="dashboard.php?page=edit&id=<?= $player['id'] ?>" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No players found ->
                            <button  class="btn" style="background: #B9B973;"><a style=" text-decoration: none; color:inherit;" href="<?= BASE_URL . 'dashboard.php?page=create' ?>">add player</a></button>
                            </td>
                            
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
