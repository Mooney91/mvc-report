<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'api_start' => [[], ['_controller' => 'App\\Controller\\APIController::apiStart'], [], [['text', '/api']], [], [], []],
    'api_deck' => [[], ['_controller' => 'App\\Controller\\APIController::apiDeck'], [], [['text', '/api/deck']], [], [], []],
    'api_deck_shuffle' => [[], ['_controller' => 'App\\Controller\\APIController::apiDeckShuffle'], [], [['text', '/api/deck/shuffle']], [], [], []],
    'api_deck_draw_num' => [[], ['_controller' => 'App\\Controller\\APIController::apiDeckDrawNum'], [], [['text', '/api/deck/draw/']], [], [], []],
    'api_deal' => [[], ['_controller' => 'App\\Controller\\APIController::apiDeal'], [], [['text', '/api/deck/deal']], [], [], []],
    'api_game' => [[], ['_controller' => 'App\\Controller\\APIController::apiGame'], [], [['text', '/api/game']], [], [], []],
    'api_library_books' => [[], ['_controller' => 'App\\Controller\\APIController::apiLibraryBooks'], [], [['text', '/api/library/books']], [], [], []],
    'api_book_by_isbn' => [['isbn'], ['_controller' => 'App\\Controller\\APIController::apiBookByIsbn'], [], [['variable', '/', '[^/]++', 'isbn', true], ['text', '/api/library/book']], [], [], []],
    'card_start' => [[], ['_controller' => 'App\\Controller\\CardGameController::home'], [], [['text', '/card']], [], [], []],
    'card_deck' => [[], ['_controller' => 'App\\Controller\\CardGameController::deck'], [], [['text', '/card/deck']], [], [], []],
    'card_deck_shuffle' => [[], ['_controller' => 'App\\Controller\\CardGameController::shuffle'], [], [['text', '/card/deck/shuffle']], [], [], []],
    'card_deck_draw' => [[], ['_controller' => 'App\\Controller\\CardGameController::draw'], [], [['text', '/card/deck/draw']], [], [], []],
    'card_deck_draw_num' => [['num'], ['_controller' => 'App\\Controller\\CardGameController::drawWithNum'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'card_deck_deal' => [['num1', 'num2'], ['_controller' => 'App\\Controller\\CardGameController::deal'], ['num1' => '\\d+', 'num2' => '\\d+'], [['variable', '/', '\\d+', 'num2', true], ['variable', '/', '\\d+', 'num1', true], ['text', '/card/deck/deal']], [], [], []],
    'game_start' => [[], ['_controller' => 'App\\Controller\\GameController::home'], [], [['text', '/game']], [], [], []],
    'game_init' => [[], ['_controller' => 'App\\Controller\\GameController::init'], [], [['text', '/game/init']], [], [], []],
    'game_play' => [[], ['_controller' => 'App\\Controller\\GameController::play'], [], [['text', '/game/play']], [], [], []],
    'game_play_post' => [[], ['_controller' => 'App\\Controller\\GameController::postPlay'], [], [['text', '/game/play']], [], [], []],
    'game_doc' => [[], ['_controller' => 'App\\Controller\\GameController::doc'], [], [['text', '/game/doc']], [], [], []],
    'app_library' => [[], ['_controller' => 'App\\Controller\\LibraryController::index'], [], [['text', '/library']], [], [], []],
    'library_create_get' => [[], ['_controller' => 'App\\Controller\\LibraryController::createBookGet'], [], [['text', '/library/create']], [], [], []],
    'library_create_post' => [[], ['_controller' => 'App\\Controller\\LibraryController::createBookPost'], [], [['text', '/library/create']], [], [], []],
    'library_show_all' => [[], ['_controller' => 'App\\Controller\\LibraryController::showAllLibrary'], [], [['text', '/library/show']], [], [], []],
    'library_by_id' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::showLibraryById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/show']], [], [], []],
    'library_delete_by_id_get' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::deleteLibraryByIdGet'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/delete']], [], [], []],
    'library_delete_by_id_post' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::deleteLibraryByIdPost'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/delete']], [], [], []],
    'library_update_get' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::updateLibraryGet'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/update']], [], [], []],
    'library_update_post' => [['id'], ['_controller' => 'App\\Controller\\LibraryController::updateLibraryPost'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/library/update']], [], [], []],
    'library_reset_get' => [[], ['_controller' => 'App\\Controller\\LibraryController::resetLibraryGet'], [], [['text', '/library/reset']], [], [], []],
    'library_reset_post' => [[], ['_controller' => 'App\\Controller\\LibraryController::resetLibraryPost'], [], [['text', '/library/reset']], [], [], []],
    'app_product' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product']], [], [], []],
    'product_create' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/product/create']], [], [], []],
    'product_show_all' => [[], ['_controller' => 'App\\Controller\\ProductController::showAllProduct'], [], [['text', '/product/show']], [], [], []],
    'product_by_id' => [['id'], ['_controller' => 'App\\Controller\\ProductController::showProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/show']], [], [], []],
    'product_delete_by_id' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProductById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/delete']], [], [], []],
    'product_update' => [['id', 'value'], ['_controller' => 'App\\Controller\\ProductController::updateProduct'], [], [['variable', '/', '[^/]++', 'value', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/product/update']], [], [], []],
    'proj' => [[], ['_controller' => 'App\\Controller\\ProjectController::index'], [], [['text', '/proj']], [], [], []],
    'proj-about' => [[], ['_controller' => 'App\\Controller\\ProjectController::projAbout'], [], [['text', '/proj/about']], [], [], []],
    'proj-database' => [[], ['_controller' => 'App\\Controller\\ProjectController::projDatabase'], [], [['text', '/proj/about/database']], [], [], []],
    'proj-education' => [[], ['_controller' => 'App\\Controller\\ProjectController::education'], [], [['text', '/proj/education']], [], [], []],
    'proj-api' => [[], ['_controller' => 'App\\Controller\\ProjectController::projApi'], [], [['text', '/proj/api']], [], [], []],
    'proj_api_education' => [[], ['_controller' => 'App\\Controller\\ProjectController::projApiEducation'], [], [['text', '/proj/api/education']], [], [], []],
    'index' => [[], ['_controller' => 'App\\Controller\\ReportController::index'], [], [['text', '/']], [], [], []],
    'about' => [[], ['_controller' => 'App\\Controller\\ReportController::about'], [], [['text', '/about']], [], [], []],
    'report' => [[], ['_controller' => 'App\\Controller\\ReportController::report'], [], [['text', '/report']], [], [], []],
    'quote' => [[], ['_controller' => 'App\\Controller\\ReportController::quote'], [], [['text', '/api/quote']], [], [], []],
    'lucky' => [[], ['_controller' => 'App\\Controller\\ReportController::number'], [], [['text', '/lucky']], [], [], []],
    'metrics' => [[], ['_controller' => 'App\\Controller\\ReportController::metrics'], [], [['text', '/metrics']], [], [], []],
];
