<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : "";?></title>
    <meta name="keywords" content="denis,docquier,traiteur,ban,de,laveline,com,a,la,maison,repas,vosges,saint,die" />
    <meta name="description" content="Com' à la maison vous prépare des repas différents chaque jour à des prix attractifs et fait-maison. A emporter ou en livraison selon secteur." />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, follow" />

    <link rel="shortcut icon" href="/img/favicon.ico" />

    <!-- CSS Files -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="/css/jquery.reject.css" rel="stylesheet" media="screen" />
    <link href="/css/general.css" rel="stylesheet" media="screen" />
    <link href="/css/template.css" rel="stylesheet" media="screen" />
    <link href="/css/responsive.css" rel="stylesheet" media="screen" />
</head>

<body>
<div id="body" class="<?php echo isset($class_front) ? $class_front : "";?>">
    <div id="body-inner">
        <header id="header">
            <div class="container">
                <div class="logo"><a title="" href="/"><img src="/img/lovefood-logo.png" alt=""/></a></div>

                <div class="contact hidden-xs">Reservation: <span><a href="tel:+33<?php echo str_replace(' ','',substr($config->get('info_tel'),1));?>"><?php echo $config->get('info_tel');?></a></span></div>

                <div id="topmenu" class="clear">
                    <div class="left-side"></div>
                    <div class="right-side "></div>

                    <nav class="navbar" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="navbar-brand visible-xs">MENU</span>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav left">
                                <li class="id1"><a href="/">Accueil</a></li>
								<li class="id2"><a href="/menu">Menus</a></li>
								<li class="id3"><a href="/traiteur">Traiteur</a></li>
                            </ul>
                            <ul class="nav navbar-nav right">
                                <li class="id5">
                                    <a href="/about" class="dropdown-toggle">A propos</a>
                                </li>
                                <li class="id6"><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

		<!-- Start info-->
		<?php
		if(isset($info))
		{
		?>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row box3" style="display: block;">
						<h3>
							Informations: 
							<span class="text-info" style="text-transform: none;">
								<?php
								echo $info;
								?>
							</span>
						</h3>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		
		<!-- End info -->
		
        <!-- Start content-->
		<?php echo isset($content) ? $content : "" ?>
		<!-- End content -->

        <footer id="footer-wide">
            <div id="footer" class="container">

                <div class="box4">
                    <div class="inner-border">
                        <h3>Contactez-nous</h3>
                        <form id="contact-form" class="row style1" action="#" method="post">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <input name="name" type="text" id="name" placeholder="Votre nom" required />
                                </div>
                                <div class="form-group">
                                    <input name="number" type="text" id="number" placeholder="Votre numéro" required />
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" id="email" placeholder="Votre email" required />
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-8">
                                <textarea name="message" rows="4" class="h130" id="message" placeholder="Ecrivez votre message..." required></textarea>
                            </div>
                            <div class="clear"></div>
                            <div class="col-md-3 right">
                                <input class="submit btn" type="submit" value="Envoyer votre message" />
                                <input class="modal btn hidden" type="button" value="Envoyez votre message" name="" data-toggle="modal" data-target="#modalBox" />
                            </div>

                            <!-- Modal window -->
                            <div class="modal fade bs-modal-md" id="modalBox" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Votre demande de contact</h4>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn right" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="separator h30"></div>

                <div class="copyright">
                    <div class="left-side"></div>
                    <div class="right-side "></div>
                    <div class="logo left hidden-xxs"><a title="" href="/"><img src="/img/lovefood-logo2.png" alt=""/></a></div>

                    <p>&copy; 2014. Com' à la maison <span class="hidden-xxs">- Tous droits réservés |</span>  <a href="/contact" class="hidden-xs">Où nous trouver ?</a></p>

                    <div class="addthis_toolbox addthis_default_style hidden-xs hidden-sm">
                        <a href='mailto:<?php echo $config->get('info_email');?>' class="addthis_button_email"><span><span></span></span></a>
                    </div>

                    <div class="clear"></div>
                </div>
            </div>

            <a href="#" class="btn-top glyphicon glyphicon-chevron-up hidden-xxs" title='Revenir en haut'></a>
        </footer>
    </div>
</div>

<!-- JS Files -->
<script src="/js/jquery-1.9.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.reject.js"></script>
<script src="/js/general.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</body>
</html>