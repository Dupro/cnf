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
                <a class="navbar-brand" href="<?php echo site_url("Admin/index"); ?>">
                    <img src="https://www.for-ny.org/wp-content/uploads/2017/04/2017-recovery-conference-logo-276x300.png" alt="Logo" style="width:40px;">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("Admin/index"); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Admin/myProfile"); ?>">My profile</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Admin/myConferences"); ?>">My conferences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Admin/conferences"); ?>">Conferences</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("Ajaxsearch/index"); ?>">Search</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('User/logout'); ?>">Logout</a>
                    </li>

                </ul>
                </div>
        </nav>
         <div class="col-3 position-fixed" >
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-home-tab"  href="" role="tab" aria-controls="v-pills-home" >Project</a>
            <a class="nav-link" id="v-pills-profile-tab"  href="<?php echo site_url("Admin/addnewConference"); ?>" role="tab" aria-controls="v-pills-profile" >Add new conference</a>
            <a class="nav-link" id="v-pills-messages-tab" href="<?php echo site_url("Admin/reviewerInvitation"); ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Rewier invitation</a>
        </div>
    </div>
        <div class="container">

