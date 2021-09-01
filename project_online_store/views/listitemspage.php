<?php 

	$key = "";

	if(isset($_GET['key'])){
		$key = $_GET['key'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'adminnavbar.php' ?>

	<div class="container">

		<div class="row mt-3">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb bg-transparent">
				    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">List items</li>
				  </ol>
				</nav>
			</div>
		</div>

		<?php 
			if($key!=""){
		?>
		<div class="row m-2">
			<div class="col-12">
				<h4>Search result for key: "<?php echo $key; ?>"</h4>
			</div>
		</div>
		<?php
			}
		?>

		<table class="table table-hover table-striped table borderless">
			<thead>
				<tr>
					<th>#</th>
					<th>Model</th>
					<th>Producer</th>
					<th>Category</th>
					<th>Price</th>	
					<th>Color</th>	
					<th>Fabric</th>	
					<th width="10%" >Details</th>	
				</tr>
			</thead>
			<tbody>
				<?php 
					$items = $_REQUEST['items'];
					$producers = $_REQUEST['producers'];
					$categories = $_REQUEST['categories'];

					if($items!=null){
						foreach($items as $item){
							$pr = "No Name";
							foreach($producers as $producer){
								if($item->producer===$producer->id){
									$pr = $producer->name;
								}
							}
							$ct = "No Category";
							foreach($categories as $category){
								if($item->category===$category->id){
									$ct = $category->full_name;
								}
							}	
					
				?>
							<tr>
								<td class="font-weight-bold"><?php echo $item->id; ?></td>
								<td><?php echo $item->model; ?></td>
								<td><?php echo $pr; ?></td>
								<td><?php echo $ct; ?></td>
								<td><?php echo $item->price; ?></td>	
								<td><?php echo $item->color; ?></td>	
								<td><?php echo $item->fabric; ?></td>	
								<td><a href="details?id=<?php echo $item->id; ?>" class="btn btn-secondary btn-sm" >DETAILS</a></td>	
							</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>