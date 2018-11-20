<?php
namespace HelloSubWorld\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class HelloSubWorldRouteServiceProvider
 * @package HelloSubWorld\Providers
 */
class HelloSubWorldRouteServiceProvider extends RouteServiceProvider
{
	/**
	 * @param Router $router
	 */
	public function map(Router $router)
	{
		$router->get('hello', 'HelloSubWorld\Controllers\ContentController@sayHello');
	}

}