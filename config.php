<?php
// class must be named PageLinesInstallTheme

class PageLinesInstallTheme extends PageLinesInstall{


	/*
	 * This sets up the default configuration for differing page types
	 * This filter will be used when no 'map' is set on a specific page. 
	*/

	function default_template_handling( $t ){
	

		// 404 Page
		if( is_404() ){

				$content = array(
					array(
						'object'	=> 'PageLinesNoPosts',
						'span' 		=> 10,
						'offset'	=> 1
					)
				);

		} 

		// Overall Default 
		else {
			$content = array(
				array(
					'object'	=> 'PageLinesPostLoop',
	
				)
			);
			
		}


		$t = array( 'content' => $content );
	
		return $t;
		
	}
	
	
	
	/* 
	 * This sets the global areas of the site's sections on theme activation. 
	 * Remove comments to activate
	*/ 
	
	function global_region_map(){
		
		$map = array(
			'fixed'	=> array(
				array( 'object'	=> 'PLNavi' ),
			),
			'header'	=> array(), 
			'footer'	=> array(
				array(
					'settings'	=> array(
						'pl_area_theme' 	=> 'pl-black',
					),
					'content'	=> array(
						array( 
							'object'	=> 'PageLinesColumnizer',
							'object'	=> 'PLWatermark'
							
						),
					)
				),
				array(
					'settings'	=> array(
						'pl_area_theme' 	=> 'pl-grey',
					),
					'content'	=> array(
						array( 
							'object'	=> 'PageLinesShareBar',
							
						),
					)
				)
			),
		);
		
		return $map;
		
	}

	/* 
	 * This sets the global option values on theme activation.
	 * What would commonly be stored in site settings. 
	*/

	function set_global_options(){
		
		$options_array = array(
			'supersize_bg'					=> 0,
			'content_width_px'				=> '1100px',
			'linkcolor'						=> '#ff582c',
			'text_primary'					=> '#282828',
			'bodybg'						=> '#ffffff',
			'layout_mode'					=> 'pixel',
			'layout_display_mode'			=> 'display-full',
			'font_primary'					=> 'open_sans',
			'base_font_size'				=> 16,
			'font_primary_weight'			=> 400,
			'font_headers'					=> 'open_sans',
			'header_base_size'				=> 20,
			'font_headers_weight'			=> 300,
			'region_disable_fixed'			=> 1,
			'pagelines_favicon'				=> '[pl_child_url]/images/default-favicon.png',
			'pl_login_image'				=> '[pl_child_url]/images/default-login-image.png',
			'pagelines_touchicon'			=> '[pl_child_url]/images/default-touch-icon.png'
		);
		
		return $options_array;
		
	}
	
	
	/*
	 * Assign individual templates to their specific pages.
	*/ 
	 
	function map_templates_to_pages( ){
		
		$map = array(
			//'is_404'	=> 'gw-archive', 
			'tag'		=> 'gw-archive',
			'search'	=> 'gw-archive',
			'category'	=> 'gw-archive',
			'author'	=> 'gw-archive',
			'archive'	=> 'gw-archive',
			'blog'		=> 'gw-blog',
			'post'		=> 'gw-post',
		);
		
		return $map;
		
		
	} 
	
	
	/* 
	 * This adds or updates templates defined by a map on theme activation
	 * Note that the user is redirected to 'welcome' template on activation by default (unless otherwise specified)
	*/
	 
	function page_templates(){
		
		$templates = array(
			'gw-welcome' 		=> $this->template_welcome(), // default on install
			'gw-blog' 			=> $this->template_blog(),
			'gw-post' 			=> $this->template_post(),
			'gw-archive'		=> $this->template_archive()
		);
				
		return $templates;
		
	}

	/* 
	 * Template Maps are a code based way of creating layouts for specified templates.
	*/ 

