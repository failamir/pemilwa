<?php

namespace App\Middleware;


/**
 * 
 */
class CsrfViewMiddleware extends Middleware
{
	
	function __invoke($request, $response, $next)
	{
		$this->c->view->getEnvironment()->addGlobal('csrf', [
           'field' => '
                   <input type="hidden" name="'. $this->c->csrf->getTokenNameKey() .'" value="'. $this->c->csrf->getTokenName() .'">
                   <input type="hidden" name="'. $this->c->csrf->getTokenValueKey() .'" value="'. $this->c->csrf->getTokenValue() .'">
           ',
		]);;

		$response = $next($request, $response);

		return $response;
	}
}

?>