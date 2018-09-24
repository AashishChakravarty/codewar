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
        <div class="card-body">
            <button type="button" class="btn btn-warning btn-circle float-right">+</button>
        </div>
    </div>


<!--    <div class="card">-->
<!--        <div class="card-header" onclick="window.location='http://127.0.0.1/codewar/api/Forum/get/15'">-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col">-->
<!--                    <button type="button" class="btn btn-link">pankajdevesh@codewar.me</button>-->
<!--                </div>-->
<!--                <div class="col">-->
<!---->
<!--                    <nav aria-label="...">-->
<!--                        <ul class="pagination pagination-sm justify-content-end">-->
<!--                            <li class="page-item"><a class="page-link" href="#">Likes <span-->
<!--                                            class="badge badge-primary badge-pill">1</span> </a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">Comments <span-->
<!--                                            class="badge badge-primary badge-pill">1</span> </a></li>-->
<!--                        </ul>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        </div>-->
<!--        <div class="card-body">-->
<!---->
<!---->
<!--            <blockquote class="blockquote mb-0">-->
<!--                <pre>Simple Python Programs. ...-->
<!--Python Programming Examples on Mathematical Functions. ...-->
<!--Python Programming-->
<!--<code>Examples on Lists. ...</code>-->
<!--Python Programming Examples on Strings. ...-->
<!--Python Programming Examples on Dictionary. ...-->
<!--Python Programming Examples on Sets. ...-->
<!--Python Programs with Recursions. ...-->
<!--Python Programs without Recursions.</pre>-->
<!---->
<!---->
<!--                <code>-->
<!--                    <pre>n=int(input("Enter the number of elements to be inserted: "))-->
<!--a=[]-->
<!--for i in range(0,n):-->
<!--    elem=int(input("Enter element: "))-->
<!--    a.append(elem)-->
<!--avg=sum(a)/n-->
<!--print("Average of elements in the list",round(avg,2))</pre>-->
<!--                </code>-->
<!---->
<!--            </blockquote>-->
<!---->
<!--            <blockquote class="blockquote mb-0">-->
<!--                <code>-->
<!--                    <footer class="blockquote-footer">Go to <cite title="Source Title">reply</cite></footer>-->
<!--                </code>-->
<!--            </blockquote>-->
<!--        </div>-->
<!--    </div>-->







    <?php foreach ($questions as $question){ ?>




    <div class="card">
        <div class="card-header" onclick="window.location='<?php echo base_url('/Forum/reply') . '/'. $question->question_id;?>'">

            <form>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-link"><?=$question->sender_email?></button>
                    </div>
                    <div class="col">

                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="#">Likes <span class="badge badge-primary badge-pill"><?=$question->question_likes?></span></a>
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
                    $question->question = str_replace('<code>','</pre><code><pre>',$question->question);
                    $question->question = str_replace('</code>','</pre></code><pre>',$question->question);
                    echo $question->question;
                    ?>
                </pre>


            </blockquote>

            <blockquote class="blockquote mb-0">
                <code>
                    <footer class="blockquote-footer">Go to <cite title="Reply on this question">Reply</cite></footer>
                </code>
            </blockquote>
        </div>
    </div>


    <?php } ?>


</div>

<?php

//foreach ($questions as $question){
//    print_r($question);
//    echo '<hr>';
//}

?>




<style>
    body {
        background-color: #e9ecef;;
    }

    .card {
        margin-bottom: 15px;
    }
    .card-header{
        cursor: grab;
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

    pre code{
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
