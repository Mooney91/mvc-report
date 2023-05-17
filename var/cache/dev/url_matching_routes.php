<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'api_start', '_controller' => 'App\\Controller\\APIController::apiStart'], null, null, null, false, false, null]],
        '/api/deck' => [[['_route' => 'api_deck', '_controller' => 'App\\Controller\\APIController::apiDeck'], null, ['GET' => 0], null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api_deck_shuffle', '_controller' => 'App\\Controller\\APIController::apiDeckShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api_deck_draw_num', '_controller' => 'App\\Controller\\APIController::apiDeckDrawNum'], null, ['POST' => 0], null, true, false, null]],
        '/api/deck/deal' => [[['_route' => 'api_deal', '_controller' => 'App\\Controller\\APIController::apiDeal'], null, ['POST' => 0], null, false, false, null]],
        '/api/game' => [[['_route' => 'api_game', '_controller' => 'App\\Controller\\APIController::apiGame'], null, ['GET' => 0], null, false, false, null]],
        '/api/library/books' => [[['_route' => 'api_library_books', '_controller' => 'App\\Controller\\APIController::apiLibraryBooks'], null, null, null, false, false, null]],
        '/card' => [[['_route' => 'card_start', '_controller' => 'App\\Controller\\CardGameController::home'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'card_deck', '_controller' => 'App\\Controller\\CardGameController::deck'], null, null, null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'card_deck_shuffle', '_controller' => 'App\\Controller\\CardGameController::shuffle'], null, null, null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'card_deck_draw', '_controller' => 'App\\Controller\\CardGameController::draw'], null, null, null, false, false, null]],
        '/game' => [[['_route' => 'game_start', '_controller' => 'App\\Controller\\GameController::home'], null, null, null, false, false, null]],
        '/game/init' => [[['_route' => 'game_init', '_controller' => 'App\\Controller\\GameController::init'], null, ['GET' => 0], null, false, false, null]],
        '/game/play' => [
            [['_route' => 'game_play', '_controller' => 'App\\Controller\\GameController::play'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'game_play_post', '_controller' => 'App\\Controller\\GameController::postPlay'], null, ['POST' => 0], null, false, false, null],
        ],
        '/game/doc' => [[['_route' => 'game_doc', '_controller' => 'App\\Controller\\GameController::doc'], null, null, null, false, false, null]],
        '/library' => [[['_route' => 'app_library', '_controller' => 'App\\Controller\\LibraryController::index'], null, null, null, false, false, null]],
        '/library/create' => [
            [['_route' => 'library_create_get', '_controller' => 'App\\Controller\\LibraryController::createBookGet'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'library_create_post', '_controller' => 'App\\Controller\\LibraryController::createBookPost'], null, ['POST' => 0], null, false, false, null],
        ],
        '/library/show' => [[['_route' => 'library_show_all', '_controller' => 'App\\Controller\\LibraryController::showAllLibrary'], null, null, null, false, false, null]],
        '/library/reset' => [
            [['_route' => 'library_reset_get', '_controller' => 'App\\Controller\\LibraryController::resetLibraryGet'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'library_reset_post', '_controller' => 'App\\Controller\\LibraryController::resetLibraryPost'], null, ['POST' => 0], null, false, false, null],
        ],
        '/product' => [[['_route' => 'app_product', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null]],
        '/product/create' => [[['_route' => 'product_create', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, null, null, false, false, null]],
        '/product/show' => [[['_route' => 'product_show_all', '_controller' => 'App\\Controller\\ProductController::showAllProduct'], null, null, null, false, false, null]],
        '/proj' => [[['_route' => 'proj', '_controller' => 'App\\Controller\\ProjectController::index'], null, null, null, false, false, null]],
        '/proj/about' => [[['_route' => 'proj-about', '_controller' => 'App\\Controller\\ProjectController::projAbout'], null, null, null, false, false, null]],
        '/proj/about/database' => [[['_route' => 'proj-database', '_controller' => 'App\\Controller\\ProjectController::projDatabase'], null, null, null, false, false, null]],
        '/proj/education' => [[['_route' => 'proj-education', '_controller' => 'App\\Controller\\ProjectController::education'], null, null, null, false, false, null]],
        '/proj/api' => [[['_route' => 'proj-api', '_controller' => 'App\\Controller\\ProjectController::projApi'], null, null, null, false, false, null]],
        '/proj/api/education' => [[['_route' => 'proj_api_education', '_controller' => 'App\\Controller\\ProjectController::projApiEducation'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\ReportController::index'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\ReportController::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\ReportController::report'], null, null, null, false, false, null]],
        '/api/quote' => [[['_route' => 'quote', '_controller' => 'App\\Controller\\ReportController::quote'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\ReportController::number'], null, null, null, false, false, null]],
        '/metrics' => [[['_route' => 'metrics', '_controller' => 'App\\Controller\\ReportController::metrics'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/library/book/([^/]++)(*:195)'
                .'|/card/deck/d(?'
                    .'|raw/(\\d+)(*:227)'
                    .'|eal/(\\d+)/(\\d+)(*:250)'
                .')'
                .'|/library/(?'
                    .'|show/([^/]++)(*:284)'
                    .'|delete/([^/]++)(?'
                        .'|(*:310)'
                    .')'
                    .'|update/([^/]++)(?'
                        .'|(*:337)'
                    .')'
                .')'
                .'|/product/(?'
                    .'|show/([^/]++)(*:372)'
                    .'|delete/([^/]++)(*:395)'
                    .'|update/([^/]++)/([^/]++)(*:427)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        195 => [[['_route' => 'api_book_by_isbn', '_controller' => 'App\\Controller\\APIController::apiBookByIsbn'], ['isbn'], null, null, false, true, null]],
        227 => [[['_route' => 'card_deck_draw_num', '_controller' => 'App\\Controller\\CardGameController::drawWithNum'], ['num'], null, null, false, true, null]],
        250 => [[['_route' => 'card_deck_deal', '_controller' => 'App\\Controller\\CardGameController::deal'], ['num1', 'num2'], null, null, false, true, null]],
        284 => [[['_route' => 'library_by_id', '_controller' => 'App\\Controller\\LibraryController::showLibraryById'], ['id'], null, null, false, true, null]],
        310 => [
            [['_route' => 'library_delete_by_id_get', '_controller' => 'App\\Controller\\LibraryController::deleteLibraryByIdGet'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'library_delete_by_id_post', '_controller' => 'App\\Controller\\LibraryController::deleteLibraryByIdPost'], ['id'], ['POST' => 0], null, false, true, null],
        ],
        337 => [
            [['_route' => 'library_update_get', '_controller' => 'App\\Controller\\LibraryController::updateLibraryGet'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'library_update_post', '_controller' => 'App\\Controller\\LibraryController::updateLibraryPost'], ['id'], ['POST' => 0], null, false, true, null],
        ],
        372 => [[['_route' => 'product_by_id', '_controller' => 'App\\Controller\\ProductController::showProductById'], ['id'], null, null, false, true, null]],
        395 => [[['_route' => 'product_delete_by_id', '_controller' => 'App\\Controller\\ProductController::deleteProductById'], ['id'], null, null, false, true, null]],
        427 => [
            [['_route' => 'product_update', '_controller' => 'App\\Controller\\ProductController::updateProduct'], ['id', 'value'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
