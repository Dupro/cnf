
<<<<<<< HEAD
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
=======
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">

>>>>>>> a0aae459fee5e0e6b4697fe38e395e123069fc35
<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-4 py-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="bird.jpg" alt="Logo" style="width:40px;">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo site_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">My profile</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Conferences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Radovi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Novi rad</a>
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

