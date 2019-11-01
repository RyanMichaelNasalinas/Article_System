<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeIgniter Blog</title>
    <script src="<?php echo base_url();  ?>assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body class="bg-color">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
    <a class="navbar-brand" href="<?php echo base_url(); ?>home">Article System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>home">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>posts">Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>categories">Category</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(!$this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="<?php echo base_url(); ?>users/login">Login</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link btn btn-dark" href="<?php echo base_url(); ?>users/register">Register User</a>
                </li>
                &nbsp;
            <?php endif; ?>
            
            <?php if($this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary text-dark" href="<?php echo base_url(); ?>posts/create" >Create Post</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary text-dark" href="<?php echo base_url(); ?>categories/create" >Create Categories</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-light" href="<?php echo base_url(); ?>users/logout" >Logout</a>
                </li>
            <?php endif; ?>
                
        </ul>

        </div>
    </div>
    </nav>
    <div class="container mt-2">
    <!--Flashmessage user registered-->
    <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('user_registered')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

    <!--Flashmessage post created-->
    <?php if($this->session->flashdata('post_created')): ?>
            <?php echo "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('post_created')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

    <!--Flashmessage post updated-->
    <?php if($this->session->flashdata('post_updated')): ?>
            <?php echo "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('post_updated')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

     <!--Flashmessage post updated-->
     <?php if($this->session->flashdata('category_created')): ?>
            <?php echo "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('category_created')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

     <!--Flashmessage post deleted-->
     <?php if($this->session->flashdata('post_deleted')): ?>
            <?php echo "<div class='alert alert-dismissible alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('post_deleted')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

    <!--Flashmessage login success-->
    <?php if($this->session->flashdata('login_success')): ?>
            <?php echo "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('login_success')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

     <!--Flashmessage login failed-->
     <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo "<div class='alert alert-dismissible alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('login_failed')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>

    <!--Flashmessage logout success-->
    <?php if($this->session->flashdata('logout_success')): ?>
            <?php echo "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('logout_success')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>


    <!--Flashmessage category delete-->
    <?php if($this->session->flashdata('category_deleted')): ?>
            <?php echo "<div class='alert alert-dismissible alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>".$this->session->flashdata('category_deleted')."</strong></a>
                        </div>"; ?>
    <?php endif; ?>


    
    
