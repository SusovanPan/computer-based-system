<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
    <h1>Analysis</h1>
    <div class="dashboard-cards" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <div class="card" style="flex: 1 1 45%; min-width: 280px; max-width: 500px; padding: 20px;">
          <div style="margin-bottom: 10px; text-align: center;">
            <label for="sectionSelect">Select Section:</label>
              <select id="sectionSelect"  style="width: 150px; font-size: 14px;">
                <option value="">-- All Sections --</option>
              </select>
          </div>
          <div style="width: 100%; height: 200px;">
            <canvas id="difficultyChart"></canvas>
          </div>
        </div>


      <!-- Right Card -->
      <div class="card" style="flex: 1 1 45%; min-width: 280px; max-width: 500px; padding: 20px;">
        <!-- <h4 class="text-center">Another Card</h4>
        <div style="text-align: center; margin-top: 60px;">
          <p style="color: gray;">Coming Soon or Add Chart Here</p>
        </div> -->
        <!-- <h4 class="text-center">Bloom's Level Analysis</h4> -->
         <div style="margin-bottom: 10px; text-align: center;">
          <label for="bloomsSectionSelect">Select Section:</label>
            <select id="bloomsSectionSelect" style="width: 150px; font-size: 14px;">
              <option value="">-- All Sections --</option>
            </select>
          </div>

          <div style="width: 100%; height: 200px;">
            <canvas id="bloomsChart" style="width: 100%; height: 100%;"></canvas>
          </div>
      </div>

      <div class="card" style="flex: 1 1 100%; min-width: 300px; padding: 20px;">
        <!-- <h4 class="text-center">Student Performance</h4> -->

        <button onclick="exportChartToPDF()" 
                style="position: absolute; top: 10px; left: 10px; background: none; border: none; cursor: pointer;" 
                title="Export as PDF">
          📄
        </button>


        <div style="text-align: center; margin-bottom: 15px;">
          <label for="performanceDate">Select Date:</label>
          <input type="date" id="performanceDate" style="font-size: 14px; padding: 4px;">
        </div>

        <div style="width: 100%; height: 300px;">
          <canvas id="performanceChart" style="width: 100%; height: 100%;"></canvas>
        </div>
      </div>

    </div>
</div>

<style>
@media print {
  #performanceChart {
    display: none !important;
  }
}

@media print {
  body * {
    visibility: hidden;
  }

  #printOnly, #printOnly * {
    visibility: visible;
  }

  #performanceChart {
    display: none !important;
  }
}
</style>

<?php include 'common/footer.php'; ?>
