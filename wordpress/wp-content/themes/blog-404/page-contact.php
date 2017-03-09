<?php get_header();?>  
<?php
				 if(isset($_POST['submitted'])) {

						//Check to make sure that the name field is not empty
						if(trim($_POST['contactName']) === '') {
							$nameError = 'Indiquez votre nom.';
							$hasError = true;
						} else {
							$name = trim($_POST['contactName']);
						}


						//Check to make sure sure that a valid email address is submitted
						if(trim($_POST['email']) === '')  {
							$emailError = 'Indiquez une adresse e-mail valide.';
							$hasError = true;
						}
						else if (!filter_var(trim($_POST['email'], FILTER_VALIDATE_EMAIL))) {
							$emailError = 'Adresse e-mail invalide.';
							$hasError = true;
						}
						 else {
							$email = trim($_POST['email']);
						}

						//Check to make sure comments were entered
						if(trim($_POST['comments']) === '') {
							$commentError = 'Entrez votre message.';
							$hasError = true;
						} else {
							if(function_exists('stripslashes')) {
								$comments = stripslashes(trim($_POST['comments']));
							} else {
								$comments = trim($_POST['comments']);
							}
						}

						//If there is no error, send the email
						if(!isset($hasError)) {

							// récupération des infos de contact de l'association
							// query_posts(array('post_type'=>'formulaire'));
							// if ( have_posts() ){
							// 		the_post();
							// 		global $post;

							$admin_email = get_option( 'admin_email' );
							$emailTo = $admin_email;
							// $emailTo = $post->_emailcontact;
							$subject = 'Formulaire de contact de '.$name;
							$sendCopy = trim($_POST['sendCopy']);
							$body = 'Formulaire de contact depuis le site http://www.accesscodeschool.fr';
							$body .= "\n\rNom: $name \n\nEmail: $email \n\nMessage : $comments";
							$headers = 'From: '.$emailTo . "\r\n" .
												'Reply-To: '.$email . "\r\n" .
												// 'Bcc: '.$admin_email . "\r\n" .
												'X-Mailer: PHP/' . phpversion();

							mail($emailTo, $subject, $body, $headers);

							if($sendCopy == true) {
								$subject = 'Formulaire de contact';
								
								$headers = 'From: '.$emailTo . "\r\n" .
	     										'Reply-To: '.$email . "\r\n" .
	     										'X-Mailer: PHP/' . phpversion();

								mail($email, $subject, $body, $headers);
							}

							$emailSent = true;

						}  }  // FIN IF POST SUBMITTED   // fin send the email
						?>

						<!-- formulaire -->
						<div class="container contact" id="join">

	<?php
						if(isset($emailSent) && $emailSent == true) { ?>

				 	<div class="thanks" id="form">
				 		<h1>Merci, <?=$name;?></h1>
				 		<p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse dans les meilleurs délais.</p>
				 	</div>

				 <?php } else { ?>



				 		<?php if(isset($hasError)) { ?>
				 			<p class="error">Une erreur est survenue lors de l'envoi du formulaire.</p>
				 		<?php } ?>

						<form method="post" action="#form" id="contact_form"  class="well form-horizontal" onsubmit=" return verification();">
							<h1>Formulaire de contact</h1>
							<fieldset>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input class="form-control" type="text" name="contactName" id="nom" placeholder="votre nom et prénom*" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>"/>
									<?php if($nameError != '') { ?>
										<span class="error"><?=$nameError;?></span>
									<?php } ?>
								</div>

								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input class="form-control" type="email" name="email" id="email" placeholder="votre email *" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>"/>
									<?php if($emailError != '') { ?>
				 						<span class="error"><?=$emailError;?></span>
				 					<?php } ?>
								</div>
							</fieldset>

							<fieldset>
								<textarea  name="comments" class="form-control message center-block" rows="12" placeholder="Ecrivez votre message ici..."><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								<?php if($commentError != '') { ?>
									<span class="error"><?=$commentError;?></span>
								<?php } ?>
							</fieldset>
							<fieldset class="input-group">
								<input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> />
								<label for="sendCopy">Recevoir une copie du message</label>
							</fieldset>
							<div class="form-group">
								<label class="col-md-4 control-label"></label>
								<div class="col-md-4">
									<input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit" class="btn center-block">Envoyer <span class="glyphicon glyphicon-send"></span></button>
								</div>
							</div>
						</form>
					</div>

				 <?php  }

				 ?>
<?php get_footer(); ?>