<?php

/**
 *--------------------------------------------------------------------------
 * Swagger Application Documentation
 *--------------------------------------------------------------------------
 *
 * @SWG\Swagger(
	schemes={"http"},
	basePath="/1",
	@SWG\Info(
		title="Layer API",
		description="Join the Layer Revolution",
		version="1.0.0",
		@SWG\Contact(email="dev@cloudoki.com")
	),
	@SWG\ExternalDocumentation(
		description="We also have awesome support",
		url="http://zendesk.com"
	),
	consumes={"application/json"},
	produces={"application/json"},
	@SWG\Response(response="success_string", description="Success string")),
	@SWG\Response(response="success_integer", description="Success integer")),
	@SWG\Response(response="success_object", description="Success resource object response, contents might vary on display or type")),
	@SWG\Response(response="success_array", description="Success array response, might be populated or empty")),
	@SWG\Response(response="success_alias", description="Alias, response identical to reference")),
	@SWG\Response(response="default", description="Unauthorised (re-authorise)")),
	@SWG\Response(response="not_authorised", description="Not Authourised to access this endpoint or resource")),
	@SWG\Response(response="not_found", description="Resource or endpoint not found")
   )
 *
 * Parameter definitions
 * @SWG\Parameter(name="id", description="ID of the trailing endpoint model", in="path", required=true, type="integer")
 * @SWG\Parameter(name="accountId", description="ID of the related Account model", in="path", required=true, type="integer")
 * @SWG\Parameter(name="userId", description="ID of the related User model", in="path", required=true, type="integer")
 *
 * @SWG\Parameter(name="display", description="The schema display option (id, basic or full)", in="path", required=false, type="string", default="basic")
 * @SWG\Parameter(name="ids", description="The ids filtering option, uses comma separation. Only integer ids allowed", in="path", required=false, type="string")
 * @SWG\Parameter(name="q", description="The search option, only simple string allowed", in="path", required=false, type="string")
 *
 * Schema definitions
 * @SWG\definition(definition="index_array", description="list Array of resources", type="array")
 *
 */

/**
 * RESTful Resource Controllers
 * [http://laravel.com/docs/5.2/controllers#restful-resource-controllers]
 *
 * Following routes are supported:
 * GET		/models			index		model.index
 * POST		/models			store		model.store
 * GET		/models/{id}	show		model.show
 * PATCH	/models/{id}	update		model.update
 * DELETE	/models/{id}	destroy		model.destroy
 */

/**
 *  Guest endpoints. No OAuth2 required
 */
Route::group(['prefix' => '1'], function($app)
{
	# System
	$app->get('ping', 'ApiController@ping');

	# Providers
	$app->get   ('providers', 'ProviderController@index');
	$app->post  ('providers', 'ProviderController@store');
	$app->get   ('providers/{id}', 'ProviderController@show');
	$app->patch ('providers/{id}', 'ProviderController@update');
	$app->delete('providers/{id}', 'ProviderController@destroy');

	# Sandwiches
	$app->get   ('sandwiches', 'SandwichController@index');
	$app->post  ('sandwiches', 'SandwichController@store');
	$app->get   ('sandwiches/{id}', 'SandwichController@show');
	$app->patch ('sandwiches/{id}', 'SandwichController@update');
	$app->delete('sandwiches/{id}', 'SandwichController@destroy');

	# Orders
	$app->get   ('orders', 'OrderController@index');
	$app->post  ('orders', 'OrderController@store');
	$app->get   ('orders/{id}', 'OrderController@show');
	$app->patch ('orders/{id}', 'OrderController@update');
	$app->delete('orders/{id}', 'OrderController@destroy');

	# Orders find by customer id
	$app->get   ('orders/customers/{customerId}', 'OrderController@indexByCustomer');
	$app->get   ('orders/{id}/customers/{customerId}', 'OrderController@show');
	$app->patch ('orders/{id}/customers/{customerId}', 'OrderController@update');
	$app->delete('orders/{id}/customers/{customerId}', 'OrderController@destroy');

	# Orders find by provider id
	$app->get   ('orders/providers/{providerId}', 'OrderController@indexByProvider');
	$app->get   ('orders/{id}/providers/{providerId}', 'OrderController@show');
	$app->patch ('orders/{id}/providers/{providerId}', 'OrderController@update');
	$app->delete('orders/{id}/providers/{providerId}', 'OrderController@destroy');
});

Route::group(['prefix' => '1'], function( $app )
{
	$app->get( 'sandwich', 'BroodjesController@sandwich' );
});

/**
 *  Authed endpoints.
 */
Route::group(['prefix' => '1', 'middleware' => 'oauth_bearer'], function($app)
{
	# API Objects
	# Accounts
	$app->resource	('accounts',							'AccountController',		['except' => ['create', 'edit']]);
	$app->resource	('users.accounts',						'AccountController',		['except' => ['create', 'edit']]);

	# Users
	$app->get		('me',									'UserController@me');
	$app->resource	('users',								'UserController',			['except' => ['create', 'edit']]);
	$app->patch 	('users/{id}/password', 				'UserController@updatePassword');
 	$app->patch 	('accounts/{id}/users/{id2}/password', 	'UserController@updatePassword');
 	$app->resource	('accounts.users',						'UserController',			['except' => ['create', 'edit']]);
});
