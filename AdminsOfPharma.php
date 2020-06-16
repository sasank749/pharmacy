<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">
	<h1 class="page-header text-center">See The Users</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Time of Registration</th>
			<th>UserName</th>
			<th>email</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Country</th>
			<th>City</th>
			
			<th>Delete User</th>
        </thead>
		<tbody>
			<?php 
				$sql="select * from admin order by id desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['trn_date'])) ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['country']; ?></td>
						<td><?php echo $row['city']; ?></td>
						
				<td><a href="#deleteadmin<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
				<?php include('delete_modalOfAdminPharma.php'); ?>
				</td>


					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>