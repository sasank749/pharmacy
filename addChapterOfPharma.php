<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">
	<h1 class="page-header text-center">CHAPTERS CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All CHAPTERS</option>
			<?php
				$sql="select * from course";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['courseid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['courseid'].">".$catrow['coursename']."</option>";
				}
			?>
			</select>
			<a href="#addchapter" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> CHAPTER</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				
				<th>chapter Name</th>
				<th>Course </th>
				<th>ACTION</th>
				
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE chapter.courseid = $catid";
					}
					$sql="select * from chapter left join course on course.courseid=chapter.courseid $where order by chapter.courseid asc, chaptername asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['chaptername']; ?></td>
							<td><?php echo $row['coursename']; ?></td>
							
							<td><a href="#editchapter<?php echo $row['chapterid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deletechapter<?php echo $row['chapterid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('chapter_modalOfPharma.php'); ?>
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
				window.location = 'addChapterOfPharma.php';
			}
			else
			{
				window.location = 'addChapterOfPharma.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>