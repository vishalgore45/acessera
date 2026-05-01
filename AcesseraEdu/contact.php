<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("config/db.php");

// ================= SAVE FEEDBACK =================
if(isset($_POST['submit_feedback'])){

    $user_id = $_SESSION['user_id'] ?? 0;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback(user_id,name,email,subject,rating,message)
            VALUES('$user_id','$name','$email','$subject','$rating','$message')";

    if($conn->query($sql)){
        $success = "Feedback submitted successfully!";
    } else {
        $error = "Something went wrong!";
    }
}

include("includes/header.php");
?>

<style>

/* MAIN */
.main-content {
    margin-left: 220px;
    background: #f4f6f9;
}

/* IMAGE SECTION (TOP) */
.top-image {
    padding: 30px;
}

.top-image img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 12px;
}

/* SECTION BELOW */
.contact-section {
    padding: 20px 30px 50px;
}

/* CARD */
.card-box {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 18px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.card-box:hover {
    transform: translateY(-3px);
}

/* INPUT */
.form-control {
    border-radius: 8px;
    height: 45px;
}

textarea.form-control {
    height: auto;
}

/* BUTTON */
.btn-custom {
    background: linear-gradient(45deg,#ffb300,#ffc107);
    border: none;
    font-weight: 600;
}

/* RATING */
.rating span {
    font-size: 22px;
    cursor: pointer;
    color: #ccc;
}

.rating span.active {
    color: #ffb300;
}

/* RESPONSIVE */
@media(max-width:768px){
    .main-content {
        margin-left: 0;
    }
}

</style>

<div class="main-content">

<!-- TOP IMAGE -->
<div class="top-image">
    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f">
</div>

<!-- BELOW SECTION -->
<div class="contact-section">

<div class="row g-4">

<!-- FEEDBACK -->
<div class="col-md-6">
<div class="card-box">

<h5>Send Feedback</h5>

<?php if(isset($success)) echo "<p class='text-success'>$success</p>"; ?>
<?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

<form method="POST">

<input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="text" name="subject" class="form-control mb-3" placeholder="Subject" required>

<label>Rating</label>
<div class="rating mb-3" id="rating">
    <span data-value="1">★</span>
    <span data-value="2">★</span>
    <span data-value="3">★</span>
    <span data-value="4">★</span>
    <span data-value="5">★</span>
</div>

<input type="hidden" name="rating" id="ratingValue">

<textarea name="message" class="form-control mb-3" rows="4" placeholder="Write your feedback..." required></textarea>

<button name="submit_feedback" class="btn btn-custom w-100">
Submit Feedback
</button>

</form>

</div>
</div>

<!-- CONTACT -->
<div class="col-md-6">
<div class="card-box">

<h5>Contact Information</h5>

<p>📧 <strong>support@acessera.com</strong></p>
<p>📞 +91 8766559901</p>
<p>🕘 9 AM – 8 PM Daily</p>

<hr>

<h6>What Happens Next?</h6>

<p>
We review every feedback carefully and respond within 24 hours.
</p>

</div>
</div>

</div>

</div>

</div>

<script>

// STAR RATING
let stars = document.querySelectorAll("#rating span");
let ratingInput = document.getElementById("ratingValue");

stars.forEach((star, index) => {
    star.addEventListener("click", function(){
        ratingInput.value = index + 1;

        stars.forEach(s => s.classList.remove("active"));

        for(let i=0; i<=index; i++){
            stars[i].classList.add("active");
        }
    });
});

</script>

<?php include("includes/footer_simple.php"); ?>