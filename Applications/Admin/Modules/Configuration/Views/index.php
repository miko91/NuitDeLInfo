<div class="page-head">
	<h2>Configuration</h2>
	<ol class="breadcrumb">
		<li><a href="/admin-calm">Tableau de bord</a></li>
		<li class="active">Configuration</li>
	</ol>
</div>
<div class="cl-mcont">
	<div class="row">
		
		<div class="col-sm-6 col-md-6">
			<div class="block-flat">
				<div class="header">							
					<h3>Tarifs</h3>
				</div>
				<div class="content">

					<form class="form-horizontal" role="form" action="/admin-calm/configuration" id="prix-form">
						<div class="form-group">
							<label for="prix_menu" class="col-sm-2 control-label">Menu</label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" id="prix_menu" name="prix_menu" placeholder="8.20" value="<?php echo isset($prix) ? $prix->value() : "" ?>">
									<span class="input-group-addon">€</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="prix_livraison" class="col-sm-2 control-label">Livraison</label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" id="prix_livraison" name="prix_livraison" placeholder="0.50" value="<?php echo isset($supp) ? $supp->value() : "" ?>">
									<span class="input-group-addon">€</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="tva" class="col-sm-2 control-label">TVA</label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" id="tva" name="tva" placeholder="20" value="<?php echo isset($tva) ? $tva->value() : "" ?>">
									<span class="input-group-addon">%</span>
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Enregistrer</button>
							</div>
						</div>
					</form>
          
				</div>
			</div>				
		</div>
		
		<div class="col-sm-6 col-md-6">
			<div class="block-flat">
				<div class="header">							
					<h3>Information site publique</h3>
				</div>
				<div class="content">

					<form class="form-horizontal" role="form" action="/admin-calm/configuration" id="info-form">
						<div class="form-group">
							<label for="tel" class="col-sm-2 control-label">Téléphone</label>
							<div class="col-sm-10">
								<input type="text" data-mask="phone-fr" class="form-control" id="tel" name="tel" placeholder="03 09 08 27 38" value="<?php echo isset($config) ? $config->get('info_tel') : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" placeholder="mail@domain.fr" value="<?php echo isset($config) ? $config->get('info_email') : "" ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="tva" class="col-sm-2 control-label">Message</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="4" id="message" name="message"><?php echo isset($config) ? $config->get('info_message') : "" ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Enregistrer</button>
							</div>
						</div>
					</form>
          
				</div>
			</div>				
		</div>
	</div>
</div>