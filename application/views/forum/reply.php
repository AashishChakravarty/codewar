<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>


<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">-->
<!--    <a class="navbar-brand" href="#">Code War</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"-->
<!--            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">-->
<!--        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">-->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Link</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#">Disabled</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</nav>-->


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">CodeWar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">-->
            <!--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
            <!--</li>-->
            <!--<li class="nav-item">-->
            <!--<a class="nav-link" href="#">Link</a>-->
            <!--</li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Workshops
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Quiz.php">Code-It-In-Python</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Pycon-1.0</a>
                </div>
            </li>
        </ul>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>


<div class="jumbotron jumbotron-fluid" style="margin-top: 50px">
    <div class="container">
        <h1 class="display-4">Code War</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>


<div class="container">


    <div class="card">
        <div class="card-header">

            <form>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-link"><?= $question->sender_email ?></button>
                    </div>
                    <div class="col">

                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="#">Likes <span
                                                class="badge badge-primary badge-pill"><?= $question->question_likes ?></span></a>
                                </li>
                                <!--                                <li class="page-item"><a class="page-link" href="#">Comments -->
                                <!--                                        <span class="badge badge-primary badge-pill">1</span> </a>-->
                                <!--                                </li>-->
                            </ul>
                        </nav>
                    </div>
                </div>
            </form>


        </div>
        <div class="card-body">


            <blockquote class="blockquote mb-0">
                <pre><?php
                    $question->question = str_replace('<code>', '</pre><code><pre>', $question->question);
                    $question->question = str_replace('</code>', '</pre></code><pre>', $question->question);
                    echo $question->question;
                    ?>
                </pre>


            </blockquote>
        </div>
    </div>



    <?php foreach ($comments as $comment){ ?>


    <div class="card float-right reply">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <a href="#"><?= $comment->email ?></a>
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
            <blockquote class="blockquote mb-0">
                <pre><?php
                    $comment->comment = str_replace('<code>', '</pre><code><pre>', $comment->comment);
                    $comment->comment = str_replace('</code>', '</pre></code><pre>', $comment->comment);
                    echo $comment->comment;
                    ?>
                </pre>
            </blockquote>
        </div>
    </div>

    <?php } ?>


</div>

<style>
    body {
        background-color: #e9ecef;;
    }

    .card {
        margin-bottom: 15px;
    }

    .reply {
        width: calc(100% - 20px);
    }


    pre{
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


<script >

</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
