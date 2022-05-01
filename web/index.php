<?php
	include './partials/menu.php';
	?>	

<!DOCTYPE html>
<html>
<head>
	

</head>
<body>



<header>

  <style>

    #intro-example {
      height: 200px;
    }

    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
  </style>
  <div
    id="intro-example"
    class="p-5 text-center bg-image"
    style="background-image: url('https://img.freepik.com/free-vector/stadium-lights-realistic-with-sports-technology-symbols_1284-26848.jpg?t=st=1651397896~exp=1651398496~hmac=83695db97c1de582024621cec515159a80cbf17e7c58f2b24426607e8e1660ed&w=1060');"
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
      <div style = "margin-top:100px; " class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-4">Welcome to CrickUp Live Scores </h1>
          <h5 class="mb-4">Best & leatest cricket score updates </h5>
          <a
            class="btn btn-outline-light btn-lg m-2"
            href="liveScores.php" ""target="_blank"
            role="button"
            
       
          >Live Scores</a>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
	
	<?php
	include './partials/footer.php';
	?>
</body>
</html>