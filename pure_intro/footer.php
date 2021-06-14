<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woafun
 */

?>

<footer class="footer">
        <div class="footer-top">
            <div class="footer-contact">
                <p>Hello@vostroprivate.com.au</p>
                <p>Phone. 03 9867 4345</p>
            </div>
            <ul class="ul-top">
                <li>
                    <div class="footer-head-info">
                        <p>OFFICE</p>
                    </div>
                    <div class="footer-info">
                        <p>49 Cardigan Place</p>
                        <p>Albert Park VIC 3206</p>
                    </div>
                </li>
                <li>
                    <div class="footer-head-info">
                        <p>PO BOX</p>
                    </div>
                    <div class="footer-info">
                        <p>PO Box 629 South</p>
                        <p>Melbourne VIC 3205</p>
                    </div>
                </li>
                <li>
                    <div class="footer-head-info">
                        <p>SOCIAL</p>
                    </div>
                    <div class="footer-info">
                        <p>LinkedIn</p>
                        <p>Facebook</p>
                    </div>
                </li>
            </ul>
        </div>
		
        <?php //echo do_shortcode('[mc4wp_form id="36"]')?>
		<div class="burgundy">
            <div class="burgundy-head">
                <p>JOIN OUR MAILING LIST</p>
            </div>
            
            <div class="footer-input-wrapper">
                 <?= do_shortcode('[email-subscribers-form id="1"]')?>
            </div>
            
        </div>
		<script>
		jQuery('footer .es_subscription_form input[name="email"]').change(function(){
			jQuery(this).parents('form').submit();
		});
		</script>
		<style>
			footer .burgundy .emaillist{width:100%}
			footer .es_subscription_form .emaillist .es-field-wrap{margin-bottom:0}
			footer .es_subscription_form .emaillist .es_subscription_message{color:white !important;}
			footer .es_subscription_form .es_txt_email{
				width: 100%;
				background-color: #FAFAFA;
				border: 0.1rem solid #98262b;
				box-sizing: border-box;
				border-radius: 10rem;
				padding-top: 1rem;
				padding-left: 2.3rem;
				padding-bottom: 1rem;
				padding-right: 32.6rem;
				outline: none;				
				letter-spacing: 0.01em;
				color: #98262b;
				font-family: "Inter", sans-serif;
			}
			footer .es_subscription_form .es_txt_email::after {
				content: "\2192";
				position: absolute;
				top: 3rem;
				right: 1.5rem;
				font-size: 2rem;
			}
			footer .es_subscription_form .es_subscription_form_submit {
				display:none;
			}
		</style>
       
		
        <div class="footer-bot">
            <ul class="footer-bot-list-1">
                <li>© 2021 Vostro Private Wealth</li>
                <li>FINANCIAL SERVICES GUIDE</li>
            </ul>
            <ul class="footer-bot-list-2">
                <li>ADVICE WARNING</li>
                <li>LEGAL NOTICE</li>
                <li>COMPLAINT RESOLUTION</li>
                <li>PRIVACY POLICY</li>
            </ul>
        </div>
    </footer>
	

<script src="<?= FVN_THEME_URL?>js/header.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?= FVN_THEME_URL?>js/init-animation.js"></script>
<?php wp_footer(); ?>

</body>
</html>
