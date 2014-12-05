<div class="cl-mcont">
	<div class="row dash-cols" id="divDash">
		<div class="col-md-12">
			<h1 class="page-header">
				General statistics
				<span class="pull-right">
					<button type="button" class="btn btn-default printDash">
						<i class="fa fa-print"></i>
					</button>
				</span>
			</h1>
		</div>

		<div class="col-lg-6 col-xs-6">
			<div class="block block-primary">
				<div class="header">
					<h2>
						Crisis
					</h2>
				</div>
				<div class="content no-padding ">
					<ul class="items">
						<li>
							Africa
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							Asia
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							Europe
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							Oceania
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							North america
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							South america
							<span class="pull-right">
								0
							</span>
						</li>
					</ul>
				</div>
				<div class="total-data bg-blue">
					<h2>
						Total :
						<span class="pull-right">
							0
						</span>
					</h2>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-xs-6">
			<div class="block block-primary">
				<div class="header">
					<h2>
						Refugees
					</h2>
				</div>
				<div class="content no-padding ">
					<ul class="items">
						<li>
							Africa
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							Asia
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							Europe
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							Oceania
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							North america
							<span class="pull-right">
								0
							</span>
						</li>
						<li>
							South america
							<span class="pull-right">
								0
							</span>
						</li>
					</ul>
				</div>
				<div class="total-data bg-blue">
					<h2>
						Total :
						<span class="pull-right">
							0
						</span>
					</h2>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-xs-6">
			<div class="block block-success">
				<div class="header">
					<h2>
						Commandes à emporter
					</h2>
				</div>
				<div class="content no-padding">
					<table class="green table">
						<thead>
							<tr>
								<th><strong>Client</strong></th>
								<th class="right"><strong>Quantité</strong></th>
								<th class="right"><strong>Prix</strong></th>
							</tr>
						</thead>
						<tbody class="no-border-x">
							<?php
							if(isset($commandes))
							{
								foreach ($commandes['emporte']['commandes'] as $key) {
									echo "<tr>";
									echo "<td>".$key->client()->nom()."</td>";
									echo "<td><span class='pull-right'>".$key->quantite()."</span></td>";
									echo "<td><span class='pull-right'>".number_format($key->prix(), 2, ',', ' ')." €</span></td>";
									echo "</tr>";
								}
							}
							else
							{
								echo "<tr><td rowspan='3'>Aucun élément</td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-xs-6">
			<div class="block block-success">
				<div class="header">
					<h2>
						Commandes en livraisons
					</h2>
				</div>
				<div class="content no-padding">
					<table class="green table">
						<thead>
							<tr>
								<th><strong>Client</strong></th>
								<th class="right"><strong>Quantité</strong></th>
								<th class="right"><strong>Prix</strong></th>
							</tr>
						</thead>
						<tbody class="no-border-x">
							<?php
							if(isset($commandes))
							{
								foreach ($commandes['livraison']['commandes'] as $key) {
									echo "<tr>";
									echo "<td>".$key->client()->nom()."</td>";
									echo "<td><span class='pull-right'>".$key->quantite()."</span></td>";
									echo "<td><span class='pull-right'>".number_format($key->prix(), 2, ',', ' ')." €</span></td>";
									echo "</tr>";
								}
							}
							else
							{
								echo "<tr><td rowspan='3'>Aucun élément</td></tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>