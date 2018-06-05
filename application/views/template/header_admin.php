<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <title>Welcome</title>
    </head>
    <body>


        <nav class="navbar navbar-expand-sm sticky-top bg-dark fixed-topnavbar-dark mb-4 py-3" style="background: linear-gradient(darkgray, lightgrey);">
            
                <a class="navbar-brand" href="<?php echo site_url("Admin/index"); ?>">
                    <img src="<?php echo base_url("image/logo/logo666.jpg"); ?>" alt="Logo" style="width:120px;">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("Admin/conferences"); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Admin/myProfile"); ?>">My profile</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Admin/conferences"); ?>">Conferences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Admin/myconferences"); ?>">My conferences</a>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("Ajaxsearch/index"); ?>">Search</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Admin/logout'); ?>">Logout</a>
                    </li>

                </ul>
           
        </nav>


       <!--  <div class="col-2 position-fixed">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-home-tab"  href="<?php echo site_url("Admin/projects"); ?>" role="tab" aria-controls="v-pills-home" >Project</a>
                <a class="nav-link" id="v-pills-profile-tab"  href="<?php echo site_url("Admin/addnewConference"); ?>" role="tab" aria-controls="v-pills-profile" >Add new conference</a>
                <a class="nav-link" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviewer invitation</a>
                <a class="nav-link" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerEmailInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviewer Email invitation</a>

        <div class="col-2 position-fixed">
            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link btn btn btn-primary mb-2" id="v-pills-home-tab"  href="<?php echo site_url("Admin/projects"); ?>" role="tab" aria-controls="v-pills-home" >Project</a>
                <a class="nav-link btn btn btn-primary mb-2" id="v-pills-profile-tab"  href="<?php echo site_url("Admin/addnewConference"); ?>" role="tab" aria-controls="v-pills-profile" >Add new conference</a>
                <a class="nav-link btn btn btn-primary mb-2" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviewer invitation</a>
                <a class="nav-link btn btn btn-primary" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerEmailInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reviewer Email invitation</a>

            </div>
        </div>-->



        <div class="container">

