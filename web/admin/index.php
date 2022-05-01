<?php 
include './core/init.php'; 
include '../partials/menu.php'; 
if (!Session::exists('id') && !Session::exists('name') )
{
	header('Location: ' . 'login.php');	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>
	
</head>

<body>

		
	</div>
	<script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.js"></script>
	<script type="text/javascript" src="resources/js/view.js"></script>
	

  <header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 800px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 400px;
      }
    }
  </style>

<nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand mt-0 mt-lg-0" href="#">
          <img
            src="./images/logo.png"
            height="40"
            width="70"
            alt="crick Logo"
            loading="lazy"
          />
        </a>
        <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <!-- Navbar brand -->
    
        <!-- Left links -->
        <ul class="navbar-nav  navbar-nav mb-2 mb-lg-0 ">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
		  <?php
if (Session::get('role') == 'super_admin')
{
	
	echo '<li class="nav-item"><a class="nav-link" href="selectadmin.php">Assign Admin</a></li>';
	echo '<li class="nav-item"><a class="nav-link" href="freeadmin.php">Create Match</a></li>';
	echo '<li class="nav-item"><a class="nav-link" href="user.php">Users</a></li>';
}
if (Session::get('role') != 'super_admin')
{
	echo '<li class="nav-item"><a class="nav-link" href="selectopenningbatsman.php">Direct Match</a></li>';
}
?>
      </div>

	  <ul class="navbar-nav ms-auto d-flex flex-row">
         
         
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPFNeUn89NkscCQdePBFlIp7ixL81eU9pY3g&usqp=CAU"
              class="rounded-circle"
              height="40"
              width="40"
             
            />
			<li class="nav-item"><a class="nav-link" href="#"><?php echo Session::get('name');?></a></li>
			<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>  
       
        
         
        
          
      <div class=" time pb-2" id="runningTime" style="font-size: 20px ; font-weight:1000;"></div>
    </div>
    <!-- Container wrapper -->
  </nav>

  <div
    id="intro-example"
    class="p-5 text-center bg-image"
    style="background-image: url('https://img.freepik.com/free-vector/realistic-bright-stadium-arena-lights_52683-30566.jpg?t=st=1651423213~exp=1651423813~hmac=1c04c10f416a6dfacf10c2e4e928e8bec59d362da4199f58abdf2bf80819bdb4&w=900'); height:460px; margin-top:60px;"
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
      <div style = "margin-top:100px; " class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Welcome to CrickUp Admin panel</h1>
          <h5 class="mb-4">You can create match now</h5>
          <a
            class="btn btn-outline-light btn-lg m-2"
            href="freeadmin.php"
            role="button"
          >Create Match</a
          >
         
          
        
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
</body>

</html>

<?php 

     include('../partials/footer.php');
  
?>
   
