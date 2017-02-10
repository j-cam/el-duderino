<?php

/**
 * the_acf_img_src description
 * @param  [array] $the_img_field image array from ACF Image Array
 * @return [string] resource link to the image
 */
function the_acf_img_src($the_img_field){

  echo $the_img_field['url'];

}
/**
 * the_acf_img_alt description
 * @param  [array] $the_img_field image array from ACF Image Array
 * @return [string] the alt text for the image
 */
function the_acf_img_alt($the_img_field){

  echo $the_img_field['alt'];

}

function the_acf_inline_background_image($imgUrl){

    if(!empty($imgUrl)){
      $style_attribute = ' style="%s"';
      $style = 'background-image:url('  . esc_url( $imgUrl['url'] ) . ');';
      echo sprintf( $style_attribute, $style );
    }
    else {
      return false;
    }
}


// function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {

//   // remove layout title from text
//   $title = '';


//   // load sub field image
//   // note you may need to add extra CSS to the page t style these elements
//   $title .= '<div class="thumbnail">';

//   if( $image = get_sub_field('image') ) {

//     $title .= '<img src="' . $image['sizes']['thumbnail'] . '" height="36px" />';

//   }

//   $title .= '</div>';


//   // load text sub field
//   if( $text = get_sub_field('title') ) {

//     $title .= '<h4>' . $text . '</h4>';

//   }


//   // return
//   return $title;

// }

// // name
// add_filter('acf/fields/flexible_content/layout_title/name=my_flex_field', 'my_acf_flexible_content_layout_title', 10, 4);





/**
 * Filter the avaiable pages for the classes
 * offered custom page module
 * @link   https://www.advancedcustomfields.com/resources/acf-fields-post_object-query/
 * @param  [type] $args    [description]
 * @param  [type] $field   [description]
 * @param  [type] $post_id [description]
 * @return [type]          [description]
 */


function classes_offered_page_query( $args, $field, $post_id ) {

    // only show children of the current post being edited
    $classes_post_id = 9;
    $exclude_registration = array(1581);


    $args['post_parent'] = $classes_post_id;
    $args['post__not_in'] = array(1581);


  // return
    return $args;

}

// module_types=>classes_offered_module=>classes_offered_group
$acf_field_id = 'field_5787fbb326b38';
// filter for the field
add_filter('acf/fields/post_object/query/key=field_5787fbb326b38', 'classes_offered_page_query', 10, 3);


// filter for a specific field based on it's name
//add_filter('acf/fields/post_object/query/name=my_post_object', 'my_post_object_query', 10, 3);


// filter for a specific field based on it's key
//add_filter('acf/fields/post_object/query/key=field_508a263b40457', 'my_post_object_query', 10, 3);

