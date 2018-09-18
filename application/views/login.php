<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="form-signin">
    <script>alert('<?php echo $message; ?>')</script>
    
<?php echo validation_errors(); ?>
    <?= form_open('user/user_login'); ?>
    <div class="text-center mb-4">
        <img class="mb-4" src="<?= base_url('assets/images/logo.jpg') ?>" alt="Codewar" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        
        <!-- <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p> -->
    </div>

    <div class="form-label-group">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
        <label for="email">Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
        <label for="password">Password</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <div class="mt-5 mb-3 text-center">
    <a class="btn btn-info" href="<?= base_url('User/signup'); ?>" role="button">Sign Up</a>
    <!-- <a class="btn btn-info" href="#" role="button">Password Reset</a> -->
    </div>
    <p class="mt-5 mb-3 text-muted text-center">MITS Codewar &copy; 2018-2019</p>
    </form>
</div>