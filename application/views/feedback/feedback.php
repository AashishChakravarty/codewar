<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="form-signin">
    <script>alert(<?php echo $message; ?>)</script>

    <?php echo validation_errors(); ?>
    <?= form_open('feedback/feedback_submit'); ?>
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Feedback</h1>
    </div>
    <a href="<?= base_url('user/profile') ?>">Go to Profile</a>
    <div class="form-label-group"><span class="text-danger">*</span> Mandatory</div>

    <div class="form-group">
    <label for="class">Select Class</label>
    <select class="form-control" id="class" name="class" required>
      <option value="class1">Class 1</option>
    </select>
  </div>

    <div class="form-label-group">
    <span class="text-danger">*</span>
        Q.1 Was the lecture easy to understand?
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="agree" name="q1" required>Agree
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="satisfactory" name="q1">Satisfactory
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="disagree" name="q1">Disagree
            </label>
        </div>
    </div>

    <div class="form-label-group">
    <span class="text-danger">*</span>
    Q.2 Rate the instructor.
    <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="5" name="q2" required>5. Excellent
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="4" name="q2">4. Good
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="3" name="q2">3. Average
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="2" name="q2">2. Fair
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="1" name="q2">1. Poor
            </label>
        </div>
    </div>

    <div class="form-label-group">
    <span class="text-danger">*</span>
    Q.3 Were the Class and the instructors interactive?
    <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="agree" name="q3" required>Agree
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="satisfactory" name="q3">Satisfactory
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="disagree" name="q3">Disagree
            </label>
        </div>
    </div>

    <div class="form-label-group">
    <span class="text-danger">*</span>
    Q.4 Were the doubts solved appropriately?
    <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="agree" name="q4" required>Agree
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="satisfactory" name="q4">Satisfactory
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="disagree" name="q4">Disagree
            </label>
        </div>
    </div>

    <div class="form-label-group">
    <span class="text-danger">*</span>
    Q.5 Rate the management.
    <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="5" name="q5" required>5. Excellent
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="4" name="q5">4. Good
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="3" name="q5">3. Average
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="2" name="q5">2. Fair
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="1" name="q5">1. Poor
            </label>
        </div>
    </div>

    <div class="form-label-group">
    <span class="text-danger">*</span>
    Q.6 Were the computer’s working properly?
    <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="agree" name="q6" required>Agree
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="satisfactory" name="q6">Satisfactory
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="disagree" name="q6">Disagree
            </label>
        </div>
    </div>

    <div class="form-label-group">
    Q.7 Suggestions for further Improvement.
    <div class="form-check">
        <textarea name="suggestion" id="suggest" cols="50" rows="4" placeholder="Any Suggestion"></textarea>
        </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    
    <p class="mt-5 mb-3 text-muted text-center">MITS Codewar &copy; 2018-2019</p>
    </form>
</div>