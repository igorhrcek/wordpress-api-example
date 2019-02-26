<?php
/**
 * Artist Registration Service
 *
 * @package    WpApi
 * @subpackage WpApi/includes/lib
 */

namespace WpApi\Service\Artists;

class ArtistAddService
{
	/**
	 * Adds artist to database
	 *
	 * @param \WP_REST_Request $request
	 * @return void
	 */
    public function add(\WP_REST_Request $request)
    {
        $artistName = $request->get_param('artist_name');
        $artistDescription = $request->get_param('artist_description');
        $artistCountry = $request->get_param('artist_country');

        //Insert New Company Post
        $postArgs = [
            'post_type'     =>  'artists',
            'post_status'   =>  'draft',
            'post_author'   =>  1,
            'post_content'  =>  $artistDescription,
            'post_title'    =>  $artistName,
        ];
        $artistId = wp_insert_post($postArgs);

        if (is_wp_error($artistId)) {
            return new \WP_REST_Response([
                'status'    => false,
                'code'      => 'rest_register_artist_failed',
                'message'   =>  __('Failed to add new artist.')
            ], 500);
        }

		//Add meta, call other parts of WordPress here

        //Everything is fine
        return new \WP_REST_Response([
            'status'    => false,
            'code'      => 'rest_artist_registrtation_success',
            'message'   =>  __('Punk is not dead!'),
            'redirect'  =>  site_url('/thank-you'),
        ], 200);
    }
}
