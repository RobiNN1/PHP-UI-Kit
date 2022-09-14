<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Get a UI Kit object.
 *
 * Note: No need to create this function, it only overrides defaults when using helpers.
 *
 * @return RobiNN\UiKit\UiKit
 */
function get_ui(): RobiNN\UiKit\UiKit {
    return new RobiNN\UiKit\UiKit([
        'cache'     => __DIR__.'/../cache',
        'debug'     => true,
        'framework' => $_GET['fw'] ?? 'bootstrap5',
    ]);
}

echo get_ui()->addPath(__DIR__.'/templates')->render('page', [
    'frameworks' => array_keys(get_ui()->config->getAllFrameworks()),
]);
