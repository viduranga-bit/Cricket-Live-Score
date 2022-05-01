<?php include 'admin/core/init.php';
   include './partials/menu.php';
?>
<?php
class activeMatch
{
   public function activeTeam()
   {
     $sql="SELECT * FROM m_atch WHERE isActive=1";
     return $result=DB::getConnection()->select($sql);
   }
}
$active=new activeMatch();
$result1=$active->activeTeam();
?>
<!DOCTYPE html>
<html>
<head>
<link   rel="stylesheet" href="css/style.css" type="text/css"> </link>
  <meta http-equiv="refresh" content="5;url=http://localhost/CSEKU_SDP_2017_ScoreUpdate/web/liveScores.php" />
	<title> Live Scores </title>
  <header>
  <!-- Navbar -->
 
  <!-- Navbar -->

  <!-- Background image -->
  <div
    class="p-3 text-center bg-image"
    style="
      background-image: url('https://img.freepik.com/free-vector/realistic-bright-stadium-lights_52683-30969.jpg?t=st=1651415881~exp=1651416481~hmac=45df0c1d440c7e22f09e8e8e3f328b16567b0816ff0158b6a949a2e143769246&w=900');
      height: 100px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0);">
      <div class="d-flex justify-content-left align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-2">Live Scores </h1>
         
          
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
</head>
<body>
<div>
	

  


	<section>
  	<?php
      foreach ($result1 as $value) 
      {
      	 $matchid=$value['match_id'];
      	 $tossid=$value['toss'];
      	 $teamAid=$value['team_Aid'];
      	 $teamBid=$value['team_Bid'];
      	 $teamAname=$value['team_Aname'];
      	 $teamBname=$value['team_Bname'];
      	 $teamAruns=0;
      	 $teamBruns=0;
      	 $teamAwickets=0;
      	 $teamBwickets=0;
      	 $extrawicket=0;
         $overs=0;
      	 echo '<div class="match">';
      	 echo "<h1><a href='details.php?match_id=" . $matchid . "'>" . $teamAname . " Vs " . $teamBname . "</a></h1>";
      	 if($tossid==$teamAid)
      	 {
      	 	echo "<p>".$teamAname." ";
      	 }
         else
         {
          echo "<p>".$teamBname." ";
         }
      	 $sql="SELECT * FROM status WHERE match_id=$matchid AND toss!=$tossid";
      	 $result2=DB::getConnection()->select($sql);
      	 if($result2)
      	 {
      	 	foreach ($result2 as $value1)
      	    {
              $teamAruns+=$value1['bowlruns'];
              $teamAwickets+=$value1['wicket'];
              $extrawicket+=$value1['extra_wicket'];
              $overs+=$value1['bowled_overs'];
      	    }
            $ov=0;
            $over=0;
            if($overs!=0)
            {
               $ov=$overs%6;
               $over=intval($overs/6);
            }
      	    $teamAwickets+=$extrawicket;
      	    echo $teamAruns." / ".$teamAwickets.' ('.
            'Ovs '.$over.'.'.$ov.')'.'</p>';
      	 }

         $sql="SELECT * FROM status WHERE match_id=$matchid AND toss=$tossid";
         $result2=DB::getConnection()->select($sql);
         if($result2)
         {
          $extrawicket=0;
          $overs=0;
          foreach ($result2 as $value1)
            {
              $teamBruns+=$value1['bowlruns'];
              $teamBwickets+=$value1['wicket'];
              $extrawicket+=$value1['extra_wicket'];
              $overs+=$value1['bowled_overs'];
            }

            $ov=0;
            $over=0;
            if($overs!=0)
            {
               $ov=$overs%6;
               $over=intval($overs/6);
            }
            $teamBwickets+=$extrawicket;
            if($tossid!=$teamAid && $teamBruns>0 ||$tossid!=$teamAid && $overs>0)
            {
              echo "<p>".$teamAname." ";
              echo $teamBruns." / ".$teamBwickets.' ('.
             'Ovs '.$over.'.'.$ov.')'.'</p>';
            }
            else if($tossid!=$teamBid && $teamBruns>0 ||$tossid!=$teamAid && $overs>0)
            {
              echo "<p>".$teamBname." ";
              echo $teamBruns." / ".$teamBwickets.' ('.
             'Ovs '.$over.'.'.$ov.')'.'</p>';
            }
            
         }

      	 echo '</div>';
      }

    ?>

  	<div style="clear: both;"></div>

   
</section>
	
	<footer>
 
	</footer>
</body>

</html>

