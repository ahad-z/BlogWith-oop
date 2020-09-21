<?php 
require_once 'header.php';

require_once "../vendor/autoload.php";
	$tbleName = 'category';
$cat = new App\classes\Category();
	$id =$_GET['id'];
	$catData = $cat->showCategory($id,$tbleName);
	$row = mysqli_fetch_assoc($catData);

if(isset($_POST['update'])){

	$ErrorMsg=$cat->editCategory($_POST,$tbleName);
	
	
}

?>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<section class="card">
			<header class="card-header">
				Update Category!
			</header>
			<div class="card-body">
				<form action="" method="POST">
					<input type="hidden" name="id" value="<?=$row['id']?>">
					<div class="form-group row">
						<label for="category_name" class="col-sm-4 col-form-label">Category Name </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="category_name" name="category" placeholder="Type Your Category Name.." value="<?=$row['category_name']?>">
						</div>
		 			</div>
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-4 pt-0">Status</legend>
							<div class="col-sm-8">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="active" value="1"  <?=$row['status']== '1' ? 'checked':'' ?>>
									<label class="form-check-label" for="active">
										active
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?=$row['status']== '0' ? 'checked':'' ?>>
									<label class="form-check-label" for="inactive">
										Inactive
									</label>
								</div>
							</div>
						</div>
			 		</fieldset>
				
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" name="update">Update</button>
						</div>
					</div>
				<?php
					if(isset($_SESSION['msg'])){

						echo $_SESSION['msg'];
						}
						unset($_SESSION['msg']);
						?>


			
				</form>
			</div>
		</section>
	</div>
</div>

<?php require_once 'footer.php';?>