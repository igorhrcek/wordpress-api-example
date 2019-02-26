<?php
/**
 * Register Artists Post Type
 *
 * @package    WpApi
 * @subpackage WpApi/includes/lib
 */

namespace WpApi\Content\Cpt;

class ArtistsCpt
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
            'name'                  => _x('Artists', 'Post Type General Name', 'wpapi'),
            'singular_name'         => _x('Artist', 'Post Type Singular Name', 'wpapi'),
            'menu_name'             => __('Artists', 'wpapi'),
            'name_admin_bar'        => __('Artists', 'wpapi'),
            'archives'              => __('Artist Archives', 'wpapi'),
            'attributes'            => __('Artist Attributes', 'wpapi'),
            'parent_item_colon'     => __('Parent Artist:', 'wpapi'),
            'all_items'             => __('All Artists', 'wpapi'),
            'add_new_item'          => __('Add New Artist', 'wpapi'),
            'add_new'               => __('Add New', 'wpapi'),
            'new_item'              => __('New Artist', 'wpapi'),
            'edit_item'             => __('Edit Artist', 'wpapi'),
            'update_item'           => __('Update Artist', 'wpapi'),
            'view_item'             => __('View Artist', 'wpapi'),
            'view_items'            => __('View Artists', 'wpapi'),
            'search_items'          => __('Search Artists', 'wpapi'),
            'not_found'             => __('Not found', 'wpapi'),
            'not_found_in_trash'    => __('Not found in Trash', 'wpapi'),
            'featured_image'        => __('Featured Image', 'wpapi'),
            'set_featured_image'    => __('Set featured image', 'wpapi'),
            'remove_featured_image' => __('Remove featured image', 'wpapi'),
            'use_featured_image'    => __('Use as featured image', 'wpapi'),
            'insert_into_item'      => __('Insert into Artist', 'wpapi'),
            'uploaded_to_this_item' => __('Uploaded to this Artist', 'wpapi'),
            'items_list'            => __('Artists list', 'wpapi'),
            'items_list_navigation' => __('Artists list navigation', 'wpapi'),
            'filter_items_list'     => __('Filter Artists list', 'wpapi'),
        ];
        $rewrite = [
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => false,
        ];
        $args = [
            'label'                 => __('Artist', 'wpapi'),
            'description'           => __('Artist list', 'wpapi'),
            'labels'                => $labels,
            'supports'              => ['title', 'editor', 'comments', 'revisions', 'page-attributes', 'post-formats', 'thumbnail', 'author'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 150,
            'menu_icon'             => 'dashicons-universal-access',
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

        register_post_type('artists', $args);
    }
}
