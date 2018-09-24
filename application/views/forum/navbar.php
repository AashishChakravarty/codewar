<div class="container">
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
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Workshops
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Quiz.php">Code-It-In-Python</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Pycon-1.0</a>
                </div>
            </li> -->
        </ul>
        <ul class="float-right">
        <a role="button" href="<?= base_url();?>" class="btn btn-outline-primary">Home</a>
        <?php
        $id = $this->session->userdata('id');
        if( isset($id)){ ?>
        <a role="button" href="<?= base_url('logout');?>" class="btn btn-outline-primary">Logout</a>
        <?php }else{ ?>
            <a role="button" href="<?= base_url('logout');?>" class="btn btn-outline-primary">Login</a>
        <?php }?>
        </ul>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
</div>