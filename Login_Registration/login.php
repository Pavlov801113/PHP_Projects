<?php
require 'header.php';
session_start();
if(isset($_SESSION['user_id'])){
    header('location:index.php');
}

$message = '';
if(isset($_GET['not found'])){
    $message = 'User not found';
} elseif(isset($_GET['wrong_pass'])){
    $message = 'Wrong password';
} elseif(isset($_GET['empty_field'])){
    $message = 'Field must not be empty';
}
?>
<div class="card mt-5">
    <div class="card-header">
        <h2>Login</h2>
    </div>
    <div class="card-body">
        <?php
        if(!empty($message)): ?>
            <div class="alert alert-danger"><?php $message ?></div>
        <?php endif; ?>
        <form action="login_actions.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-outline-primary">Login</button>
            </div>
            <div class="form-group">
                <p>Not registred yet? <a style="text-decoration: none;" href="register.php">Register</a></p>
            </div>
        </form>    
    </div>
</div>
<?php
require 'footer.php'
?>