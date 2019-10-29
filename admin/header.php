<?php 
ob_start();
session_start();
include '../db/connect.php';
if (!isset($_SESSION['admin_login'])) {
	header('location: login.php');
}

$admin = $_SESSION['admin_login'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin cPanel <?php echo function_exists('title') ? '| '.title() : '';  ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/crop/croppie.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/AdminLTE.css">
  <link rel="stylesheet" href="assets/css/_all-skins.min.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BK</b>AP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>cPanel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $admin['name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="">Profile</a></li>
              <li><a href="logout.php" onclick="return confirm('Are you sure wan to logout?')">Logout</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      	 <li>
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?m=product"><i class="fa fa-circle-o"></i> List product</a></li>
            <li><a href="index.php?m=product&a=add"><i class="fa fa-circle-o"></i> Add new product</a></li>
            <li><a href="index.php?m=product&a=category"><i class="fa fa-circle-o"></i> Product category</a></li>
            <li><a href="index.php?m=promo"><i class="fa fa-circle-o"></i> Promotion code</a></li>
          </ul>
        </li>
        <li>
          <a href="index.php?m=order">
            <i class="fa fa-shopping-cart"></i> <span>Order Manager</span>
          </a>
        </li>
       <li>
          <a href="index.php?m=customer">
            <i class="fa fa-users"></i> <span>Customer Manager</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        