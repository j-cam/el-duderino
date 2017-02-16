<?php
/**
 * Template override for WordPress default search form
 *
 * This is the template will be used anytime the WordPress
 * function `get_search_form()` is called.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package el_Duderino
 */
 ?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  	<label class="screen-reader-text">Search for:</label>
		<input type="search" class="search-field" placeholder="Search…" value="" name="s" title="Search for:" />
	  <input type="submit" class="search-submit" value="Search" />
</form>
