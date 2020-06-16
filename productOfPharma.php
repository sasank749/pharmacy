<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">
	<h1 class="page-header text-center">COURSES CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All COURSES</option>
			<?php
				$sql="select * from coursetype";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['coursetypeid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['coursetypeid'].">".$catrow['coursetypename']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> COURSE</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Logo</th>
				<th>Course Name</th>
				<th>Course Type</th>
				<th>Price</th>
				<th>Description</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE course.coursetypeid = $catid";
					}
					$sql="select * from course left join coursetype on coursetype.coursetypeid=course.coursetypeid $where order by course.coursetypeid asc, coursename asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="30px"></a></td>
							<td><?php echo $row['coursename']; ?></td>
							<td><?php echo $row['coursetypename']; ?></td>
                            <td>&#x20A8; <?php echo number_format($row['price'], 2); ?></td>
							<td><?php echo $row['description']; ?></td>
							
							<td><a href="#editproduct<?php echo $row['courseid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['courseid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('product_modalOfPharma.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modalOfPharma.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'productOfPharma.php';
			}
			else
			{
				window.location = 'productOfPharma.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>