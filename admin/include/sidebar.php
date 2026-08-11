

<div class="Sidebar-Toggler" id="sidebarToggle">☰</div>

<!-- Sidebar -->
<aside id="sidebar">
    <br><br>
    <a href="../admin/index.php">Dashboard</a>
    <a href="student.php">Students</a>
    <a href="instructor.php">Instructor</a>
    <a href="#">Courses</a>
    <a href="#">Settings</a>
</aside>

<script>
$(document).ready(function() {
    $("#sidebarToggle").click(function() {
        var $sidebar = $("#sidebar");
        var $toggle = $(this);
        
        if ($sidebar.hasClass("hidden")) {
            $sidebar.removeClass("hidden");
            $toggle.html("✕").addClass("shifted");
        } else {
            $sidebar.addClass("hidden");
            $toggle.html("☰").removeClass("shifted");
        }
    });
});
</script>