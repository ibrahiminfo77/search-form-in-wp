<?php 

//Custom Post Conditional Search

function alpha_search_form($form){ 
	$homedir = home_url('/'); 
	$label = __('search for: ', 'alpha'); 
	$button_label = __('Search', 'alpha');

	// Default search 
	$post_type = <<<PT 
<input type="hidden" name="post_type" value="post"> 
PT;

// Custom Search [value change] 

if(is_post_type_archive( 'book' )){
	$post_type = <<<PT
	<input type="hidden" name="post_type" value="book"> 
PT; 

} 

// Search markup 

$newform = <<<FORM
	<form role="search" method="get" class="header__search-form" action="{$homedir}"> 
		<label> 
			<span class="hide-content">{$label}</span> 
				<input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off"> 
		</label> 
		{$post_type} 
		<input type="submit" class="search-submit" value="{$button_label}"> 
	</form> 

	FORM; 
	return $newform;

} 

add_filter( 'get_search_form', 'alpha_search_form' );


//Search Result Highlight

function alpha_hightlight_search_results($text){
	if(is_search()){
		$pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
		$text = preg_replace($pattern, '&lt;span class="search-highlight"&gt;\0&lt;/span&gt;', $text);
	}
	return $text;
}

add_filter('the_content', 'alpha_hightlight_search_results');
add_filter('the_excerpt', 'alpha_hightlight_search_results');
add_filter('the_title', 'alpha_hightlight_search_results');