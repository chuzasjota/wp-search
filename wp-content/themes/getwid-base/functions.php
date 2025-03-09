<?php
/**
 * getwid_base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package getwid_base
 */

if ( ! function_exists( 'getwid_base_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function getwid_base_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on getwid_base, use a find and replace
		 * to change 'getwid-base' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'getwid-base', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 938 );

		add_image_size( 'getwid_base-cropped', 938, 552, true );
		add_image_size( 'getwid_base-large', 1130 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'getwid-base' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'getwid_base_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 63,
			'width'       => 63,
			'flex-width'  => true,
			'flex-height' => true,
		) );


		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_editor_style( array( 'css/editor-style.css', getwid_base_fonts_url() ) );

		$default_colors = getwid_base_get_default_color_palette_colors();
		$color_palette  = apply_filters( 'getwid_base_color_palette', $default_colors );
		add_theme_support( 'editor-color-palette', $color_palette );

	}
endif;
add_action( 'after_setup_theme', 'getwid_base_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function getwid_base_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'getwid_base_content_width', 1130 );
}

add_action( 'after_setup_theme', 'getwid_base_content_width', 0 );

function getwid_base_adjust_content_width() {
	global $content_width;

	if ( is_single() ) {
		$content_width = 748;
	}

}

add_action( 'template_redirect', 'getwid_base_adjust_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function getwid_base_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'getwid-base' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'getwid-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'getwid-base' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'getwid-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'getwid-base' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'getwid-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'getwid-base' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'getwid-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'getwid_base_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function getwid_base_scripts() {

	wp_enqueue_style( 'linearicons-free', get_template_directory_uri() . '/assets/linearicons/style.css', array(), '1.0.0' );

	wp_enqueue_style( 'getwid-base-fonts', getwid_base_fonts_url(), array(), null );

	wp_enqueue_style( 'getwid-base-style', get_stylesheet_uri(), array(), getwid_base_get_theme_version() );

	wp_enqueue_script( 'getwid-base-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), getwid_base_get_theme_version(), true );

	wp_enqueue_script( 'getwid-base-navigation', get_template_directory_uri() . '/js/navigation.js', array(), getwid_base_get_theme_version(), true );

	wp_enqueue_script( 'getwid-base-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), getwid_base_get_theme_version(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'getwid_base_scripts' );

function getwid_base_add_block_editor_assets() {
	wp_enqueue_style( 'linearicons-free', get_template_directory_uri() . '/assets/linearicons/style.css', array(), '1.0.0' );
}

add_action( 'enqueue_block_editor_assets', 'getwid_base_add_block_editor_assets' );

/**
 * Include Demo Import file.
 */
require get_template_directory() . '/inc/demo-import.php';

/**
 * Include TGM Plugin Activation file.
 */
require get_template_directory() . '/inc/tgmpa-init.php';

/**
 * Include LinearIcons file.
 */
require get_template_directory() . '/inc/lnr-icons.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function getwid_base_get_theme_version() {
	$theme_info = wp_get_theme( get_template() );

	return $theme_info->get( 'Version' );
}

if ( ! function_exists( 'getwid_base_fonts_url' ) ) :
	/**
	 * Register Google fonts for Getwid Base theme.
	 *
	 * Create your own getwid_base_fonts_url() function to override in a child theme.
	 *
	 * @return string Google fonts URL for the theme.
	 * @since getwid_base 0.0.1
	 *
	 */
	function getwid_base_fonts_url() {
		$fonts_url     = '';
		$font_families = array();

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by Work Sans, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$font1 = esc_html_x( 'on', 'Work Sans font: on or off', 'getwid-base' );
		if ( 'off' !== $font1 ) {
			$font_families[] = 'Work Sans:400,500,700';
		}
		/**
		 * Translators: If there are characters in your language that are not
		 * supported by PT Serif, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$font2 = esc_html_x( 'on', 'PT Serif font: on or off', 'getwid-base' );
		if ( 'off' !== $font2 ) {
			$font_families[] = 'PT Serif: 400,400i,700,700i';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext,cyrillic' ),
		);
		if ( $font_families ) {
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

function getwid_base_get_default_color_palette_colors() {

	$default_colors = array(
		array(
			'name'  => __( 'Primary', 'getwid-base' ),
			'slug'  => 'primary',
			'color' => '#8f4ec7',
		),
		array(
			'name'  => __( 'Color 1', 'getwid-base' ),
			'slug'  => 'light-violet',
			'color' => '#f6eefc',
		),
		array(
			'name'  => __( 'Color 2', 'getwid-base' ),
			'slug'  => 'light-blue',
			'color' => '#f3f8fb',
		),
		array(
			'name'  => __( 'Color 3', 'getwid-base' ),
			'slug'  => 'blue',
			'color' => '#68c5f9',
		),
		array(
			'name'  => __( 'Color 4', 'getwid-base' ),
			'slug'  => 'gray',
			'color' => '#9ea6ac',
		),
		array(
			'name'  => __( 'Color 5', 'getwid-base' ),
			'slug'  => 'light-gray',
			'color' => '#f3f9fd',
		),
		array(
			'name'  => __( 'Color 6', 'getwid-base' ),
			'slug'  => 'dark-blue',
			'color' => '#2c3847',
		),
	);

	return $default_colors;

}

// Registrar script para el frontend
function mega_search_register_scripts() {
    wp_register_script('mega-search-ajax', get_template_directory_uri() . '/js/mega-search-ajax.js', array('jquery'), '1.0', true);
    
    // Comunicación con Ajax
    wp_localize_script('mega-search-ajax', 'mega_search_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mega_search_nonce')
    ));
    
    wp_enqueue_script('mega-search-ajax');
}
add_action('wp_enqueue_scripts', 'mega_search_register_scripts');

// Obtener icono según tipo de archivo
function get_file_icon($mime_type) {
    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="file-icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>';
    
    if (strpos($mime_type, 'pdf') !== false) {
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e53935" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="file-icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="M9 15h6"></path><path d="M9 11h6"></path></svg>';
    } elseif (strpos($mime_type, 'word') !== false || strpos($mime_type, 'msword') !== false) {
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2196f3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="file-icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>';
    } elseif (strpos($mime_type, 'excel') !== false || strpos($mime_type, 'spreadsheet') !== false) {
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4caf50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="file-icon"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="8" y1="13" x2="16" y2="13"></line><line x1="8" y1="17" x2="16" y2="17"></line></svg>';
    } elseif (strpos($mime_type, 'image') !== false) {
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9c27b0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="file-icon"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>';
    }
    
    return $icon;
}

// Obtener tipo de archivo legible
function get_file_type_label($mime_type) {
    $types = array(
        'application/pdf' => 'PDF',
        'application/msword' => 'DOC',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'DOCX',
        'application/vnd.ms-excel' => 'XLS',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'XLSX',
    );
    
    return isset($types[$mime_type]) ? $types[$mime_type] : pathinfo($mime_type, PATHINFO_EXTENSION);
}

// Manejo de la petición AJAX
function mega_search_ajax_handler() {
    // Verificar nonce de seguridad
    check_ajax_referer('mega_search_nonce', 'security');
    
    // Parámetros de búsqueda
    $search_term = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';
    $post_types = isset($_POST['post_type']) ? (array) $_POST['post_type'] : array('post', 'page', 'attachment');
    $per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : 5;
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    
    $args = array(
        'post_type' => $post_types,
        'posts_per_page' => $per_page,
        'paged' => $paged,
        's' => $search_term
    );
    
    // Verificar busqueda de archivos (attachments)
    if (in_array('attachment', $post_types)) {
        if (count($post_types) == 1) {
            $args['post_status'] = 'inherit';
        } else {
            $args['post_status'] = array('publish', 'inherit');
        }
    } else {
        $args['post_status'] = 'publish';
    }
    
	$search_query = new WP_Query($args);
    
    ob_start();
    
    if ($search_query->have_posts()) {
        echo '<div class="search-meta">';
        echo '<p>Total: encontrados ' . $search_query->found_posts . ' resultados.</p>';
        echo '<p>Página ' . $paged . ' de ' . $search_query->max_num_pages . '</p>';
        echo '</div>';
        
        echo '<div class="results-list">';
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $post_type = get_post_type();
            
            // Mostrar diferente según el tipo de contenido
            if ($post_type === 'attachment') {
                // Obtener detalles del archivo
                $file_url = wp_get_attachment_url(get_the_ID());
                $file_type = get_post_mime_type(get_the_ID());
                $file_size = filesize(get_attached_file(get_the_ID()));
                $file_size_formatted = size_format($file_size);
                
                // Extraer información de metadatos si existe
                $description = wp_get_attachment_caption(get_the_ID()) ?: get_the_excerpt();
                
                // Icono según tipo de archivo
                $file_icon = get_file_icon($file_type);
                $file_type_label = get_file_type_label($file_type);
                
                ?>
                <article class="search-result-file">
                    <div class="file-icon">
                        <?php echo $file_icon; ?>
						<span class="file-type"><?php echo esc_html($file_type_label); ?></span>
                    </div>
                    <div class="file-info">
                        <h2>
                            <a href="<?php echo esc_url($file_url); ?>" target="_blank"><?php the_title(); ?></a>
                        </h2>
                        <?php if (!empty($description)) : ?>
                            <div class="file-description"><?php echo esc_html($description); ?></div>
                        <?php endif; ?>
                        <div class="file-meta">
                            <span class="file-size"><?php echo esc_html($file_size_formatted); ?></span>
                            <span class="file-date">Subido: <?php echo get_the_date(); ?></span>
                        </div>
                        <div class="file-download">
                            <a href="<?php echo esc_url($file_url); ?>" target="_blank" download>Descargar archivo</a>
                        </div>
                    </div>
                </article>
                <?php
            } else {
                // Post o página normal
                ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="result-type">
                        <?php 
                        $post_type_obj = get_post_type_object($post_type);
                        echo $post_type_obj->labels->singular_name;
                        ?>
                    </div>
                    <div class="result-meta">
                        <span class="date"><?php echo get_the_date(); ?></span>
                    </div>
                    <?php the_excerpt(); ?>
                </article>
                <?php
            }
        }
        echo '</div>';
        
        // Paginación AJAX
        echo '<div class="ajax-search-pagination">';
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $search_query->max_num_pages,
            'prev_text' => '&laquo; Anterior',
            'next_text' => 'Siguiente &raquo;'
        ));
        echo '</div>';
        
        wp_reset_postdata();
    } else {
        echo '<p>No se encontraron resultados para su búsqueda.</p>';
    }
    
    $output = ob_get_clean();
    echo $output;
    
    wp_die();
}

// Registrar la acción AJAX
add_action('wp_ajax_mega_search_ajax', 'mega_search_ajax_handler');
add_action('wp_ajax_nopriv_mega_search_ajax', 'mega_search_ajax_handler');
