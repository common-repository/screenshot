<?php 
	/* 
	Plugin Name: screenshot 
	Plugin URI: http://www.wscreative.co.uk/blog/posts/2008/01/02/screenshot-wordpress-plugin/ 
	Description: A plugin that creates a screenshot for individual pages. 
	Author: WSCreative Version: 1.0 
	Author URI: http://www.wscreative.co.uk
	*/ 
	
	add_filter('the_content', 'screenshot_the_content'); 
	
	function screenshot_the_content($content) { 
		global $more;
		if (!$more) $content = get_screenshot().$content;
		return $content;
	}

	function get_screenshot(){
		$width = "1024"; //amend this value to set the original screenshot width. Occasionaly web pages will display incorrectly if left at default width.
		$cache = ""; //amend this value to change the number of days between cache updates. The default is 7 days, minimum is 1 day, maximum 1 year.
		$return = "";
		$url = get_permalink();
		if ( get_the_title() ) $title = get_the_title(); else $title = get_the_ID();
		$title = str_replace(" ","%20", $title);
		$return = implode('', file('http://www.wscreative.co.uk/blog/getscreenshot.php?url='.$url.'&title='.$title.'&width='.$width.'&cache='.$cache));
		return $return;
	}

?>