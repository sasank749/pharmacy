<?php include('headerOfPharma.php'); ?>
<body>
<?php include('navbarOfPharma.php'); ?>
<div class="container">
	<h1 class="page-header text-center">Course Sales</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date Of Buying</th>
			<th>Student Name</th>
			<th>Total Price</th>
			<th>Details of Buyings</th>
			<th>Delete Buying details</th>
        </thead>
		<tbody>
			<?php 
				$sql="select * from purchase order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#x20A8; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
						<?php include('sales_modalOfPharma.php'); ?>
							
						
				<td><a href="deletesalesOfPharma.php?product=<?php echo $row['purchaseid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a></td>


					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
<?php include 'footerOfPharma.php'?>

</html>