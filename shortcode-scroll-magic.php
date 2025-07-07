<?php 
/********
THIS IS THE CART JS AND CSS SCRIPTS
************************************
***************************************/
function wb_mm_scrollmagic_register_css_js(){
 
    wp_register_style("scrollmagic-main-shortcode-css", get_stylesheet_directory_uri() . '/scroll-magic-shortcode/css/accordion.css', array(), "1.0", "all");   
	
	wp_register_script("scrollmagic-shortcode-script", get_stylesheet_directory_uri() . '/scroll-magic-shortcode/js/ScrollMagic.min.js', array('jquery'), "1.0", false);  
	
    wp_register_script("debug-addIndicators-shortcode-script", get_stylesheet_directory_uri() . '/scroll-magic-shortcode/js/debug.addIndicators.min.js', array('jquery'), "1.0", false);  
	
	wp_register_script("scrollmagic-custom-shortcode-script", get_stylesheet_directory_uri() . '/scroll-magic-shortcode/js/scrollmagic-custom.js', array('jquery'), "1.0", true);  
	
}

add_action( 'init', 'wb_mm_scrollmagic_register_css_js' );
/********* this is for the single product show in anywhere as shortcode ***********/


add_shortcode( 'digital-products-show-scrollmagic', 'wb_mm_digital_product_show_scrollmagic_function' );
function wb_mm_digital_product_show_scrollmagic_function($atts = '') { 

wp_enqueue_style("austeller-accordion-file"); 
wp_enqueue_script("scrollmagic-shortcode-script",array('jquery') , '1.0', false); 
wp_enqueue_script("debug-addIndicators-shortcode-script",array('jquery') , '1.0', false); 
wp_enqueue_script("scrollmagic-custom-shortcode-script",array('jquery') , '1.0', true); 	
	
// Reference for inoformations https://www.businessbloomer.com/woocommerce-easily-get-product-info-title-sku-desc-product-object/
 
   
/*       
 global $_wp_additional_image_sizes; 
print '<pre>'; 
print_r( $_wp_additional_image_sizes ); 
print '</pre>';
*/

 
	
		
	$scrollmagic = shortcode_atts( array(
        'trigger_area' 		=> 'null', 
		'trigger_pin'			=> 'null',
		'trigger_duration'		=> 300,
		'trigger_hook'			=> '0.25'
    ), $atts ); 
		
		$scrollMagicScripts =''; 
		$print_before = ''; 
		$print_before = '<div class="'.$scrollmagic['trigger_area'].'"></div>';
		
		if(!$scrollmagic['trigger_pin']){
			$scrollmagic['trigger_pin'] = 'column_attr';
		}
		$scrollMagicScripts .= '
						
		<script>
			jQuery(document).ready(function(){   
			
				var $containerHeight = jQuery(window).width();
				if ($containerHeight > 1024) {
					var controller = new ScrollMagic.Controller();
						// build scene
					var scene = new ScrollMagic.Scene({
										triggerElement: ".'.$scrollmagic['trigger_area'].'",
										duration: '.$scrollmagic['trigger_duration'].',
										triggerHook: '.$scrollmagic['trigger_hook'].'})
									.setPin(".'.$scrollmagic['trigger_area'].' .'.$scrollmagic['trigger_pin'].'")
									//.addIndicators({name: "1 (duration: 300)"}) // add indicators (requires plugin)
									.addTo(controller);
				}else{
					//scene.remove();
					// destroy the scene without resetting the pin and tween to their initial positions
					//scene = scene.destroy();

					// destroy the scene and reset the pin and tween
					//scene = scene.destroy(true);

					// without resetting the scenes
					//controller = controller.destroy();

					// with scene reset
					//controller = controller.destroy(true);
				}
				
				
				
				
				
								
						 
	});			
											
											
	 
 
	


						 
 

				
 
		 </script>';
	
 
        
        return $scrollMagicScripts;
	
	/*return $dataProduct ='<div class="spacer s2"></div>
<div id="trigger1" class="spacer s0"></div>
<div id="pin1" class="box2 blue">
	<p>Stay where you are (at least for a while).</p>
	<a href="#" class="viewsource">view source</a>
</div>
<div class="spacer s2"></div>'; */
        
        //return $dataProduct = do_shortcode('[add_to_cart_form id="1299" ]');
}

 
