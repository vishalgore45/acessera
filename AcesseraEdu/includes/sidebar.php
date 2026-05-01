<style>

/* SIDEBAR */
.sidebar {
    width: 220px;
    height: calc(100vh - 70px);
    position: fixed;
    top: 70px;
    left: 0;
    background: linear-gradient(to bottom, #3b1f0f, #8b5e2e);
    color: white;

    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* MENU */
.sidebar-menu {
    padding-top: 20px;
}

.sidebar-menu a {
    display: block;
    padding: 12px 20px;
    color: #eee;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar-menu a:hover {
    background: rgba(255,255,255,0.15);
    padding-left: 25px;
}

/* SOCIAL SECTION */
.sidebar-bottom {
    text-align: center;
    padding: 20px 0;
}

/* FOLLOW TEXT */
.sidebar-bottom p {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #fff;
}

/* SOCIAL ITEMS */
.social-item {
    display: block;
    margin-bottom: 18px; /* 🔥 spacing fix */
    text-decoration: none;
    color: #fff; /* 🔥 white text */
    transition: 0.3s;
}

/* ICON */
.social-item img {
    width: 30px;
    margin-bottom: 5px;
}

/* TEXT */
.social-item span {
    display: block;
    font-size: 13px;
    color: #fff; /* 🔥 FIX BLUE TEXT */
}

/* HOVER */
.social-item:hover {
    transform: scale(1.1);
    color: #ffcc00;
}

.social-item:hover span {
    color: #ffcc00;
}

</style>

<div class="sidebar">

<!-- MENU -->
<div class="sidebar-menu">
    <a href="index.php">🏠 Home</a>
    <a href="#">📚 Courses</a>
    <a href="dashboard.php">🎓 My Learning</a>
    <a href="contact.php">📞 Contact</a>
    <a href="about.php">ℹ️ About Us</a>
</div>

<!-- SOCIAL -->
<div class="sidebar-bottom">

<p>Follow Us</p>

<a href="https://instagram.com" target="_blank" class="social-item">
    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png">
    <span>Instagram</span>
</a>

<a href="https://wa.me" target="_blank" class="social-item">
    <img src="https://cdn-icons-png.flaticon.com/512/220/220236.png">
    <span>WhatsApp</span>
</a>

<a href="https://youtube.com" target="_blank" class="social-item">
    <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png">
    <span>YouTube</span>
</a>

<a href="https://telegram.org" target="_blank" class="social-item">
    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png">
    <span>Telegram</span>
</a>

</div>

</div>