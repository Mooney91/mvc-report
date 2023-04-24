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
    'index' => [[], ['_controller' => 'App\\Controller\\ReportController::index'], [], [['text', '/']], [], [], []],
    'about' => [[], ['_controller' => 'App\\Controller\\ReportController::about'], [], [['text', '/about']], [], [], []],
    'report' => [[], ['_controller' => 'App\\Controller\\ReportController::report'], [], [['text', '/report']], [], [], []],
    'quote' => [[], ['_controller' => 'App\\Controller\\ReportController::quote'], [], [['text', '/api/quote']], [], [], []],
    'lucky' => [[], ['_controller' => 'App\\Controller\\ReportController::number'], [], [['text', '/lucky']], [], [], []],
];
