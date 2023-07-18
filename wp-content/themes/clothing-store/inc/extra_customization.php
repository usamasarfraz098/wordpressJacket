<?php

	/*---------------------------Width -------------------*/

	$clothing_store_custom_style= "";

	$clothing_store_theme_width = get_theme_mod( 'clothing_store_width_options','full_width');

    if($clothing_store_theme_width == 'full_width'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='max-width: 100%;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_theme_width == 'container'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_theme_width == 'container_fluid'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$clothing_store_custom_style .='}';
	}


// sticky header
	

	if( get_option( 'clothing_store_sticky_header',false) != 'on') {

		$clothing_store_custom_style .='.menu_header_box.fixed{';

			$clothing_store_custom_style .='position: static;';
			
		$clothing_store_custom_style .='}';
	}

	if( get_option( 'clothing_store_sticky_header',true) != 'off') {

		$clothing_store_custom_style .='.menu_header_box.fixed{';

			$clothing_store_custom_style .='position: fixed;';
			
		$clothing_store_custom_style .='}';
	}


	/*---------------------------Scroll-top-position -------------------*/

	$clothing_store_scroll_options = get_theme_mod( 'clothing_store_scroll_options','right_align');

    if($clothing_store_scroll_options == 'right_align'){

		$clothing_store_custom_style .='.scroll-top button{';

			$clothing_store_custom_style .='';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_scroll_options == 'center_align'){

		$clothing_store_custom_style .='.scroll-top button{';

			$clothing_store_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_scroll_options == 'left_align'){

		$clothing_store_custom_style .='.scroll-top button{';

			$clothing_store_custom_style .='right: auto; left:5%; margin: 0 auto';

		$clothing_store_custom_style .='}';
	}

	//-------------------------------------------------------------------------------

	$clothing_store_logo_max_height = get_theme_mod('clothing_store_logo_max_height');

	if($clothing_store_logo_max_height != false){

		$clothing_store_custom_style .='.custom-logo-link img{';

			$clothing_store_custom_style .='max-height: '.esc_html($clothing_store_logo_max_height).'px;';

		$clothing_store_custom_style .='}';
	}

				/*---------------------------text-transform-------------------*/

	$clothing_store_text_transform = get_theme_mod( 'clothing_store_menu_text_transform','CAPITALISE');
    if($clothing_store_text_transform == 'CAPITALISE'){

		$clothing_store_custom_style .='nav#top_gb_menu ul li a{';

			$clothing_store_custom_style .='text-transform: capitalize ; font-size: 14px;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_text_transform == 'UPPERCASE'){

		$clothing_store_custom_style .='nav#top_gb_menu ul li a{';

			$clothing_store_custom_style .='text-transform: uppercase ; font-size: 14px;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_text_transform == 'LOWERCASE'){

		$clothing_store_custom_style .='nav#top_gb_menu ul li a{';

			$clothing_store_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$clothing_store_custom_style .='}';
	}

			/*-------------------------Slider-content-alignment-------------------*/

		$clothing_store_slider_content_alignment = get_theme_mod( 'clothing_store_slider_content_alignment','LEFT-ALIGN');

		 if($clothing_store_slider_content_alignment == 'LEFT-ALIGN'){

				$clothing_store_custom_style .='.slider-inner{';

					$clothing_store_custom_style .='text-align:left;';

				$clothing_store_custom_style .='}';


			}else if($clothing_store_slider_content_alignment == 'CENTER-ALIGN'){

				$clothing_store_custom_style .='.slider-inner{';

					$clothing_store_custom_style .='text-align:center;';

				$clothing_store_custom_style .='}';


			}else if($clothing_store_slider_content_alignment == 'RIGHT-ALIGN'){

				$clothing_store_custom_style .='.slider-inner{';

					$clothing_store_custom_style .='text-align:right;';

				$clothing_store_custom_style .='}';

			}


//---------------------theme-button-color-------------//

			$clothing_store_theme_button_color = get_theme_mod('clothing_store_theme_button_color');

			if($clothing_store_theme_button_color != false){

		$clothing_store_custom_style .='a.more-link, .prev.page-numbers, .next.page-numbers, button.search-submit, .toggle-menu button, button,
 input[type="button"], input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.site-footer .search-form .search-submit,a.added_to_cart.wc-forward{';

			$clothing_store_custom_style .='background-color: '.esc_attr($clothing_store_theme_button_color).';';

		$clothing_store_custom_style .='}';
	}
	$clothing_store_button_border = get_theme_mod('clothing_store_button_border_radius','10');
		
		if($clothing_store_button_border != false){

				$clothing_store_custom_style .='a.more-link, .prev.page-numbers, .next.page-numbers, button.search-submit, .toggle-menu button, button,
 input[type="button"], input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.site-footer .search-form .search-submit,#sidebar input[type="search"], input[type="search"],a.added_to_cart.wc-forward{';

		$clothing_store_custom_style .='border-radius: '.esc_attr(

			$clothing_store_button_border).'px;';
				
				$clothing_store_custom_style .='}';
		}


//-----------slider-button-color-------
$clothing_store_slider_button_color = get_theme_mod('clothing_store_slider_button_color');

	if ($clothing_store_slider_button_color != false){

		$clothing_store_custom_style.='.home-btn a{';
		
			$clothing_store_custom_style.=' background-color:'.esc_attr($clothing_store_slider_button_color).';';

		$clothing_store_custom_style.='}';
	}

