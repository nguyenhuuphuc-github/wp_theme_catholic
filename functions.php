<?php 

// Khai bao cac hang gia tri 
// Cac duong dan thu muc duoc su dung 
define(URL_THEME, get_stylesheet_directory());
define(URL_CORE, URL_THEME. "/core");
define(URL_CSS, get_template_directory_uri().'/assets/css');
define(URL_JS, get_template_directory_uri().'/assets/js');
define(URL_IMAGES, get_template_directory_uri().'/assets/images');

if (!function_exists('catholic_setup_css_js')){
	//Nhung cac file 
	function catholic_setup_css_js() {

		//array ten cac file trong folder css
		$name_css = array (
			'bootstrap1' => 'bootstrap',
			'font1' => 'fontawesome.min',
			'jquery_share1' => 'jquery.share',
			'styles1' => 'Styles',
			'menu1' => 'menu',
		);

		//array ten cac file trong folder js
		$name_js = array (
			'bootstrap2' => 'bootstrap',
			'jquery2' => 'jquery-3.4.1',
			'jquery_share2' => 'jquery.share',
			'modern2' => 'modernizr-2.8.3',
		);
		foreach ($name_css as $key_css => $file) {
			wp_enqueue_style($key_css , URL_CSS . "/" . $file . '.css');
		}
		foreach ($name_js as $key_js => $file) {
			wp_enqueue_script($key_js , URL_JS . "/" . $file . '.js');		
		}
	}

	//Thiet lap chieu rong noi dung
	// if (!isset($content_width)) {
	// 	$content_width = 620;
	// }
	//hook action 
	add_action('wp_enqueue_scripts', 'catholic_setup_css_js');
}

if(!function_exists(theme_setup)) {
	function theme_setup() {
		//Thiet lap text domain
		$language_folder = URL_THEME . '/languages';
		load_theme_textdomain('huuphuc',$language_folder);

		//Them title-tag
		add_theme_support('title-tag');

		//Tu dong them link RSS cho <head>
		add_theme_support('automatic-feed-links');

		//Them thumbnail
		add_theme_support('post-thumbnails');

		//Post format
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link',
		));

		//them custom background
		$default_background = array(
			'default-color' => 'e8e8e8'
		);
		add_theme_support('custom-background',$default_background);

		//Tao sidebar
		$sidebar = array(
			'name' => __('Main Sidebar','huuphuc'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',
			'before_title' => '<h3 class=widgettitle>',
			'after_title' => '</h3>',
		);
		register_sidebar($sidebar);

		//Them Menu
		register_nav_menu('primary-menu', __('Primary Menu','huuphuc'));
	}
	add_action('init','theme_setup');
}

//Ham hien thi thumbnail
if(!function_exists('get_thumbnail')) {
	function get_thumbnail ($size) {
		if ( (!is_single) && has_post_thumbnail() && !post_password_required() ||has_post_format('image')) : ?>
			<figure class="post-thumbnail"><?php the_post_thumbnail($size);?><figure>
		<?php endif;
	}
}

//hien thi header
if(!function_exists('entry_header')) {
	function entry_header () { ?>
		<?php if (is_single()) : ?>
			<h1 class="entry-title"><a 
				href="<?php the_permalink();?>" 
				title="<?php the_title();?>">
				<?php the_title();?>
			</a></h1>
		<?php else: ?>
			<h2 class="entry-title"><a 
				href="<?php the_permalink();?>" 
				title="<?php the_title();?>">
				<?php the_title();?>
			</a></h2>
		<?php endif; ?>
	<?php }
}

//lay du lieu post
if (!function_exists(entry_meta)){
	function entry_meta() { ?>
		<?php if (!is_page()) : ?>
			<div class="entry-meta">
				<?php
					printf(__('<span class="author">Posted by %1$s', 'huuphuc'),
					get_the_author() );

					printf(__('span class="date-published"> at %1$s', 'huuphuc'),
					get_the_date() );

					printf(__('<span class="category"> in %1$s ', 'huuphuc'),
					get_the_category_list( ',' ) );

					if( comments_open() ) :
						echo '<span class="meta-reply"';
							comments_popup_link(
								__('Leave a comment','huuphuc'),
								__('One comment', 'huuphuc'),
								__('%comments', 'huuphuc' ),
								__('Read all comments', 'huuphuc')
							);
						echo '</span>';
					endif;
				?>
			</div>
		<?php endif; ?>	
	<?php }
}

//ham hien thi noi dung post

// if(!function_exists(entry_content())) {
// 	function entry_content () {
// 		if ( !issingle()) {
// 			the_excerpt();
// 		} else {
// 			the_content();
// 		}
// 		//phan trnag cho post trong single
// 		$link_pages = array(
// 			'before' => __('<p>Page:', 'huuphuc'),
// 			'after' => '</p>',
// 			'naxtpagelink' => __('Next Page','huuphuc'),
// 			'previouspagelink' => __('Previous Page', 'huuphuc')
// 		);
// 		wp_link_pages($link_pages);
// 	}
// }