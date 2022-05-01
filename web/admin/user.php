<?php include 'core/init.php'; 
 include '../partials/menu.php'

 ?>
<?php
if (!Session::exists('id') && !Session::exists('name') )
{
	header('Location: ' . 'login.php');	
}
if(Session::get('role')!='super_admin')
{
   header('Location: ' . 'index.php');	
}
if (isset($_GET['made_admin']) && !empty($_GET['made_admin']))
{
	$id = $_GET['made_admin'];
	$result = DB::getConnection()->update("UPDATE admin SET role='admin' WHERE id = $id");
	
	if ($result)
	{
		echo '<p class="alert alert-success">Operation Successful</p>';
	}
	else
	{
		echo '<p class="alert alert-danger">Operation Failed.</p>';
	}
}
if (isset($_GET['remove_admin']) && !empty($_GET['remove_admin']))
{
	$id = $_GET['remove_admin'];
	$result = DB::getConnection()->update("UPDATE admin SET role=NULL WHERE id = $id");
	
	if ($result)
	{
		echo '<p class="alert alert-success">Operation Successful</p>';
	}
	else
	{
		echo '<p class="alert alert-danger">Operation Failed.</p>';
	}
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

<div>
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
	
	echo '<li class="nav-item"><a class="nav-link" href="freeadmin.php">Create Match</a></li>';
	echo '<li class="nav-item"><a class="nav-link" href="user.php">Users</a></li>';
}
if (Session::get('role') != 'super_admin')
{
	echo '<li class="nav-item"><a class="nav-link" href="checkisadminisselected.php">Direct Match</a></li>';
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

  </div>

  <div class="container" style = "margin-top:100px;">
		<table class="table table-default table-hover">
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Operation</th>
			</tr>
<?php
$result = DB::getConnection()->select("SELECT * FROM admin WHERE role != 'super_admin' OR role IS NULL");

foreach ($result as $value) {
	$output = "<tr>";
	$output .= "<td>" . $value['firstname'] . "</td>";
	$output .= "<td>" . $value['username'] . "</td>";
	$output .= "<td>" . $value['email'] . "</td>";
	$output .= "<td>" . $value['role'] . "</td>";
	$output .= "<td><a href='user.php?made_admin=" . $value['id'] . "'>Made Admin</a></td>";
	$output .= "<td><a href='user.php?remove_admin=" . $value['id'] . "'>Remove Admin</a></td>";
	$output .= "</tr>";

	echo $output;	
}
?>
		</table>		
	</div>
	<script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.js"></script>
	
</body>
</html>




<?php 

     include('../partials/footer.php');
  
?>
   