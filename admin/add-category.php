<?php 
require_once 'header.php';

require_once "../vendor/autoload.php";

$cat = new App\classes\Category();

if(isset($_POST['save'])){

	$LoginError = $cat->addCategory($_POST);
}

?>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<section class="card">
			<header class="card-header">
				Category Add Forms!
			</header>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group row">
						<label for="category_name">Category Name </label>
						
							<input type="text" class="form-control" id="category_name" name="category" placeholder="Type Your Category Name.." data-validation="required">
		 			</div>
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-4 pt-0">Status</legend>
							<div class="col-sm-8">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="active" value="1" checked="">
									<label class="form-check-label" for="active">
										active
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="inactive" value="0">
									<label class="form-check-label" for="inactive">
										Inactive
									</label>
								</div>
							</div>
						</div>
			 		</fieldset>
				
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" name="save">Save</button>
						</div>
					</div>
					<?php
					if(isset($LoginError)){?>

					<p style="text-align: center;"><?=$LoginError ?></p>

						<?php 
					}?>
				</form>
			</div>
		</section>
	</div>
</div>
<?php require_once 'footer.php';?>