add_filter( 'template_include', 'echo_cur_tplfile', 99 );
function echo_cur_tplfile( $template )
{
	//echo '<span class="template-name" style=" color: red; position: fixed; top: 30%; left: 10%; z-index: 9999; font-weight: 900; background-color: #fff; ">'. wp_basename( $template ) .'</span>';
	//var_dump($template);

	if ( wp_basename( $template ) == 'home-template.php') {
		add_action('wp_enqueue_scripts', 'new_home_scripts');
		function new_home_scripts()
		{
			wp_enqueue_style('home-critical', get_stylesheet_directory_uri() . '/assets/home/css/critical.min.css');
			wp_enqueue_style('home-app', get_stylesheet_directory_uri() . '/assets/home/css/app.min.css');
			wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/home/css/style.css');

			wp_enqueue_script('home-js', get_stylesheet_directory_uri() . '/assets/home/js/app.min.js', '', '', true);
		}
	}
	return $template;
}
