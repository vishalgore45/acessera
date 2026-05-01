<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("config/db.php");

// LOGIN LOGIC
if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // ADMIN LOGIN
    if($email === "Admin" && $password === "VISHAL123"){
        header("Location: admin_dashboard.php");
        exit();
    }

    $sql = "SELECT * FROM users WHERE email='$email' OR mobile='$email'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){

        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];

            header("Location: index.php");
            exit();

        } else {
            $error = "Wrong Password";
        }

    } else {
        $error = "User Not Found";
    }
}

include("includes/header.php");
?>

<style>

.login-card {
    width: 100%;
    max-width: 420px;
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.login-card:hover {
    transform: translateY(-5px);
}

.login-title {
    text-align: center;
    font-weight: 600;
    margin-bottom: 20px;
}

.login-input {
    height: 45px;
    border-radius: 8px;
}

.login-btn {
    background: linear-gradient(45deg, #0d6efd, #3b82f6);
    border: none;
    height: 45px;
    border-radius: 8px;
    font-weight: 500;
}

.login-btn:hover {
    background: linear-gradient(45deg, #0b5ed7, #2563eb);
}

</style>

<!-- MAIN CENTERED AREA -->
<div class="main-content">

<div class="login-card">

<h4 class="login-title">🔐 Login to Acessera</h4>

<?php if(isset($error)) { ?>
<div class="alert alert-danger text-center">
    <?php echo $error; ?>
</div>
<?php } ?>

<form method="POST">

<input type="text" name="email" class="form-control login-input mb-3"
placeholder="Email or Mobile" required>

<input type="password" name="password" class="form-control login-input mb-3"
placeholder="Password" required>

<button name="login" class="btn login-btn w-100 text-white">
Login
</button>

</form>

<p class="text-center mt-3">
Don't have an account? <a href="register.php">Create Account</a>
</p>

</div>

</div>

<?php include("includes/footer_simple.php"); ?>