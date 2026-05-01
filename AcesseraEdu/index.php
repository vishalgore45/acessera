<?php include("includes/header.php"); ?>

<style>

body {
    background: #f4f6f9;
}

/* TITLE */
.section-title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 40px;
}

/* CARD */
.course-card {
    border-radius: 14px;
    overflow: hidden;
    transition: 0.4s;
    background: #fff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.course-card:hover {
    transform: translateY(-10px);
}

/* IMAGE */
.course-card img {
    height: 180px;
    width: 100%;
    object-fit: cover;
}

/* BUTTON */
.btn-custom {
    background: #198754;
    color: white;
    border-radius: 20px;
}

/* SECTION */
.section {
    margin-top: 80px;
}

/* BOX */
.box {
    padding: 30px;
    border-radius: 12px;
    background: linear-gradient(135deg,#ffffff,#e3f2fd);
    border-left: 5px solid #198754;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.box:hover {
    transform: scale(1.05);
}

</style>

<div class="main-content">
<div class="container">

<!-- COURSES -->
<h2 class="section-title">Our Courses</h2>

<div class="row g-4">

<?php
$courses = [
["C Language","Prof. Ravi Kumar","1500","c.png"],
["C++","Prof. Ankit Sharma","1800","cpp.png"],
["Data Structure","Prof. Raj Mehta","2500","ds.png"],
["JAVA","Prof. Suresh Patel","3000","java.png"],
["Python","Prof. Neha Gupta","2800","python.png"],
["Operating System","Prof. Aman Verma","2200","os.png"],
["Artificial Intelligence","Prof. Karan Singh","4500","ai.png"],
["Web Tech","Prof. Rohit Jain","2700","wt.png"],
["DBMS","Prof. Pooja Shah","2400","dbms.png"],
["Software Testing","Prof. Vikram Desai","2000","st.png"],
["Microprocessor","Prof. Ajay Kulkarni","2300","mp.png"],
["EG","Prof. Deepak Joshi","1700","eg.png"],

// hidden
["Math1","Prof. Sunil Patil","1200","m1.png"],
["Math2","Prof. Priya Nair","1300","m2.png"],
["ANN","Prof. Arjun Reddy","4000","ann.png"],
["Cyber","Prof. Imran Khan","3500","cs.png"],
["CSS","Prof. Sneha Kapoor","1100","css.png"],
["JS","Prof. Rahul Das","2600","js.png"],
["MAD","Prof. Manish Gupta","3200","mad.png"],
["PHP","Prof. Vishal Sharma","2100","php.png"]
];

$count = 0;

foreach($courses as $c){
$count++;
$hidden = ($count > 12) ? "extra-course d-none" : "";
?>

<div class="col-md-3 <?php echo $hidden; ?>">
<div class="course-card">

<img src="assets/<?php echo $c[3]; ?>">

<div class="p-3 text-center">
<h6><?php echo $c[0]; ?></h6>
<p class="text-muted"><?php echo $c[1]; ?></p>
<p><b>₹<?php echo $c[2]; ?></b></p>

<!-- ✅ FIXED LINK -->
<a href="course.php?course=<?php echo urlencode($c[0]); ?>" 
   class="btn btn-custom">
   View Course
</a>

</div>

</div>
</div>

<?php } ?>

</div>

<!-- VIEW MORE -->
<div class="text-center mt-4">
<button class="btn btn-dark" onclick="showMore()">View More</button>
</div>

<script>
function showMore(){
    document.querySelectorAll('.extra-course').forEach(el=>{
        el.classList.remove('d-none');
    });
}
</script>

<!-- WHO WE TEACH -->
<div class="section">
<h2 class="section-title">Who We Teach</h2>

<div class="row g-4">

<?php
$targets = ["MSBTE","SPPU","Mumbai University","DBATU","Shivaji University","RBU"];

foreach($targets as $t){
?>

<div class="col-md-4">
<div class="box">🎓 <?php echo $t; ?></div>
</div>

<?php } ?>

</div>
</div>

<!-- STUDY RESOURCES -->
<div class="section">
<h2 class="section-title">Study Resources</h2>

<div class="row g-4">

<div class="col-md-4">
<div class="box">📘 Notes</div>
</div>

<div class="col-md-4">
<div class="box">📄 Previous Papers</div>
</div>

<div class="col-md-4">
<div class="box">🎥 Video Lectures</div>
</div>

</div>
</div>

<div style="margin-top:80px;"></div>

</div>
</div>

<?php include("includes/footer_simple.php"); ?>