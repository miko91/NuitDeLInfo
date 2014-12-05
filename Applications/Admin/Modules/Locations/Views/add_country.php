<div class="page-head">
	<h2>Country <small>New country</small></h2>
	<ol class="breadcrumb">
		<li><a href="/admin">Dashboard</a></li>
		<li><a href="/admin/country">Country</a></li>
		<li class="active">New country</li>
	</ol>
</div>
<div class="cl-mcont">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="block-flat">
				<form class="form-horizontal" method="post" action="/admin/country/add" id="edit-form">
					<div class=header>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-success btn-rad" name="submit">
									<i class="fa fa-plus-square-o"></i>
									Add
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
											<option value="<?php echo base64_encode("Africa");?>">Africa</option>
											<option value="<?php echo base64_encode("Asia");?>">Asia</option>
											<option value="<?php echo base64_encode("Europe");?>">Europe</option>
											<option value="<?php echo base64_encode("Oceania");?>">Oceania</option>
											<option value="<?php echo base64_encode("North america");?>">North america</option>
											<option value="<?php echo base64_encode("South america");?>">South america</option>
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