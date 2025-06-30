<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
    <h1>Dashboard</h1>
    <!-- <p>Welcome to your exam management dashboard.</p> -->

    <div class="dashboard-cards" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <!-- <div class="card">
            <h2>Upcoming Exams</h2>
            <p>3 exams scheduled this week</p>
        </div>
        <div class="card">
            <h2>Results</h2>
            <p>View your latest results</p>
        </div>
        <div class="card">
            <h2>Profile</h2>
            <p>Manage your profile settings</p>
        </div> -->

        <div class="card" style="flex: 1 1 100%; min-width: 300px; padding: 20px;">
            <div style="width: 100%; height: 300px;">
                <canvas id="myScoreChart" style="width: 100%; height: 100%;"></canvas>
            </div>
            
        </div>

    </div>
</div>

<?php include 'common/footer.php'; ?>
