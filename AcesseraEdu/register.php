<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("config/db.php");

$errors = [];
$success = "";

// ================= REGISTER LOGIC =================
if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $country_code = $_POST['country_code'];
    $mobile = trim($_POST['mobile']);
    $full_mobile = $country_code . $mobile;
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // EMAIL
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Enter valid email";
    }

    // MOBILE (India)
    if($country_code == "+91" && !preg_match("/^[789][0-9]{9}$/", $mobile)){
        $errors['mobile'] = "Enter valid mobile number";
    }

    // PASSWORD LENGTH
    if(strlen($password) < 6){
        $errors['password'] = "Password must be more than 6 characters";
    }

    // PASSWORD MATCH
    if($password !== $confirm_password){
        $errors['confirm_password'] = "Passwords do not match";
    }

    // IF NO ERRORS
    if(empty($errors)){

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // CHECK EXISTING
        $check = "SELECT * FROM users WHERE email='$email' OR mobile='$full_mobile'";
        $result = $conn->query($check);

        if($result && $result->num_rows > 0){
            $errors['general'] = "User already exists";
        } else {

            $sql = "INSERT INTO users(name,email,mobile,password) 
                    VALUES('$name','$email','$full_mobile','$password_hash')";

            if($conn->query($sql)){
                $success = "Account created successfully!";
            } else {
                $errors['general'] = "Something went wrong!";
            }
        }
    }
}

// ================= HEADER =================
include("includes/header.php");
?>

<style>

.register-card {
    width: 100%;
    max-width: 450px;
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.register-title {
    text-align: center;
    font-weight: 600;
    margin-bottom: 20px;
}

.register-input {
    height: 45px;
    border-radius: 8px;
}

.register-btn {
    background: linear-gradient(45deg, #198754, #20c997);
    border: none;
    height: 45px;
    border-radius: 8px;
    font-weight: 500;
}

.phone-group {
    display: flex;
    gap: 10px;
}

.country-select {
    width: 110px;
}

.error-text {
    color: red;
    font-size: 13px;
    margin-top: 3px;
}

.hint-text {
    font-size: 12px;
    color: gray;
}

</style>

<div class="main-content">

<div class="register-card">

<h4 class="register-title">📝 Create Account</h4>

<?php if($success) { ?>
<div class="alert alert-success text-center"><?php echo $success; ?></div>
<?php } ?>

<form method="POST">

<!-- NAME -->
<input type="text" name="name" class="form-control register-input mb-2"
placeholder="Full Name" required>

<!-- EMAIL -->
<input type="text" name="email" class="form-control register-input mb-1"
placeholder="Email" required>
<?php if(isset($errors['email'])) echo "<div class='error-text'>{$errors['email']}</div>"; ?>

<!-- PHONE -->
<div class="phone-group mb-1 mt-2">

<select name="country_code" class="form-select country-select">
<option value="+91">🇮🇳 +91</option>
<option value="+1">🇺🇸 +1</option>
<option value="+44">🇬🇧 +44</option>
<option value="+971">🇦🇪 +971</option>
</select>

<input type="text" name="mobile" class="form-control register-input"
placeholder="Mobile Number" maxlength="10" required>

</div>
<?php if(isset($errors['mobile'])) echo "<div class='error-text'>{$errors['mobile']}</div>"; ?>

<!-- PASSWORD -->
<input type="password" id="password" name="password"
class="form-control register-input mt-2 mb-1"
placeholder="Password" required>

<div class="hint-text">Password must be more than 6 characters</div>
<?php if(isset($errors['password'])) echo "<div class='error-text'>{$errors['password']}</div>"; ?>

<!-- CONFIRM PASSWORD -->
<input type="password" id="confirm_password" name="confirm_password"
class="form-control register-input mt-2 mb-1"
placeholder="Re-enter Password" required>

<?php if(isset($errors['confirm_password'])) echo "<div class='error-text'>{$errors['confirm_password']}</div>"; ?>

<!-- SHOW PASSWORD -->
<div class="form-check mt-2">
<input type="checkbox" class="form-check-input" onclick="togglePassword()">
<label class="form-check-label">Show Password</label>
</div>

<!-- BUTTON -->
<button name="register" class="btn register-btn w-100 text-white mt-3">
Register
</button>

</form>

<p class="text-center mt-3">
Already have an account? <a href="login.php">Login</a>
</p>

</div>

</div>

<script>
function togglePassword(){
    let p = document.getElementById("password");
    let cp = document.getElementById("confirm_password");

    p.type = p.type === "password" ? "text" : "password";
    cp.type = cp.type === "password" ? "text" : "password";
}
</script>

<?php include("includes/footer_simple.php"); ?>