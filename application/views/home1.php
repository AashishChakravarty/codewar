<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<nav class="navbar navbar-expand-md navbar-light bg-light rounded">
    <div class="container">
      <!-- <a class="navbar-brand" href="#">Expand at md</a> -->
      <a class="navbar-brand" href="#">
    <img src="<?= base_url('assets/images/logo.png') ?>" height="30" class="d-inline-block align-top" alt="">
    Codewar
  </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Recent Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Discussion Forum</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top Achievers</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="https://www.codechef.com/ratings/all?filterBy=Institution%3DMadhav%20Institute%20of%20Technology%20and%20Science%2C%20Gwalior&itemsPerPage=40&order=asc&sortBy=global_rank" target="_blank">Codechef Rating</a>
              <a class="dropdown-item" href="#">Most Talented Persons of MITS</a>
              <!-- <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
        </ul>
        <button class="btn btn-primary" type="button">Login/Sign Up</button>
        <!-- <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form> -->
      </div>
      </div>
    </nav>

    <main role="main">

<section class="jumbotron text-center bg-light" >
  <div class="container">
    <h1 class="jumbotron-heading">About us</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <!-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
    </p>
  </div>
</section>
</main>