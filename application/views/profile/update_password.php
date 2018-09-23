<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="form-signin">
    <script>alert(<?php echo $message; ?>)</script>
    <?= form_open('update-password'); ?>
    <div class="text-center mb-4">
        <img class="mb-4" src="<?= base_url('assets/images/logo.jpg') ?>" alt="Codewar" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Change Password</h1>
        
        <!-- <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p> -->
    </div>

    <div class="form-label-group">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
        <label for="password">Password</label>
    </div>
    <div class="form-label-group">
        <input type="password" id="cpass" name="cpass" class="form-control" placeholder="Confirm Password" required>
        <?php echo form_error('cpass', '<div class="text-danger">', '</div>'); ?>
        <label for="cpass">Confirm Password</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
    <div class="mt-5 mb-3 text-center">
    <a class="btn btn-info" href="<?= base_url('profile'); ?>" role="button">Back to Profile</a>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">MITS Codewar &copy; 2018-2019</p>
    </form>
</div>