<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">

	<h1 class="page-header text-center">PHARMA COURSES</h1>
	<ul class="nav nav-tabs">
		<?php
			$sql="select * from coursetype order by coursetypeid asc limit 1";
			$fquery=$conn->query($sql);
			$frow=$fquery->fetch_array();
			?>
				<li class="active"><a data-toggle="tab" href="#<?php echo $frow['coursetypename'] ?>"><?php echo $frow['coursetypename'] ?></a></li>
			<?php

			$sql="select * from coursetype order by coursetypeid asc";
			$nquery=$conn->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from coursetype order by coursetypeid asc limit 1, $num";
			$query=$conn->query($sql);
			while($row=$query->fetch_array()){
				?>
				<li><a data-toggle="tab" href="#<?php echo $row['coursetypename'] ?>"><?php echo $row['coursetypename'] ?></a></li>
				<?php
			}
		?>
	</ul>

	<div class="tab-content">
		<?php
			$sql="select * from coursetype order by coursetypeid asc limit 1";
			$fquery=$conn->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
				<div id="<?php echo $ftrow['coursetypename']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
					<?php

						$sql="select * from course where coursetypeid='".$ftrow['coursetypeid']."'";
						$pfquery=$conn->query($sql);
						$inc=4;
						while($pfrow=$pfquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
										<a href="http://localhost:8012//informationOfPharma.php"><b><?php echo $pfrow['coursename']; ?></b></a>

											
										</div>
										<div class="panel-body">
											<img src="<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>" height="80px;" width="90%">
														<b><?php echo $pfrow['description']; ?></b>

										</div>
										<div class="panel-footer text-center">
											&#x20A8; <a href="http://localhost:8012//orderOfPharma.php"><?php echo number_format($pfrow['price'], 2); ?></a>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
			<?php

			$sql="select * from coursetype order by coursetypeid asc";
			$tquery=$conn->query($sql);
			$tnum=$tquery->num_rows-1;

			$sql="select * from coursetype order by coursetypeid asc limit 1, $tnum";
			$cquery=$conn->query($sql);
			while($trow=$cquery->fetch_array()){
				?>
				<div id="<?php echo $trow['coursetypename']; ?>" class="tab-pane fade" style="margin-top:20px;">
					<?php

						$sql="select * from course where coursetypeid='".$trow['coursetypeid']."'";
						$pquery=$conn->query($sql);
						$inc=4;
						while($prow=$pquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
										<a href="http://localhost:8012//informationOfpharma.php"><b><?php echo $prow['coursename']; ?></b></a>
										</div>
										<div class="panel-body">
											<img src="<?php if($prow['photo']==''){echo "upload/noimage.jpg";} else{echo $prow['photo'];} ?>" height="80px;" width="90%">
												<b><?php echo $prow['description']; ?></b>

										</div>
										<div class="panel-footer text-center">
											&#x20A8; <a href="http://localhost:8012//orderOfPharma.php"><?php echo number_format($prow['price'], 2); ?></a>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
		    	</div>
				<?php
			}
		?>
	</div>
	
</div>
</body>
<?php include('footerOfPharma.php'); ?>
</html>

