<div class="page-head">
	<h2>Country <small>Modify country</small></h2>
	<ol class="breadcrumb">
		<li><a href="/admin">Dashboard</a></li>
		<li><a href="/admin/country">Country</a></li>
		<li class="active">Modify country <?php echo $pays->id();?></li>
	</ol>
</div>
<div class="cl-mcont">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="block-flat">
				<form class="form-horizontal" method="post" action="/admin/country/modify-<?php echo $pays->id()?>" id="edit-form">
					<div class=header>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-primary btn-rad" name="submit">
									<i class="fa fa-edit"></i>
									Modify
								</button>
								<a href="/admin/country" class="btn btn-default btn-rad">Cancel</a>
							</div>
						</div>
					</div>
					<div class="content">
					
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label for="continent" class="col-sm-2 control-label">Continent</label>
									<div class="col-sm-10">
										<select class="form-control" id="continent" name="continent">
											<?php
												foreach ($cont as $key => $value) {
													$select = $key == $pays->continent() ? "selected" : "";
													echo "<option value='".$value."' ".$select.">".$key."</option>";
												}
											?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="name" name="name" placeholder="France" value="<?php echo isset($pays) ? $pays->libelle() : "";?>">
										<?php
										if (isset($erreurs) && isset($erreurs["libelle"]))
										{
											echo '<span class="text-danger">'.$erreurs["libelle"].'</span>';
										}
										?>
									</div>
									
								</div>
							</div>
							
						</div>
					
					</div>
				</form>
			</div>				
		</div>
	</div>
</div>