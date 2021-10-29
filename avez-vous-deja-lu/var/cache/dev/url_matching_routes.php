<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/backoffice/anecdote' => [[['_route' => 'backoffice_anecdote_browse', '_controller' => 'App\\Controller\\AnecdoteController::browse'], null, ['GET' => 0], null, true, false, null]],
        '/backoffice/anecdote/add' => [[['_route' => 'backoffice_anecdote_add', '_controller' => 'App\\Controller\\AnecdoteController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/anecdotes' => [[['_route' => 'api_anecdote_browse', '_controller' => 'App\\Controller\\Api\\AnecdoteController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/backoffice/category' => [[['_route' => 'backoffice_category_browse', '_controller' => 'App\\Controller\\CategoryController::browse'], null, ['GET' => 0], null, true, false, null]],
        '/backoffice/category/add' => [[['_route' => 'backoffice_category_add', '_controller' => 'App\\Controller\\CategoryController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/backoffice/user' => [[['_route' => 'backoffice_user_browse', '_controller' => 'App\\Controller\\UserController::browse'], null, ['GET' => 0], null, true, false, null]],
        '/backoffice/user/add' => [[['_route' => 'backoffice_user_add', '_controller' => 'App\\Controller\\UserController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/backoffice/(?'
                    .'|anecdote/(?'
                        .'|read/(\\d+)(*:44)'
                        .'|edit/([^/]++)(*:64)'
                        .'|delete/([^/]++)(*:86)'
                    .')'
                    .'|category/(?'
                        .'|read/(\\d+)(*:116)'
                        .'|edit/([^/]++)(*:137)'
                        .'|delete/([^/]++)(*:160)'
                    .')'
                    .'|user/(?'
                        .'|read/(\\d+)(*:187)'
                        .'|edit/([^/]++)(*:208)'
                        .'|delete/([^/]++)(*:231)'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:269)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        44 => [[['_route' => 'backoffice_anecdote_read', '_controller' => 'App\\Controller\\AnecdoteController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        64 => [[['_route' => 'backoffice_anecdote_edit', '_controller' => 'App\\Controller\\AnecdoteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        86 => [[['_route' => 'backoffice_anecdote_delete', '_controller' => 'App\\Controller\\AnecdoteController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        116 => [[['_route' => 'backoffice_category_read', '_controller' => 'App\\Controller\\CategoryController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        137 => [[['_route' => 'backoffice_category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        160 => [[['_route' => 'backoffice_category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        187 => [[['_route' => 'backoffice_user_read', '_controller' => 'App\\Controller\\UserController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        208 => [[['_route' => 'backoffice_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        231 => [[['_route' => 'backoffice_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        269 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
