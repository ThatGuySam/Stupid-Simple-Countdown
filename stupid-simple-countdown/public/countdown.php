<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://samcarlton.com/
 * @since      1.0.0
 *
 * @package    Stupid_Simple_Countdown
 * @subpackage Stupid_Simple_Countdown/public
 */

	class Countdown {
		static $add_script;
	
		static function init() {
			add_shortcode('countdown', array(__CLASS__, 'handle_shortcode'));
	
			add_action('init', array(__CLASS__, 'register_script'));
			
			add_action('wp_footer', array(__CLASS__, 'print_script'));
			
			add_action('wp_footer', array(__CLASS__, 'internal_script') );
		}
	
		static function handle_shortcode($atts) {
			self::$add_script = true;
			
			extract( shortcode_atts( array(
				'class' => false,
				'to' => false,
				'link' => false,//TODO
				'complete' => false,//TODO
				'complete-link' => false,//TODO
			), $atts, 'countdown' ) );
			
				$to = '25 December 2016';
			    
			    //Parse next event date into js friendly date
			    $to_js_formatted = date( 'Y/m/d H:i:00', strtotime($to) );
			
			ob_start();
			?>
				<span class="countdown" data-to="<?php echo $to_js_formatted; ?>" >date:</span>
			<?php
			$content = ob_get_clean();
				
			return $content;
		}
	
		static function register_script() {
			
			//JS
			//wp_register_script('inheritance', '//gutslibraries.s3.amazonaws.com/inheritance/1.0.0/jquery.plugin.min.js', array('jquery'), '1.0.0', true);
			wp_register_script('countdown', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.1.0/jquery.countdown.min.js', array('jquery'), '2.1.0', true);
		}
	
		static function print_script() {
			if ( ! self::$add_script )
				return;
				
				//JS
				//wp_print_scripts('inheritance');
				wp_print_scripts('countdown');
		}
		
		static function internal_script() {
			if ( ! self::$add_script )
				return;
			?>
				
				<style>
					
					.countdown { 
						width: 100%;
						height: auto;
						text-align: center;
						padding: 40px 0;
					}
					
					.countdown a {
						text-decoration: none;
					}
					
					.countdown .live {
						text-shadow: 0 0 3px #ff0000;
						color: #ffffff;
					}
					
				</style>
				
				<script>
					(function( $ ) {
						'use strict';
						
						$('.countdown').each( function(){
							
							var $countdown_el = $(this);
				
							var to = $countdown_el.data("to");
							
							var completeMessage = 'Live Now';
							
							$countdown_el.countdown( to )
								.on('update.countdown', function(event) {
									
									//Unites to dislpay
									//[ shorthand, unit, displayUnit ]
									var timeUnits = [
										['Y','year','yr'],
										['m','month','mon'],
										['d','day','day'],
										['H','hour','hr'],
										['M','minute','min'],
									];
									
									var count_text = "";
									
									for (var i=0; i < timeUnits.length; ++i) {//Add timeUnits if they aren't 0
										
										var shorthand =		timeUnits[i][2];
										var unit =			timeUnits[i][1];
										var displayUnit =	timeUnits[i][0];
										
										//hilios.github.io/jQuery.countdown/documentation.html#event-object
										if( event.offset[(unit+"s")] ){
											count_text += '<span>%-'+displayUnit+'</span> <small>'+shorthand+'%!'+displayUnit+'</small> ';
										}
											
									}
									
									
									count_text += '<span>%-S</span> <small>sec%!S</small> ';//Add Seconds
									
									var $this = $countdown_el.html(event.strftime( count_text ));
								})
								.on('finish.countdown', function(event) {
									
									console.log( "Countdown finished" );
									
									var $this = $countdown_el.html( '<span class="live">'+completeMessage+'<span class="live">' );
									
								});
						
						});
						
					
					})( jQuery );

					
					
				</script>
				
			<?php
		}
	}
	
	Countdown::init();
