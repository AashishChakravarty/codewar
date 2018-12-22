<div class="jumbotron jumbotron-fluid" style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <!-- <h1 class="display-4">Code War</h1> -->
            <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
            <!-- <div class="flaot-right col-md-2 offset-md-8"> -->
            <a class="btn btn-primary offset-md-8" href="<?= base_url('forum/create-post') ?>" role="submit">Add New Question</a>
            <!-- </div> -->
        </div>
    </div>
</div>


<div class="container">
    <!-- <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-warning btn-circle float-right">+</button>
        </div>
    </div> -->

    <?php 
    if (isset($questions)) {
    
    foreach ($questions as $question){ ?>
    <div class="row">
        <div class="col-md-9 offset-md-1">
            <div class="card  mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-link">
                                <?=$question->name;?></button>
                        </div>
                        <div class="col">

                            <nav aria-label="...">
                                <ul class="pagination pagination-sm justify-content-end">
                                    <li class="page-item">
                                        <a class="page-link" href="#">Likes <span class="badge badge-primary badge-pill">
                                                <?=$question->likes?></span></a>
                                    </li>
                                    <!-- <li class="page-item"><a class="page-link" href="#">Comments
                                            <span class="badge badge-primary badge-pill">0</span> </a>
                                    </li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-body" onclick="window.location='<?= base_url('forum/question/'.$question->id); ?>'">
                    <blockquote class="blockquote mb-0">
                        <pre><?php
                    $question->question = str_replace('<code>','</pre><code><pre>',$question->question);
                    $question->question = str_replace('</code>','</pre></code>
                        <pre>',$question->question);
                    echo $question->question;
                    ?></pre>
                    </blockquote>
                    <!-- <blockquote class="blockquote mb-0">
                <code>
                    <footer class="blockquote-footer">Go to <cite title="Reply on this question">Reply</cite></footer>
                </code>
            </blockquote> -->
                </div>
            </div>
        </div>
    </div>
    <?php }
    } else {
        ?>

    <h2>
        <?= $message; ?>
    </h2>

    <?php
    }
    ?>
</div>



<style>
    body {
        background-color: #e9ecef;
        ;
    }


    .card-body {
        cursor: grab;
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

    pre code {
        color: #e83e8c;
        /*border: 1px solid rgba(128, 128, 128, 0.32);*/
        border-radius: 5px;
        padding: 20px;
        background-color: rgba(231, 231, 231, 0.33);
    }




    /*.btn-circle.btn-xl {*/
    /*width: 70px;*/
    /*height: 70px;*/
    /*padding: 10px 16px;*/
    /*border-radius: 35px;*/
    /*font-size: 24px;*/
    /*line-height: 1.33;*/
    /*}*/

    .btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0px;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.42857;
    }
</style>