<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
<div class="container form-section">
  <div class="card shadow-sm border-success">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">Feedback Form</h4>
    </div>
    <div class="card-body">
      <form id="addFeedbackform" method="POST">
        <div class="mb-3">
          <label class="form-label d-block mb-2">1. How appropriate is the overall design?</label>
          <div class="d-flex flex-wrap gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" value="Very Satisfied" required>
              <label class="form-check-label">Very Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" value="Satisfied">
              <label class="form-check-label">Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" value="Neutral">
              <label class="form-check-label">Neutral</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" value="Dissatisfied">
              <label class="form-check-label">Dissatisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" value="Very Dissatisfied">
              <label class="form-check-label">Very Dissatisfied</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label d-block mb-2">2. Was the interface intuitive?</label>
          <div class="d-flex flex-wrap gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="interface" value="Very Satisfied" required>
              <label class="form-check-label">Very Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="interface" value="Satisfied">
              <label class="form-check-label">Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="interface" value="Neutral">
              <label class="form-check-label">Neutral</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="interface" value="Dissatisfied">
              <label class="form-check-label">Dissatisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="interface" value="Very Dissatisfied">
              <label class="form-check-label">Very Dissatisfied</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label d-block mb-2">3. Was the design visually appealing?</label>
          <div class="d-flex flex-wrap gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="visual" value="Very Satisfied" required>
              <label class="form-check-label">Very Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="visual" value="Satisfied">
              <label class="form-check-label">Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="visual" value="Neutral">
              <label class="form-check-label">Neutral</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="visual" value="Dissatisfied">
              <label class="form-check-label">Dissatisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="visual" value="Very Dissatisfied">
              <label class="form-check-label">Very Dissatisfied</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label d-block mb-2">4. Did you feel any technical glitch in the system?</label>
          <div class="d-flex flex-wrap gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="glitch" value="Very Satisfied" required>
              <label class="form-check-label">Very Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="glitch" value="Satisfied">
              <label class="form-check-label">Satisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="glitch" value="Neutral">
              <label class="form-check-label">Neutral</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="glitch" value="Dissatisfied">
              <label class="form-check-label">Dissatisfied</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="glitch" value="Very Dissatisfied">
              <label class="form-check-label">Very Dissatisfied</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">5. Overall satisfactory remark?</label>
          <textarea class="form-control" name="remark" rows="3"></textarea>
        </div>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-start">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
      <div id="response"></div>
    </div>
  </div>
</div>
</div>

<?php include 'common/footer.php'; ?>