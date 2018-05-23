<?php
/**
 * multiple.php is a postback application designed to provide a 
 * contact form for users to email our clients.  
 * 
 * multiple.php provides a larger form with more elements to provide 
 * a richer example form.
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

#EDIT THE FOLLOWING:
$toAddress = "eric.muzzarelli@seattlecentral.edu";  //place your/your client's email address here
$toName = "Dani Fenske"; //place your client's name here
$website = "Mae Flour";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'config.php'; #site keys go inside your config.php file
include 'contact-lib/contact_include.php'; #complex unsightly code moved here
$response = null;
$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
        handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);             #Here we can enter the data sent into a database in a later version of this file
    ?>
    <!-- START HTML FEEDBACK -->
    <div class="contact-feedback">
        <h2>Your Comments Have Been Received!</h2>
        <p>Thanks for the input!</p>
        <p>We'll respond via email within 12 hours, if you requested information.</p>
    </div>    
    <!-- END HTML FEEDBACK -->        
    <?php
}else{#show form, either for first time, or if data not valid per reCAPTCHA 
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback
 
?>
	<!-- START HTML FORM -->
	<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
	<div>
		<label style="color:#dbfade; opacity: .75">
			Name:<br /><input type="text" name="Name" required="required" placeholder="Full Name (required)" title="Name is required" tabindex="10" size="44" autofocus />
		</label>
	</div>
	<div>	
		<label style="color:#dbfade; opacity: .75">
			Email:<br /><input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email is required" tabindex="20" size="44" />
		</label>
	</div>
	<!-- below change the HTML to your form elements - only 'Name' & 'Email' (above) are significant -->
	<div>	
		<label style="color:#dbfade; opacity: .75">
			What would you like to bake?:<br />
			<select name="What_would_you_like_to_bake?" required="required" title="What would you like to bake is required" tabindex="30">
				<option value="">Choose your baked goods</option>
				<option value="Cookies">Cookies</option>
				<option value="Pie">Pie</option>
				<option value="Cake">Cake</option>
				<option value="Bread">Bread</option>
				<option value="All of them!">All of them!</option>
			</select>
		</label>
	</div>
	
	<div>	
		<fieldset style="color:#dbfade; opacity: .75">
			<legend>What would make you come check us out?</legend>
			<input type="checkbox" name="Interested_In[]" value="Cooking Classes" tabindex="40" /> Cooking Classes <br />
			<input type="checkbox" name="Interested_In[]" value="Catered Meals" /> Catered Meals <br />
			<input type="checkbox" name="Interested_In[]" value="Cookie Competition" /> Cookie Competition <br />
			<input type="checkbox" name="Interested_In[]" value="Unique Baked Goods Show" /> Unique Baked Goods Show <br />
			<input type="checkbox" name="Interested_In[]" value="Other" /> Other <br />
		</fieldset>
        <label style="color:#dbfade; opacity: .75">
			Elaborate:<br /><textarea name="Elaborate" cols="36" rows="4" placeholder="If other please let us know what would bring you in!" tabindex="60"></textarea>
		</label>
	</div>
	
		<div>	
		<fieldset style="color:#dbfade; opacity: .75">
			<legend>Want some email from us?</legend>
			<input type="radio" name="Join_Mailing_List?" value="Yes" 
			required="required" title="Mailing list is required" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Join_Mailing_List?" value="No" /> No <br />
		</fieldset>
	</div>
        
    <!--<div>	
		<fieldset>
			<legend>Want a job?</legend>
			<input type="radio" name="Join_Mailing_List?" value="Yes" 
			required="required" title="Mailing list is required" tabindex="50"  
			/> Yes <br />
			<input type="radio" name="Join_Mailing_List?" value="No" /> No <br />
		</fieldset>
        <label>
			Why should we hire you?<br /><textarea name="Comments" cols="36" rows="4" placeholder="Share your professional experience" tabindex="60"></textarea>
		</label>
	</div>-->
	<div>	
		<label style="color:#dbfade; opacity: .75">
			Comments:<br /><textarea name="Comments" cols="36" rows="4" placeholder="Your comments are important to us!" tabindex="60"></textarea>
		</label>
	</div>	
	<div style="opacity: .75"><?=$feedback?></div>
    <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>" style="opacity: .75"></div>
	<div style="opacity: .75">
		<input type="submit" value="submit" />
	</div>
    </form>
	<!-- END HTML FORM -->
    <script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=en">
    </script>
<?php
}
?>
