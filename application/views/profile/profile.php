<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>alert('<?php echo $message; ?>')</script>
<div class="container">
<div class="mt-5 mb-3 text-center">
    <a class="btn btn-info" href="<?= base_url('logout'); ?>" role="button">Logout</a>
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h2 class="card-title">Name: <?= $this->session->userdata('name'); ?></h2>
                            <p class="card-text"><strong>Email: </strong> <?= $this->session->userdata('email'); ?> </p>
                            <!-- <p class="card-text"><strong>Skills: </strong> Theme, plugin and website development </p>
                            <p><strong>Platform: </strong>
                                <span class="badge bg-primary">WordPress</span>
                                <span class="badge bg-info">Weebly</span>
                                <span class="badge bg-warning">Bootstrap</span>
                                <span class="badge bg-success">Wix</span>
                            </p> -->
                        </div>
                        <!-- <div class="col-md-4 col-sm-4 text-center">
                            <img class="btn-md" src="assets/images/card-image.png" alt="" style="border-radius:50%;">
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h2><strong> 5.2K </strong></h2>
                            <p><small>Fans</small></p>
                            <button class="btn btn-primary btn-block btn-md"><span class="fa fa-facebook-square"></span>
                                Like </button>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h2><strong>1.4K</strong></h2>
                            <p><small>Following</small></p>
                            <button class="btn btn-success btn-block btn-md"><span class="fa fa-twitter-square"></span>
                                Tweet </button>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h2><strong>3.8K</strong></h2>
                            <p><small>Followers</small></p>
                            <button type="button" class="btn btn-danger btn-block btn-md"><span class="fa fa-google-plus-square"></span>
                                Follow </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-info" href="<?= base_url('feedback'); ?>" role="button">Classes Feedback</a>
    <a class="btn btn-info" href="https://docs.google.com/forms/d/e/1FAIpQLSfdL-bR6zQbdfNLt6iAzMY4nqLf80xc_ZItF5YJLq-yFCl6QQ/viewform?c=0&w=1" role="button" target="_blank">Quiz</a>
</div>