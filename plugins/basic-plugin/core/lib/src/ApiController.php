<?php
/**
 * Main WP Appointments rest API controller
 *
 * @package WPMonorepo
 * @since 0.0.1
 */

namespace Core;

use WP_REST_Response;
use WP_Error;

define( 'MONOREPO_API_NAMESPACE', 'monorepo/v1' );

/**
 * Endpoint controller
 */
class ApiController {
	const ROUTE_NAMESPACE = MONOREPO_API_NAMESPACE;

	/**
	 * Init method stub
	 *
	 * @return WP_Error
	 */
	public static function init() {
		return new WP_Error(
			'invalid-method',
			sprintf(
				"Method '%s' not implemented. Must be overridden in subclass.",
				__METHOD__
			),
			array( 'status' => 405 )
		);
	}

	/**
	 * Create normalized error response
	 *
	 * @param string $message    Error message.
	 * @param arr    $data       Hash with additional data. Status is added automatically.
	 * @param int    $status     HTTP status.
	 *
	 * @return WP_REST_Response
	 */
	public static function error( $message = '', $data = array(), $status = 422 ) {
		$response = array(
			'type'    => 'error',
			'message' => $message,
			'data'    => $data,
		);

		$response = new WP_REST_Response( $response );
		$response->set_status( $status );
		return $response;
	}

	/**
	 * Create normalized response
	 *
	 * @param mixed $response Response.
	 *
	 * @return WP_REST_Response
	 */
	public static function response( $response ) {
		$response = new WP_REST_Response( $response );
		$response->set_status( 200 );
		return $response;
	}
}
