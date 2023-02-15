<?php
global $wp_query;

$thesearch = get_search_query();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$content_type = $_GET['content_type']  ? $_GET['content_type'] : '';
$category = $_GET['category'] ? $_GET['category'] : '';
$sub_category = $_GET['sub_category'] ? $_GET['sub_category'] : '';

$args = [
  's'   => $thesearch,
  'paged'           => $paged,
//  'meta_query'    => [],
];

if (!empty($content_type)) {
  $content_type_args = [
    'taxonomy' => $content_type,
    'operator' => 'EXISTS'
  ];
  $args['tax_query'][] = $content_type_args;
}

if (!empty($category)) {
  $category = explode(',', $category);
  $category_args = [
    'taxonomy' => $category[0],
    'field' => 'slug',
    'terms' => $category[1],
  ];
  $args['tax_query'][] = $category_args;
}

if (!empty($sub_category)) {
  $sub_category = explode(',', $sub_category);
  $content_type_args = [
    'taxonomy' => $sub_category[0],
    'field' => 'slug',
    'terms' => $sub_category[1],
  ];
  $args['tax_query'][] = $content_type_args;
}

$wp_query = new WP_Query($args);


/**
 * Extend WordPress search to include custom fields
 */
function search_join( $join ) {
  global $wpdb;
  if ( is_search() ) {    
      $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
  }
  return $join;
}
add_filter('posts_join', 'search_join' );

/**
* Modify the search query with posts_where
*/
function search_where( $where ) {
  global $pagenow, $wpdb;
  if ( is_search() ) {
      $where = preg_replace(
          "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
          "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
  }
  return $where;
}
add_filter( 'posts_where', 'search_where' );

/**
 * Prevent duplicates
 */
function search_distinct( $where ) {
  global $wpdb;
  if ( is_search() ) {
      return "DISTINCT";
  }
  return $where;
}
add_filter( 'posts_distinct', 'search_distinct' );

?>
@extends('layouts.app')

@section('content')
@include('partials.page-header-search')

@if (!$wp_query->have_posts())
<section id="notfound">
  <div class="container">
    <div class="alert-container alert alert-warning">
      {{ __('Sorry, no results were found.', 'covid-circle-wp') }}
    </div>
  </div>
</section>
@endif

@if($wp_query->have_posts())
@include('partials.content-search', ['query' => $wp_query, ['thesearch' => $thesearch]])
@endif

@include('partials.pagination', ['query' => $wp_query])
@endsection