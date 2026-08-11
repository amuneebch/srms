

<nav>
    <div class="nav-brand">
        <h3>Student Management System</h3>
        <button class="nav-toggle">☰</button>
    </div>
    <ul class="nav-links">   <!-- ← this class is needed -->
        <li><a href="../admin/index.php">Dashboard</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</nav>

<script>
$(document).ready(function() {
    $('.nav-toggle').click(function() {
        $('.nav-links').toggleClass('open');
    });
});
</script>