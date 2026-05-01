<?php include("includes/header.php"); ?>

<style>

/* ===== MAIN ===== */
.main-content {
    margin-left: 220px;
    padding: 40px;
    background: #f4f6f9;
    min-height: 100vh;
}

/* ===== HERO ===== */
.hero {
    background: linear-gradient(135deg, #442209, #63431d);
    height: 22vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 12px;
    margin-bottom: 30px;
    text-align: center;
}

.hero h2 {
    font-weight: 600;
}

.hero p {
    font-size: 14px;
    opacity: 0.9;
}

/* ===== TEXT ===== */
h4 {
    font-weight: 600;
    margin-bottom: 10px;
}

p {
    color: #555;
    font-size: 14px;
}

/* ===== MISSION ===== */
.mission-box {
    background: #f3e2c7;
    padding: 20px;
    border-radius: 12px;
}

/* ===== STATS ===== */
.stat-card {
    background: white;
    padding: 22px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
}

/* ===== TEAM ===== */
.team-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
}

.team-card img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
}

/* ===== WIDTH FIX ===== */
.container-custom {
    max-width: 1100px;
    margin: auto;
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
    .main-content {
        margin-left: 0;
        padding: 20px;
    }
}

</style>

<div class="main-content">

<!-- HERO -->
<div class="hero">
    <div>
        <h2>About Acessera</h2>
        <p>Empowering students with learning, preparation & guidance</p>
    </div>
</div>

<div class="container-custom">

<!-- ===== ROW 1 (NO IMAGE) ===== -->
<div class="row align-items-center mb-4">

<!-- STORY -->
<div class="col-md-6">
    <h4>Our Story</h4>
    <p>
    Acessera was created to remove the struggle students face while preparing for exams and projects.
    We built a platform where learning resources, preparation, and ethical guidance exist together.
    </p>

    <p>
    It is more than a platform — it is a system designed to build confidence and real-world skills.
    </p>
</div>

<!-- MISSION -->
<div class="col-md-6">
    <div class="mission-box">
        <h5>Our Mission</h5>
        <p>
        Provide structured and ethical learning for every student.
        </p>

        <h5>Our Vision</h5>
        <p>
        Become a trusted learning platform worldwide.
        </p>
    </div>
</div>

</div>

<!-- ===== STATS ===== -->
<div class="row text-center mb-4">

<div class="col-md-3 col-6">
<div class="stat-card">
<h4>50+</h4>
<p>Resources</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="stat-card">
<h4>100</h4>
<p>Platforms</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="stat-card">
<h4>1000+</h4>
<p>Feedback</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="stat-card">
<h4>100+</h4>
<p>Insights</p>
</div>
</div>

</div>

<!-- ===== TEAM ===== -->
<div class="text-center">

<h4 class="mb-3">Meet the Team</h4>

<div class="row justify-content-center">

<div class="col-md-3 col-6">
<div class="team-card">
<img src="https://randomuser.me/api/portraits/men/32.jpg">
<h6 class="mt-2">Vishal Gore</h6>
<p>Founder</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="team-card">
<img src="https://randomuser.me/api/portraits/men/45.jpg">
<h6 class="mt-2">Manish Marathe</h6>
<p>Developer</p>
</div>
</div>

</div>

</div>

</div>

</div>

<?php include("includes/footer_simple.php"); ?>