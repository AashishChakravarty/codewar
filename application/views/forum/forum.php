<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>




<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>





<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
    <header class="bmd-layout-header">
        <div class="navbar navbar-light bg-faded">
            <button class="navbar-toggler" type="button" data-toggle="drawer" data-target="#dw-s2">
                <span class="sr-only">Toggle drawer</span>
                <i class="material-icons">menu</i>
            </button>
            <!--
            <ul class="nav navbar-nav">
                <li class="nav-item">Title</li>
            </ul>
            -->
        </div>
    </header>
    <div id="dw-s2" class="bmd-layout-drawer bg-faded">
        <header>
            <a class="navbar-brand">Search by -</a>
        </header>
        <ul class="list-group">
            <a class="list-group-item">Mobile Number</a>
            <!--
            <a class="list-group-item">Link 2</a>
            <a class="list-group-item">Link 3</a>
            -->
        </ul>
    </div>
    <main class="bmd-layout-content">
        <div class="container">


            <div id="main">


                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Mobile number "
                           aria-label="Mobile number" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                </div>




                <div class="card" style="width: 100%;margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Information Found </h5>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->

                        <ul class="list-group list-group-flush" id="info">
                            <li class="list-group-item">Name : Pankaj Devesh </li>
                            <li class="list-group-item">DOB : 06/01/1997 </li>
                            <li class="list-group-item">Address : Qt. no. 81 tilak nagar </li>
                            <li class="list-group-item">Mail : pankajdevesh3@gmail.com</li>
                            <li class="list-group-item">Gender : Male </li>
                        </ul>


                        {{--<a href="#" class="card-link">Card link</a>--}}
                        {{--<a href="#" class="card-link">Another link</a>--}}
                    </div>
                </div>


            </div>


        </div>
    </main>
</div>


<style>
    #main {
        margin-top: 10px;
    }
    .list-group-item{
        border-bottom: 1px solid rgba(128, 128, 128, 0.35);
    }
</style>














<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>

<!-- SnackbarJS plugin -->
<script src="https://cdn.rawgit.com/FezVrasta/snackbarjs/1.1.0/dist/snackbar.min.js"></script>

<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script>
    $('body').bootstrapMaterialDesign();
</script>
</body>
</html>
