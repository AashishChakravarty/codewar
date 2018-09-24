<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- <div class="jumbotron jumbotron-fluid" style="margin-top: 50px">
    <div class="container">
        <h1 class="display-4">Code War</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div> -->


<div class="container" style="margin-top:80px;">
<div class="col-md-11 offset-1">
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-link">
                            <?= $question->name ?></button>
                    </div>
                    <div class="col">

                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="#">Likes <span class="badge badge-primary badge-pill">
                                            <?= $question->likes ?></span></a>
                                </li>
                                <!-- <li class="page-item"><a class="page-link" href="#">Comments
                                        <span class="badge badge-primary badge-pill">0</span> </a>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <pre><?php
                    $question->question = str_replace('<code>', '</pre><code><pre>', $question->question);
                    $question->question = str_replace('</code>', '</pre></code>
                <pre>', $question->question);
                    echo $question->question;
                    ?>
                </pre>
            </blockquote>
            <blockquote class="blockquote mb-0 float-right">
                <!-- <code> -->
                    <a class="blockquote-footer" href="#reply" style="text-decoration:none;">Reply</a>
                <!-- </code> -->
            </blockquote>
        </div>
    </div>

    <?php foreach ($comments as $comment){ ?>


    <div class="card float-right reply">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <a href="#">
                        <?= $comment->name ?></a>
                </div>
                <div class="col">
                    <a class="float-right" href="#">Likes
                        <span class="badge badge-primary badge-pill">
                            <?= $comment->likes ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>


        <div class="card-body">
            <blockquote class="blockquote">
                <pre><?php
                    $comment->comment = str_replace('<code>', '</pre><code><pre>', $comment->comment);
                    $comment->comment = str_replace('</code>', '</pre></code>
                <pre>', $comment->comment);
                    echo $comment->comment;
                    ?> </pre>
            </blockquote>
        </div>
    </div>

    <?php } ?>
    </div>

    <div class="col-md-9 offset-3">
    <div class="card" id="reply">
        <div class="card-body">
                <?= form_open('forum/add-comment'); ?>
                <div class="form-group">
                    <input type="text" name='q_id' hidden value="<?= $question->id ?>">
                    <textarea class="form-control" name="comment" rows="5" placeholder="Enter Your Reply" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
            <?= validation_errors(); ?>
        </div>
    </div>
    </div>


</div>

<style>
    body {
        background-color: #e9ecef;
        ;
    }

    .card {
        margin-bottom: 15px;
    }

    .reply {
        width: calc(100% - 20px);
    }


    pre {
        overflow-y: hidden;
        overflow-x: auto;
    }

    code pre {
        color: #e83e8c;
        /*border: 1px solid rgba(128, 128, 128, 0.32);*/
        border-radius: 5px;
        padding: 20px;
        background-color: rgba(231, 231, 231, 0.33);
    }
</style>