<?php
/**
 * Register Lyrics Post Type
 *
 * @package    WpApi
 * @subpackage WpApi/includes/lib
 */

namespace WpApi\Content\Cpt;

class LyricsCpt
{
    /**
     * Init CPT registration
     *
     * @return void
     */
    public function init()
    {
        add_action('init', [$this, 'registerPostType'], 0);
    }

    /**
     * Custom Post Type registration implementation
     *
     * @return void
     */
    public function registerPostType()
    {
        $labels = [
            'name'                  => _x('Lyrics', 'Post Type General Name', 'wpapi'),
            'singular_name'         => _x('Lyric', 'Post Type Singular Name', 'wpapi'),
            'menu_name'             => __('Lyrics', 'wpapi'),
            'name_admin_bar'        => __('Lyrics', 'wpapi'),
            'archives'              => __('Lyric Archives', 'wpapi'),
            'attributes'            => __('Lyric Attributes', 'wpapi'),
            'parent_item_colon'     => __('Parent Lyric:', 'wpapi'),
            'all_items'             => __('All Lyrics', 'wpapi'),
            'add_new_item'          => __('Add New Lyric', 'wpapi'),
            'add_new'               => __('Add New', 'wpapi'),
            'new_item'              => __('New Lyric', 'wpapi'),
            'edit_item'             => __('Edit Lyric', 'wpapi'),
            'update_item'           => __('Update Lyric', 'wpapi'),
            'view_item'             => __('View Lyric', 'wpapi'),
            'view_items'            => __('View Lyrics', 'wpapi'),
            'search_items'          => __('Search Lyrics', 'wpapi'),
            'not_found'             => __('Not found', 'wpapi'),
            'not_found_in_trash'    => __('Not found in Trash', 'wpapi'),
            'featured_image'        => __('Featured Image', 'wpapi'),
            'set_featured_image'    => __('Set featured image', 'wpapi'),
            'remove_featured_image' => __('Remove featured image', 'wpapi'),
            'use_featured_image'    => __('Use as featured image', 'wpapi'),
            'insert_into_item'      => __('Insert into Lyric', 'wpapi'),
            'uploaded_to_this_item' => __('Uploaded to this Lyric', 'wpapi'),
            'items_list'            => __('Lyrics list', 'wpapi'),
            'items_list_navigation' => __('Lyrics list navigation', 'wpapi'),
            'filter_items_list'     => __('Filter Lyrics list', 'wpapi'),
        ];
        $rewrite = [
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => false,
        ];
        $args = [
            'label'                 => __('Lyric', 'wpapi'),
            'description'           => __('Lyric list', 'wpapi'),
            'labels'                => $labels,
            'supports'              => ['title', 'editor', 'comments', 'revisions', 'page-attributes', 'post-formats', 'thumbnail', 'author'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 151,
            'menu_icon'             => 'dashicons-playlist-audio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => false,
        ];

        register_post_type('lyrics', $args);
    }
}
