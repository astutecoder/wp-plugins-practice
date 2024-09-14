<?php


/**
 * Plugin name: Shortcode Plugin
 * Description: My second plugin focusing on getting idea about shortcodes
 * Version: 1.0.0
 * Author: Sk. Azadur Rahman
 */

// Basic
add_shortcode("acscp_message", 'acscp_message');
function acscp_message()
{
  return "This is a static message displayed using shortcode plugin";
}

// With parameter
add_shortcode("acscp_student_data", "acscp_handle_student_data");
function acscp_handle_student_data($attrs)
{
  $attrs = shortcode_atts(array("name" => "Student name", "email" => "student email"), $attrs);
  $name = $attrs['name'];
  $email = $attrs['email'];

  return "<div><h3>Name: {$name}</h3><h3>Email: {$email}</h3></div>";
}

// DB operation
add_shortcode("list-posts", "acscp_handle_list_posts");
function acscp_handle_list_posts($attrs)
{
  $attrs = shortcode_atts(array(
    "limit" => 5
  ), $attrs);

  $query = new WP_Query(array("posts_per_page" => $attrs['limit'], "post_status" => "publish", "order" => "asc"));

  if ($query->have_posts()) {
    $output = '<ul>';

    while ($query->have_posts()) {
      $query->the_post();

      $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    }

    $output .= '</ul>';

    return $output;
  }

  return 'No posts found';
}
