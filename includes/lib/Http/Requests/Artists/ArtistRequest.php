<?php
/**
 * Artist Add Request Validator
 *
 * @package    WpApi
 * @subpackage WpApi/includes/lib
 */

namespace WpApi\Http\Requests\Artists;

class ArtistRequest
{
    /**
     * Performs a check if user is allowed at all to add a new artist
     *
     * @param \WP_REST_Request $request
     * @return boolean
     */
    public function checkArtistAddPermission(\WP_REST_Request $request)
    {
        $userId = $request->get_param('fake_user_id');

        return ($userId !== 50) ?
            true :
            new \WP_Error(
                'rest_user_unknown',
                __('You have no perimission to do this.'),
                ['status' => 403]
            );
    }

	/**
	 * Example implementation of Artist Name param cleanup
	 *
	 * @param string $param
	 * @return void
	 */
	public function sanitizeParamArtistName($param) {
		return preg_replace('/[^A-Za-z0-9]/', '', $param);
	}

	/**
	 * Example implementation of Artist Description param cleanup
	 *
	 * @param string $param
	 * @return void
	 */
	public function sanitizeParamArtistDescription($param) {
		return filter_var($param, FILTER_SANITIZE_STRING);
	}

	/**
	 * Example implementation of Artist Name param validation
	 *
	 * @param string $param
	 * @return void
	 */
	public function validateParamArtistName($param) {
		return (strlen($param) > 5 && preg_match('/[\W]+/', $param) !== 1) ?
			true :
			new \WP_Error(
				'rest_param_invalid',
				__('The artist name should be X characters long.'),
				['status' => 400]
			);
	}

	/**
	 * Example implementation of Artist Country param validation
	 *
	 * @param string $param
	 * @return void
	 */
	public function validateParamArtistCountry($param) {
		return ($param == 'UK') ?
			true :
			new \WP_Error(
				'rest_param_invalid',
				__('The artist country is not UK.'),
				['status' => 400]
			);
	}

	/**
	 * Stub implementation of user id check
	 *
	 * @param int $param
	 * @return void
	 */
	public function validateParamFakeUserId($param) {
		return (\get_user_by('ID', $param)) ?
			true :
			new \WP_Error(
				'rest_param_invalid',
				__('Unknown user.'),
				['status' => 400]
			);	
	}
}
