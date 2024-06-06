<?php 
require_once('./function/helper.php');

$process = isset($_GET['process']) ? $_GET['process'] : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#707038" fill-opacity="1" d="M0,192L60,192C120,192,240,192,360,208C480,224,600,256,720,261.3C840,267,960,245,1080,218.7C1200,192,1320,160,1380,144L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>

    <div class="content">
        <div class="card-login">
            <div class="card-main">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <?php if ($process == 'successregister') : ?>
                    <div class="alert alert-success" style="background-color: green; padding: 1em; color: white; border-radius: 20px;"> 
                      Registration successful! Please log in.
                  </div>
                  <?php endif; ?>
                    <form class="form-login" method="POST" action="<?=  base_url('process/process_login.php')?>">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-input" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input" required>
                        <button type="submit" class="btn btn-login">Login</button>
                    </form>
                    <p style="text-align: center;">Not registered?<span><a href="<?=  base_url('register.php')?>" class=""> Create an Account.</a></span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>