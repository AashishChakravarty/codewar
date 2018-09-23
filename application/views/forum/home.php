<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php require_once('header.php'); ?>

<div class="container-fluid bg-light fixed-top" id="navbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</div>


<div class=" jumbotron-fluid" id="top-jumbotron" style="margin-top: 70px">
    <div class="container">
        <h1 class="display-4" style="display: inline-block">Ask Question</h1>

        <!--        <p class="lead">Feel free to ask your Queries</p>-->
    </div>
</div>


<div class="container" id="questions">

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col col-sm-11">
                    <input type="text" style="width: 100%;height: 100%; font-size: 25px;" placeholder="Question"
                           id="question">
                </div>
                <div class="col col-sm-1">
                    <button type="submit" class="btn btn-outline-primary float-right" onclick="send_question();">Send</button>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <!-- ------------------------------------------------------------- -->
    <?php foreach ($questions as $q) { ?>
        <div class="card">
            <div class="card-header">
                <div class="form-row">
                    <div class="col col-sm-8">
                        <p><?php echo $q->sender_name ?></p>
                    </div>
                    <div class="col col-sm-4">
                        <form class="form-inline float-right" action="Quiz.php" method="get">
                            <button type="submit" class="btn btn-outline-success float-right"
                                    style="display: inline-block">Like
                            </button>
                            <button type="submit" class="btn btn-outline-primary float-right"
                                    style="display: inline-block">Reply
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="form-row">
                    <div class="col col-sm-11">
                        <div class="form-check">
                            <p>
                            <pre><?php echo $q->question; ?></pre>
                            </p>
                        </div>
                    </div>
                    <div class="col col-sm-1">
                        likes:<?= $q->question_likes ?>
                    </div>
                </div>
                <hr>
            </div>
        </div>

    <?php } ?>

    <!-- ------------------------------------------------------------- -->

</div>


<style>
    body {
        background-color: #e9ecef;
    }

    #top-jumbotron {
        margin-top: 10px;
    }

    .card {
        border: none;
        margin-bottom: 20px;
    }

    .card-header {
        border-left: 5px solid #f0ad4e;
    }

    #navbar {
        box-shadow: 0px 5px rgba(0, 0, 0, 0.13);
    }

    .form-check {
        margin: 10px;
    }

    /*blockquote {*/
    /*display: none;*/
    /*}*/

    #bottom {
        margin-bottom: 50px;
    }
</style>

<script>
    function send_question() {
        let q = document.getElementById('question').value;
        console.log(q);
        $.get("http://localhost/codewar/api/Forum/create/",
            {question:q},
            function (data, status) {
                console.log(data);
                console.log(status);
            }
        );
    }

</script>


<?php require_once('footer.php'); ?>