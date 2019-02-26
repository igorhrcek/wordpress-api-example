<?php
/**
 * Lyric Registration API Endpoints
 *
 * @package    WpApi
 * @subpackage WpApi/includes/lib
 */

namespace WpApi\Http\Api\Lyrics;

use WpApi\Services\Lyrics\LyricAddService;
use WpApi\Http\Requests\Lyrics\LyricRequest;

class LyricsAddApi extends \WP_REST_Controller
{
    private $version = 1;
    private $base = 'lyrics';

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
        \register_rest_route($this->namespace, '/' . $this->base, [
            'methods'               =>  \WP_REST_Server::CREATABLE,
            'callback'              =>  [
                '\WpApi\Services\Lyrics\LyricsAddService', 'add'
            ],
            'permission_callback'   =>  [
                '\WpApi\Http\Requests\Lyrics\LyricsRequest', 'checkLyricsAddPermission'
            ],
            'args'                  =>  [
                'song_title'    =>  [
                    'required'          =>  true,
                    'sanitize_callback' =>  [
                        '\WpApi\Http\Requests\Lyrics\LyricsRequest', 'sanitizeParamSongTitle'
                    ],
                    'validate_callback' =>  [
                        '\WpApi\Http\Requests\Lyrics\LyricsRequest', 'validateParamSongTitle'
                    ],
                    'type'              =>  'string',
                    'description'       =>  'Song Name'
                ],
                'song_artist'    =>  [
                    'required'          =>  false,
                    'sanitize_callback' =>  [
                        '\WpApi\Http\Requests\Lyrics\LyricsRequest', 'sanitizeParamSongArtist'
                    ],
                    'validate_callback' =>  [
						'\WpApi\Http\Requests\Lyrics\LyricsRequest', 'validateParamSongArtist'
					],
                    'type'              =>  'integer',
                    'description'       =>  'The composer of the song (ID)'
				],
                'fake_user_id'    =>  [
                    'required'          =>  true,
                    'validate_callback' =>  [
                        '\WpApi\Http\Requests\Lyrics\LyricsRequest', 'validateParamFakeUserId'
                    ],
                    'type'              =>  'integer',
                    'description'       =>  'Fake User Id of logged in user'
                ]
            ]
        ]);
    }
}