	function template_welcome(){
		
		$template['key'] = 'gw-welcome'; // this key should match the template name in the page_templates () function above.
		
		$template['name'] = 'Groundwork Core | Welcome'; // template name that you see in Page Setup area of PL toolbox
		
		$template['desc'] = 'Getting started guide &amp; template.'; // Default PL Getting Started Guide
		
		$template['map'] = array(
			
			array(
				'object'	=> 'PLSectionArea',
				'settings'	=> array(
					'pl_area_pad' 		=> '0px',
				),
				
				
				'content'	=> array(
					array(
						'object'	=> 'PageLinesQuickSlider', // add in any section class name
						'settings'	=> array(
							'quickslider_array'	=> array( // define options using option keys and values
								array(
									'image'			=> '[pl_child_url]/images/gw-01.jpg',
									'text'			=> 'Welcome To Groundwork',
									'link'			=> home_url(),
								),
							)
						)
					),
				)
			),
			array(
				'content'	=> array(
					array(
						'object'	=> 'pliBox',
						'settings'	=> array(
							'ibox_array'	=> array(
								array(
									'title'	=> 'User Guide',
									'text'	=> 'New to PageLines? Get started fast with PageLines DMS Quick Start guide...',
									'icon'	=> 'rocket',
									'link'	=> 'http://www.pagelines.com/user-guide/'
								),
								array(
									'title'	=> 'Forum',
									'text'	=> 'Have questions? We are happy to help, just search or post on PageLines Forum.',
									'icon'	=> 'comment',
									'link'	=> 'http://forum.pagelines.com/'
								),
								array(
									'title'	=> 'Docs',
									'text'	=> 'Time to dig in. Check out the Docs for specifics on creating your dream website.',
									'icon'	=> 'file-text',
									'link'	=> 'http://docs.pagelines.com/'
								),
							)
						)
					),
				)
			)
		); 
		
		return $template;
	}

	
	// Archive Template Map
	
	function template_archive(){
		
		$template['key'] = 'gw-archive';
		
		$template['name'] = 'Groundwork Core | Archive Page';
		
		$template['desc'] = 'Template for archives and other listings.';
		
		$template['map'] = array(
			array(
				'object'	=> 'PLSectionArea',
				'settings'	=> array(
					'pl_area_pad' 		=> '0px',
				),

				'content'	=> array(
					array(
						'object'	=> 'PageLinesTextBox',
						'settings'	=> array(
							'textbox_content'		=> 'Welcome to Groundwork Core.',
							'textbox_title'			=> 'Groundwork',
							'textbox_font_size'		=> 20,
							'textbox_align'			=> 'Center',
							'textbox_title_wrap'	=> 'h1',
						),
					),
					array(
						'object'	=> 'PageLinesPostLoop',
					),
				)
			),
		); 
		
		return $template;
	}
	
	// Template Map

	function template_blog(){
		
		$template['key'] = 'gw-blog';
		
		$template['name'] = 'Groundwork Core | Blog Page';
		
		$template['desc'] = 'Used on blog pages.';
		
		$template['map'] = array(
			array(
				'object'	=> 'PLSectionArea',
				'settings'	=> array(
					'pl_area_pad' 		=> '0px',
				),

				'content'	=> array(
					array(
						'object'	=> 'PageLinesTextBox',
						'settings'	=> array(
							'textbox_content'		=> 'Welcome to Groundwork Core.',
							'textbox_title'			=> 'Groundwork',
							'textbox_font_size'		=> 20,
							'textbox_align'			=> 'Center',
							'textbox_title_wrap'	=> 'h1',
						),
					),
					array(
						'object'	=> 'PageLinesPostLoop',
					),
					array(
						'object'	=> 'PageLinesPagination',
					),
				)
			),
		); 
		
		return $template;
	}
	
	// Template Map
	function template_post(){
		
		$template['key'] = 'gw-post';
		
		$template['name'] = 'Groundwork Core | Single Post';
		
		$template['desc'] = 'Used on single post pages.';
		
		$template['map'] = array(
			array(
				'object'	=> 'PLSectionArea',
				'settings'	=> array(
					'pl_area_pad' 		=> '0px',
				),

				'content'	=> array(
					array(
						'object'	=> 'PageLinesPostLoop',
					),
					array(
						'object'	=> 'PageLinesComments',
						'span'		=> 8,
					),
				)
			),
		); 
		
		return $template;
	}
	
	
	function page_on_activation( $templateID = 'welcome' ){
		
		global $user_ID;
		
		$data = $this->activation_page_data();
		
		$page = array(
			'post_type'		=> 'page',
			'post_status'	=> 'draft',
			'post_author'	=> $user_ID,
			'post_title'	=> __( 'Groundwork Getting Started', 'pagelines' ),
			'post_content'	=> $this->getting_started_content(),
			'post_name'		=> 'gw-getting-started',
			'template'		=> 'gw-welcome',
		);
		
		$post_data = wp_parse_args( $data, $page );
		
		// Check or add page
		$pages = get_pages( array( 'post_status' => 'draft' ) );
		$page_exists = false;
		foreach ($pages as $page) { 
			
			$name = $page->post_name;
			
			if ( $name == $post_data['post_name'] ) { 
				$page_exists = true;
				$id = $page->ID;
			}
			 
		}
		
		if( ! $page_exists )
			$id = wp_insert_post(  $post_data );
			
		
		pl_set_page_template( $id, $post_data['template'], 'both' );
		
		return $id;
	}
	

}
