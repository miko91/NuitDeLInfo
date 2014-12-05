<div class="page-head">
	<h2>Zone</h2>
	<ol class="breadcrumb">
		<li><a href="/admin">Dashboad</a></li>
		<li class="active">Zone</li>
	</ol>
</div>		
<div class="cl-mcont">
		
	<div class="row">
		<div class="col-md-12">
			<div class="block-flat">
				<form class="form-horizontal" role="form" action="/admin/country/" id="index-form">
					<div class="header">
						<a href="/admin/country/add" class="btn btn-success btn-rad">
							<i class="fa fa-plus-square-o"></i> Add
						</a>
						<button type="submit" name="modifier" id='mod-index' class="btn btn-primary btn-rad">
							<i class="fa fa-edit"></i> Update
						</button>
						<button type="submit" name="supprimer" id='del-index' class="btn btn-danger btn-rad">
							<i class="fa fa-trash-o"></i> Delete
						</button>
						<span id="resultat"></span>
					</div>
					<div class="content">
						<div class="table-responsive">
							<table class="table table-striped table-bordered noColumnDef">
								<thead>
									<tr>
										<th width="50 px"><input id="check_all" type="checkbox"></th>
										<th>Name</th>
										<th>Pays</th>                                  
									</tr>
								</thead>
								<tbody id='tabs'>
									<?php
									//echo '<pre>';print_r($listeClient);echo '</pre>';
									if (is_array($listeZone)) {
										$n = 0;
										foreach($listeZone as $zone) {
											echo "<tr id='".$n."'>";
											echo "\n\t\t\t\t\t\t\t<td>";
											echo "\n\t\t\t\t\t\t\t\t<input name='check[]' id='".$zone->id()."' type='checkbox' value=".base64_encode(serialize($zone))."  data-name='".$zone->libelle()."'>";
											echo "\n\t\t\t\t\t\t\t</td>";
											echo "\n\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t".$zone->libelle()."\n\t\t\t\t\t\t\t</td>";
											echo "\n\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t".$pMan->getUnique($zone->pays())->libelle()."\n\t\t\t\t\t\t\t</td>";
											echo "\n\t\t\t\t\t\t</tr>\n";
											$n++;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
		<form method="post" action="/admin/country/delete" id="modal-delete-form">
			<!-- Modal -->
			<div class="modal fade" tabindex="-1" role="dialog"  id="deleteCli">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<div class="row">
							<div class="col-sm-2 text-center">
								<div class="i-circle danger">
									<i class="fa fa-warning"></i>
								</div>
							</div>
							<div class="col-sm-10">
								<h4>Beware !</h4>
								<p>Are you sure you want to delete the following item(s) :</p>
							</div>
						</div>
						<ul id='list'>
						</ul>
						<input type="hidden" name="count" value="" id="count"/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-danger btn-flat">Delete</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</form>
	</div>
	
</div>