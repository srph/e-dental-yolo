<?php

/**
 * -----------------------------
 * Middleware / Filters
 * -----------------------------
 *
 * This contains all interceptors for all files.
 * $middleware->run('auth')
 *
 */

$middleware = new Core\Middleware\Factory;

/**
 * -----------------------------
 * Guest Filter
 * -----------------------------
 *
 * Accessibility strictly only for guests
 *
 */

$middleware->add('guest', function() use ($auth) {
	if ( $auth->check() )
	{
		header('Location: /users/');
		die();
	}
});

/**
 * -----------------------------
 * Authenticated Filter
 * -----------------------------
 *
 * Accessibility strictly only for the authenticated
 *
 */

$middleware->add('auth', function() use ($auth) {
	if ( $auth->guest() )
	{
		header('Location: /login/index.php');
		die();
	}
});