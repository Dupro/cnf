
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-4 py-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://www.for-ny.org/wp-content/uploads/2017/04/2017-recovery-conference-logo-276x300.png" alt="Logo" style="width:40px;">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo site_url("User/index"); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("User/myProfile"); ?>">My profile</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Conferences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">New project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('User/logout'); ?>">Logout</a>
            </li>

        </ul>
</nav>
    <div class="container">

