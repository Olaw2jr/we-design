<?php
/*
Template Name: Contact Form
*/
?>


<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'You forgot to enter your message.';
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

			$emailTo = 'oscar.eugine@gmail.com';
			$subject = 'Contact Form Submission from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'You emailed Your Name';
				$headers = 'From: Oscah Olotu <noreply@olaw2jr.co.tz>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>


<?php get_header(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/contact-form.js"></script>


<!--=== Breadcrumbs ===-->
<header class="well">
<div class="container">
  <?php olaw2jr_breadcrumbs(); ?>
</div>
</header>
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="section4" id="section4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

					<?php if(isset($emailSent) && $emailSent == true) { ?>
						<div class="alert alert-success">
					        <strong>Thanks, <?=$name;?>!</strong> Your email was successfully sent. I will be in touch soon.
					    </div>

					<?php } else { ?>

						<?php if (have_posts()) : ?>
						
						<?php while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1> <hr>  
                      
                </div>
            </div>

		<div class="row">
            <div class="col-md-6">
                <p><?php the_content(); ?></p>   
                <p><span>Email: </span> hello@wedesign.co.tz</p>
                <p><span>Phone: </span> (255) 714 667 787</p>
                    
                <div class="social">
                    <a target="_blank" href="https://twitter.com/olaw2jr"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                    <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>
                
            <div class="col-md-6 offset1">
		
		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<div class="alert alert-danger">
		        <strong>There is an error!</strong> Change a few things up and try submitting again.
		    </div>
		<?php } ?>
	
		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
	
			<ol class="list-unstyled">
				<li class="form-group">
                <label for="contactName">Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
                    <?php if($nameError != '') { ?>
                        <span class="alert-warning"><?=$nameError;?></span> 
                    <?php } ?>
                </li>
				
				<li class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="Enter email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
                    <?php if($emailError != '') { ?>
                        <span class="alert-warning"><?=$emailError;?></span>
                    <?php } ?>
                </li>

                <li class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Enter phone" name="phone" id="phone" value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>" class="" />
                </li>
				
				<li class="form-group">
                    <label for="commentsText">Message</label>
                    <textarea class="form-control" name="comments" placeholder="Enter message" id="commentsText" rows="4"class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                    <?php if($commentError != '') { ?>
                        <span class="alert-warning"><?=$commentError;?></span> 
                    <?php } ?>
                </li>

				<li class="checkbox">
					<input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> />
					<label for="sendCopy">Send a copy of this email to yourself</label>
				</li>

				<li class="form-group">
					<label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label>
					<input type="text" class="form-control" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" />
				</li>

				<li class="buttons">
					<input type="hidden" name="submitted" id="submitted" value="true"/>
					<button type="submit" class="btn btn-primary" >Send Mail</button>
				</li>
			</ol>
		</form>

		</div> 
            </div><hr>
            
            
        </div>
    </div>
<!--=== End Content Part ===-->
	
		<?php endwhile; ?>
	<?php endif; ?>
<?php } ?>

<?php get_footer(); ?>
	