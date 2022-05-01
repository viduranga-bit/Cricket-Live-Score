<?php 
include 'core/init.php';
include '../partials/menu.php'   
?>
<?php
if (Session::exists('id') && Session::exists('name') )
{
	header('Location: ' . 'index.php');	
	echo Session::get('message');
	Session::set('message', null);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$v = new Validation();
	if ($v->check(array($username, $password)))
	{
		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$result = DB::getConnection()->selectFirstRow($sql);

		if ($result)
		{
			if ($result['role'] != null)
			{
				Session::set('id', $result["id"]);
				Session::set('name', $result['firstname']);
				Session::set('role', $result["role"]);
			
				header('Location: ' . 'index.php');	
			}
			else
			{
				echo '<p class="alert alert-danger">You are not active user.</p>';		
			}
			
		}
		else
		{
			echo '<p class="alert alert-danger">Username or Password is wrong.</p>';	
		}
	}
	else {
		echo '<p class="alert alert-danger">Username or Password can not be empty.</p>';
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<div class=" p-4 d-flex justify-content-center">
     <form  action="" method="POST" class="p-5 rounded shadow">
         <h1 class="text-center pb-4 display-4">Login</h1>

    </br></br>
  <div class="mb-3">
    <label  class="form-label">User Name</label>
    <input  placeholder="Enter your User Name" type="text" class="form-control" name="username" >
    
  </div>
  
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input placeholder="Enter your Password" type="password" class="form-control" name="password">
  </div>
  <div class="form-group">
					<p><a href="register.php">not a member register now</a></p>
					<p><a href="forget-password.php">forget password</a></p>
				</div>
    
	<button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
</form>
<script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.js"></script>




	
</body>
</html>
     </div>

<?php 

     include('../partials/footer.php');
  
?>
</html>



