<?php

$process = isset($_GET['process']) ? ($_GET['process']) : false;

?>

<?php if ($process == 'failed') : ?>
  <div class="alert alert-danger" role="alert">
  Please enter valid content, the content cannot be empty !
</div>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL . 'process/process_add.php' ?>">
  <div class="mb-3">
    <label for="player" class="form-label">Player</label>
    <input type="text" class="form-control" id="player" name="player">
  </div>
  <div class="mb-3">
    <label for="team" class="form-label">Team</label>
    <input type="text" class="form-control" id="team" name="team">
  </div>
  <div class="mb-3">
    <label for="position" class="form-label">Position</label>
    <input type="text" class="form-control" id="position" name="position">
  </div>
  <div class="mb-3">
    <label for="height" class="form-label">Height</label>
    <input type="number" class="form-control" id="height" name="height">
  </div>
   <div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <input type="text" class="form-control" id="country" name="country">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>