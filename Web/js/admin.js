$(document).ready(function() {
	"use strict"; 
	
	
    //boostrap menu active item
    var url = String(window.location).split('/');
	url = '/' + url[3] + '/' + url[4];
    $('ul.cl-vnavigation a[href="' + url + '"]').parent().addClass('active');
	

	$('body').delegate('#check_all','click', function () {
		var cases = $('#tabs').find('input[type=checkbox]');
		$(cases).prop('checked', this.checked);
	});

    /*
	*	Fonctions persos
	*	
	*	- Imprimer feuille de jour
	*	- Imprimer menu
	*/
	$('body').delegate('.printDash','click',function(e) {
		e.preventDefault();
		var origin = $('#page').html();

		var head = "<div class='container-fluid' id='pcont'><div class='cl-mcont'>";
		var footer = "</div></div>";
		var dash = $('#divDash').html();

		$('#page').html(head+dash+footer);
		$('.printDash').remove();
		$('.table').addClass('table-bordered table-condensed');
		window.print();
		setTimeout($('#page').html(origin), 500);
		$('body').hide().fadeIn(1500);
		return false;
	});
	
	$('body').delegate('.btn-print-menu','click', function(e) {
		e.preventDefault();
		var origin = $('#page').html();

		var page_header = $('#semaine').html();
		var head_body = "<div id='wrap'>" +
							"<div class='container-fluid'>" +
								"<div class='cl-mcont'>" +
									"<div id='titre_menu' class='row no-margin-y'>" +
										"<div class='col-xs-offset-1 col-xs-3'>" +
											"<img src='/img/logo-coma_8-20.png' alt='rouleau' height='240px'/>" +
											"</div>" +
											"<div class='col-xs-8'>" +
												"</br>" +
												"<div class='print'>" +
													"<h1 class='titre'>" +
														"Com' à la maison" +
													"</h1>" +
												"</div></br>" +
												"<div class='row'>" +
													"<div class='col-xs-offset-1 col-xs-11'>" +
														"<h2 class='titre'>" +
															"Menus <small>"+page_header+"</small>" +
														"</h2>" +
														"<p>" +
															"Fermé le Dimanche après-midi et le Lundi<br>* Il est <strong>vivement conseillé</strong> de réserver vos menus à l'avance." +
														"</p>" +
													"</div>" +
												"</div>" +
											"</div>" +
										"</div>";

		var menu = $('#myMenu').html();

		var footer = "</div><div id='push'></div><footer id='footer'><h3 class='titre'>Com' à la maison vous souhaite un bon appétit !</h3></footer>";
		$('#page').html(head_body+menu+footer);
		$('.row').addClass('no-margin-y');
		$('.page-header').addClass('no-margin-y');
		$('h3').addClass('no-margin-y');
		$('dl').addClass('no-margin-y');
		$('.cl-mcont').addClass('no-padding');
		setTimeout(window.print(), 2000);
		setTimeout($('#page').html(origin), 500);
		return false;
	})




	/**
	*	Ajax funtions
	*	Login, parameters and object forms
	*/
	

	// Formulaire de connexion
	$("#login-form").submit(function(){
		event.preventDefault();
		var val = {
			username: $('#username').val(),
			password: $('#password').val(),
			login: "ok"
		}
		//alert(val.password);
		$.ajax({
			url: $('form').attr('action'),
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				if(data.result == "true")
				{
					$(location).attr('href',data.redirect);
				}
				else
				{
					$('#message').html(data.message).removeClass('text-info').addClass(data.style);
					$("#login-form")[0].reset();
				}
			},
			error:function(){
				$("#message").html('Ajax request error');
				$("#message").addClass('text-danger');
			}   
		}); 
	});
	
	// Formulaire de modification des informations tarifaires
	$("#prix-form").submit(function(){
		event.preventDefault();
		var val = {
			prix_menu: $('#prix_menu').val(),
			prix_livraison: $('#prix_livraison').val(),
			tva: $('#tva').val(),
			save_prix: "ok"
		}
		//alert(val.password);
		$.ajax({
			url: $("#prix-form").attr('action'),
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				if(data.result == "true")
				{
					$.gritter.add({
						title: data.not.title,
						text: data.not.message,
						class_name: data.not.type,
						time: 3500
					});
				}
				else
				{
					$.each(data.form, function(key, value){
						$('#'+value.id).parents('div.form-group').addClass('has-error');
					});
				}
			},
			error:function(){
				$("#message").html('Ajax request error');
				$("#message").addClass('text-danger');
			}   
		}); 
	});
	

	// Formulaire de modification des informations du site publique
	$("#info-form").submit(function(){
		event.preventDefault();
		var val = {
			tel: $('#tel').val(),
			email: $('#email').val(),
			message: $('#message').val(),
			save_info: "ok"
		}
		//alert(val.message);
		$.ajax({
			url: $("#info-form").attr('action'),
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				//console.log(data);
				if(data.result == "true")
				{
					$.gritter.add({
						title: data.not.title,
						text: data.not.message,
						class_name: data.not.type,
						time: 3500
					});
				}
				else
				{
					$.each(data.form, function(key, value){
						$('#'+value.id).parents('div.form-group').addClass('has-error');
					});
				}
			},
			error:function(){
				console.log(data);
				$("#message").html('Ajax request error');
				$("#message").addClass('text-danger');
			}   
		}); 
	});
	
	// Formulaire général d'ajout / de modification
	$("#edit-form").submit(function(){
		event.preventDefault();
		var inputs = $(this).find('input, select, textarea');
		var val = {};
		$.each(inputs, function(key, value){
			val[value.id] = value.value;
		});
		val['edit'] = 'ok';
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				if(data.result == "true")
				{
					$(location).attr('href',data.redirect);
				}
				else
				{
					$('div.form-group').removeClass('has-error');
					$('span.help-block').remove();
					$.each(data.form, function(i, item){
						$('#'+item.id).after('<span class="help-block">'+item.message+'</span>');
						$('#'+item.id).parents('div.form-group').addClass('has-error');
					});
				}
			},
			error:function(){
				$("#resultat").html('Ajax request error');
				$("#resultat").addClass('text-danger');
			}   
		});
	});
	
	// Formulaire de modification liste (client / commande / menu / etc)
	$('#mod-index').click(function(e){
		e.preventDefault();
		var inputs = $('#index-form').find('input[type=checkbox]:checked');
		if(inputs.length < 1)
		{
			$.gritter.add({
				title: 'Warning',
				text: 'You must select one item',
				class_name: 'warning',
				time: 3500
			});
		}
		else if(inputs.length > 1)
		{
			$('input[type=checkbox]').attr('checked', false);
			
			$.gritter.add({
				title: 'Warning',
				text: 'You can modify only one item at a time',
				class_name: 'warning',
				time: 3500
			});
		}
		else
		{
			$(location).attr('href', $("#index-form").attr("action") + 'modify-' + inputs[0].id);
		}
	})
	
	// Formulaire de suppression liste (client / commande / menu / etc)
	$('#del-index').click(function(e){
		e.preventDefault();
		var inputs = $('#index-form').find('input[type="checkbox"]:checked:not("#check_all")');
		if(inputs.length < 1)
		{
			$.gritter.add({
				title: 'Warning',
				text: 'You must select at least one item',
				class_name: 'warning',
				time: 3500
			});
		}
		else
		{
			$('ul#list').html('');
			var i = 0;
			$.each(inputs, function(i, item){
				$('ul#list').append('<li>'+$('#'+item.id).attr('data-name')+'</li>');
				$('ul#list').append('<input type="hidden" name="suppr_'+i+'" value="'+item.value+'">');
				i++;
			});
			$("#count").attr('value', inputs.length);
			$("#deleteCli").modal('show');
		}
	})
	
	// Formulaire de suppression dans modal
	/*
	$("#modal-delete-form").submit(function(){
		event.preventDefault();
		$('#deleteCli').modal('hide');
		var inputs = $(this).find('input');
		var val = {};
		$.each(inputs, function(key, value){
			val[value.id] = value.value;
		});
		val['count'] = inputs.length;
		val['supprimer'] = 'ok';
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				//alert(data);
				$('input[type=checkbox]').attr('checked', false);
				if(data.to_del.length > 0)
				{
					var table = $('.noColumnDef').dataTable();
					$.each(data.to_del, function(i, item){
						table.fnDeleteRow($('#'+item.id).parents('tr').attr('id'));
					});
				}
				$.gritter.add({
					title: data.not.title,
					text: data.not.message,
					class_name: data.not.type,
					time: 3500
				});
			},
			error:function(){
				$("#resultat").html('Ajax request error');
				$("#resultat").addClass('text-danger');
			}
		
		});
	});
*/
	

	// Transformer client classique/régulier
	$('#dir').on('click', function(){
		var val = {
			id: $(this).attr('data-val'),
			mode: $(this).attr('value'),
			toggle: 'ok'
		};
		$.ajax({
			url: '/admin-calm/client/toggle',
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				$('div#info-cli').html(data.to_add);
				$('#dir').prop('value', data.button.value).removeClass(data.button.to_remove).addClass(data.button.to_add).html(data.button.html);
				$.gritter.add({
					title: data.not.title,
					text: data.not.message,
					class_name: data.not.type,
					time: 3500
				});
			},
			error:function(){
				$("#resultat").html('Ajax request error');
				$("#resultat").addClass('text-danger');
			}
		
		});
	});
	
	// Mise à jour planning client régulier
	$('#info-cli').delegate('#planning-form','submit', function(e){
		e.preventDefault();
		var inputs = $(this).find('input');
		var val = {};
		$.each(inputs, function(key, value){
			var tp = $('#'+value.id).prop('type');
			val[value.id] = tp != 'checkbox' ? value.value : $('#'+value.id).prop('checked');
		});
		val['maj'] = 'ok';
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: val,
			dateType: 'json',
			success: function(data){
				//alert(data);
				$.gritter.add({
					title: data.not.title,
					text: data.not.message,
					class_name: data.not.type,
					time: 3500
				});
			},
			error:function(){
				$("#resultat").html('Ajax request error');
				$("#resultat").addClass('text-danger');
			}
		
		});
	});
});