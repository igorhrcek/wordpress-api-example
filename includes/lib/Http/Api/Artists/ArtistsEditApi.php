<?php
/**
 * Company Registration API Endpoints
 *
 * @package    WpApi
 * @subpackage WpApi/includes/lib
 */

namespace WpApi\Http\Api\Artists;

use WpApi\Services\Artists\ArtistAddService;
use WpApi\Http\Requests\Artists\ArtistRequest;

class ArtistsEditApi extends \WP_REST_Controller
{
    private $version = 1;
    private $base = 'artists';

    public function __construct()
    {
        $this->namespace = 'wpapi/v' . $this->version;
        $this->registerRoutes();
    }

    /**
     * Register REST Endpoint
     *
     * @return void
     */
    public function registerRoutes()
    {
        \register_rest_route($this->namespace, '/' . $this->base . '/(?P<artistid>[0-9]+)', [
            'methods'               =>  \WP_REST_Server::EDITABLE,
            'callback'              =>  [
                '\WpApi\Services\Artists\ArtistEditService', 'add'
            ],
            'permission_callback'   =>  [
                '\WpApi\Http\Requests\Artists\ArtistRequest', 'checkArtistEditPermission'
            ],
            'args'                  =>  [
                'artist_name'    =>  [
                    'required'          =>  true,
                    'sanitize_callback' =>  [
                        '\WpApi\Http\Requests\Artists\ArtistRequest', 'sanitizeParamArtistName'
                    ],
                    'validate_callback' =>  [
                        '\WpApi\Http\Requests\Artists\ArtistRequest', 'validateParamCompanyName'
                    ],
                    'type'              =>  'string',
                    'description'       =>  'Artist Name'
                ],
                'artist_country'    =>  [
                    'required'          =>  true,
                    'validate_callback' =>  [
                        '\WpApi\Http\Requests\Artists\ArtistRequest', 'validateParamArtistCountry'
                    ],
                    'type'              =>  'string',
                    'description'       =>  'Artist Country of Origin'
                ],
                'artist_description'    =>  [
                    'required'          =>  false,
                    'sanitize_callback' =>  [
                        '\WpApi\Http\Requests\Artists\ArtistRequest', 'sanitizeParamArtistDescription'
                    ],
                    'validate_callback' =>  [],
                    'type'              =>  'string',
                    'description'       =>  'Artist Description'
				],
                'fake_user_id'    =>  [
                    'required'          =>  true,
                    'validate_callback' =>  [
                        '\WpApi\Http\Requests\Artists\ArtistRequest', 'validateParamFakeUserId'
                    ],
                    'type'              =>  'integer',
                    'description'       =>  'Fake User Id of logged in user'
                ],
            ]
        ]);
    }
}
