<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <title>Welcome</title>
    </head>
    <body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-4 py-3">
    <div class="container">
 <a class="navbar-brand" href="<?php echo site_url("Guest/index"); ?>">
 <img src="https://www.for-ny.org/wp-content/uploads/2017/04/2017-recovery-conference-logo-276x300.png" alt="Logo" style="width:40px;" >
 </a>
 <ul class="navbar-nav">
 <li class="nav-item ">
     <a class="nav-link" href="<?php echo site_url("Guest/index"); ?>">Home</a>
 </li>
  <li class="nav-item">
 <div class="dropdown">
 <button type="button" class="btn btn-outline-secondary
dropdown-toggle" data-toggle="dropdown">
 Conferences
 </button>
 <div class="dropdown-menu">
 <a class="dropdown-item" href="#">Link 1</a>
 <a class="dropdown-item" href="#">Link 2</a>
 <a class="dropdown-item" href="#">Link 3</a>
 </div>
</div>

 </li>
 </ul>
    <ul class="nav navbar-nav ml-auto">

 <li class="nav-item">
     <!-- Button trigger modal -->
 <a class="nav-link" data-toggle="modal" data-target="#LoginModal" href="">Login</a>
 </li>
 <li class="nav-item">
     <!-- Button trigger modal -->
 <a class="nav-link" data-toggle="modal" data-target="#RegistrationModal" href="">Registration</a>
 </li>
 <li class="nav-item ">
     <a class="nav-link" href="<?php echo site_url("Ajaxsearch/index"); ?>">Search</a>
 </li>
 
 </ul>
</nav>
    <div class="container">



