<div class="float">
    <ul class="nav" id="side-menu" style="display: flex; flex-direction:column">
        <li>
            <label for="">Logged in as:</label><br><br>
            <a href="admin-profile.php"><i class="bi bi-person-square" style="font-size: large;"></i>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['login'] ?></a>
        </li>
        <li>
            <a href="dashboard.php">&nbsp;&nbsp;&nbsp;<i class="bi bi-database-dash"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DASHBOARD</a>
        </li>
        <li>
            <a href="view.php">&nbsp;&nbsp;&nbsp;<i class="bi bi-view-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VEW CADETS</a>
        </li>
        <li>
            <a href="session.php">&nbsp;&nbsp;&nbsp;<i class="bi bi-calendar-event"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SESSION</a>
        </li>
        <li>
            <a href="../logout.php">&nbsp;&nbsp;&nbsp;<i class="bi bi-box-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>
        </li>
    </ul>
</div>