<?php 

// sticky header
	$clothing_store_custom_style= "";

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


	/*---------------------------Width -------------------*/
	
	$clothing_store_theme_width = get_theme_mod( 'clothing_store_width_options','full_width');

    if($clothing_store_theme_width == 'full_width'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='max-width: 100%;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_theme_width == 'Container'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$clothing_store_custom_style .='}';

	}else if($clothing_store_theme_width == 'container_fluid'){

		$clothing_store_custom_style .='body{';

			$clothing_store_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$clothing_store_custom_style .='}';
	}