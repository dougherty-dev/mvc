<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/deck' => [[['_route' => 'api_deck', '_controller' => 'App\\Controller\\CardAPIController::apiDeck'], null, null, null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api_deck_shuffle', '_controller' => 'App\\Controller\\CardAPIController::apiDeckShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api_deck_draw', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDraw'], null, ['POST' => 0], null, false, false, null]],
        '/game' => [[['_route' => 'game', '_controller' => 'App\\Controller\\GameController::game'], null, null, null, false, false, null]],
        '/game/doc' => [[['_route' => 'game_doc', '_controller' => 'App\\Controller\\GameController::gameDoc'], null, null, null, false, false, null]],
        '/game/dojo' => [[['_route' => 'game_dojo', '_controller' => 'App\\Controller\\GameController::gameDojo'], null, null, null, false, false, null]],
        '/game/player/draws/process' => [[['_route' => 'game_player_draws_process', '_controller' => 'App\\Controller\\GameController::gamePlayerDrawsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/player/bets/process' => [[['_route' => 'game_player_bets_process', '_controller' => 'App\\Controller\\GameController::gamePlayerBetsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/player/wins/process' => [[['_route' => 'game_player_wins_process', '_controller' => 'App\\Controller\\GameController::gamePlayerWinsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/over/process' => [[['_route' => 'game_over_process', '_controller' => 'App\\Controller\\GameController::gameOverProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/options/process' => [[['_route' => 'game_options_process', '_controller' => 'App\\Controller\\GameController::gameOptionsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/api/game' => [[['_route' => 'api_game', '_controller' => 'App\\Controller\\GameController::apiGame'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::home'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\HomeController::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\HomeController::report'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\HomeController::number'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\HomeController::api'], null, null, null, false, false, null]],
        '/library' => [[['_route' => 'library', '_controller' => 'App\\Controller\\LibraryController::library'], null, null, null, false, false, null]],
        '/library/view' => [[['_route' => 'library_view', '_controller' => 'App\\Controller\\LibraryController::libraryView'], null, null, null, false, false, null]],
        '/library/reset' => [
            [['_route' => 'library_reset', '_controller' => 'App\\Controller\\LibraryController::libraryReset'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'library_reset_post', '_controller' => 'App\\Controller\\LibraryProcessController::libraryResetPost'], null, ['POST' => 0], null, false, false, null],
        ],
        '/library/create' => [[['_route' => 'library_create', '_controller' => 'App\\Controller\\LibraryProcessController::libraryCreate'], null, null, null, false, false, null]],
        '/library/show' => [[['_route' => 'library_show', '_controller' => 'App\\Controller\\LibraryProcessController::libraryShow'], null, null, null, false, false, null]],
        '/session' => [[['_route' => 'session', '_controller' => 'App\\Controller\\ProcessController::session'], null, null, null, false, false, null]],
        '/session/delete' => [[['_route' => 'session_delete', '_controller' => 'App\\Controller\\ProcessController::sessionDelete'], null, null, null, false, false, null]],
        '/card/deck/draw/process' => [[['_route' => 'card_deck_draw_process', '_controller' => 'App\\Controller\\ProcessController::cardDeckDrawProcess'], null, ['POST' => 0], null, false, false, null]],
        '/card/deck/deal/process' => [[['_route' => 'card_deck_deal_process', '_controller' => 'App\\Controller\\ProcessController::cardDeckDealProcess'], null, ['POST' => 0], null, false, false, null]],
        '/card' => [[['_route' => 'card', '_controller' => 'App\\Controller\\ProcessController::card'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'card_deck', '_controller' => 'App\\Controller\\ProcessController::cardDeck'], null, null, null, false, false, null]],
        '/card/deck/reset' => [[['_route' => 'card_deck_reset', '_controller' => 'App\\Controller\\ProcessController::cardDeckReset'], null, null, null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'card_deck_shuffle', '_controller' => 'App\\Controller\\ProcessController::cardDeckShuffle'], null, null, null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'card_deck_draw', '_controller' => 'App\\Controller\\ProcessController::cardDeckDraw'], null, null, null, false, false, null]],
        '/api/quotation' => [[['_route' => 'quotation', '_controller' => 'App\\Controller\\QuotationsController::quotation'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/deck/d(?'
                    .'|raw/(\\d+)(?'
                        .'|(*:228)'
                    .')'
                    .'|eal/(\\d+)/(\\d+)(?'
                        .'|(*:255)'
                    .')'
                .')'
                .'|/library/(?'
                    .'|show/([^/]++)(*:290)'
                    .'|view/([^/]++)(*:311)'
                    .'|delete/([^/]++)(*:334)'
                    .'|update/title/([^/]++)/([^/]++)(*:372)'
                .')'
                .'|/card/deck/d(?'
                    .'|raw/(\\d+)(*:405)'
                    .'|eal(?:/(\\d+)(?:/(\\d+))?)?(*:438)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        228 => [
            [['_route' => 'api_deck_draw_number', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDrawNumber'], ['number'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_deck_draw_number_post', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDrawNumberPost'], ['number'], ['POST' => 0], null, false, true, null],
        ],
        255 => [
            [['_route' => 'api_deck_deal_players_cards', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDealPlayersCards'], ['players', 'cards'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_deck_deal_players_cards_post', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDealPlayersCardsPost'], ['players', 'cards'], ['POST' => 0], null, false, true, null],
        ],
        290 => [[['_route' => 'library_show_id', '_controller' => 'App\\Controller\\LibraryController::libraryShowID'], ['id'], null, null, false, true, null]],
        311 => [[['_route' => 'library_view_id', '_controller' => 'App\\Controller\\LibraryController::libraryViewID'], ['id'], null, null, false, true, null]],
        334 => [[['_route' => 'library_delete_id', '_controller' => 'App\\Controller\\LibraryProcessController::libraryDeleteID'], ['id'], null, null, false, true, null]],
        372 => [[['_route' => 'library_update_title', '_controller' => 'App\\Controller\\LibraryProcessController::libraryUpdateTitle'], ['id', 'value'], null, null, false, true, null]],
        405 => [[['_route' => 'card_deck_draw_number', '_controller' => 'App\\Controller\\ProcessController::cardDeckDrawNumber'], ['number'], null, null, false, true, null]],
        438 => [
            [['_route' => 'card_deck_draw_deal_players', 'players' => 0, 'cards' => 0, '_controller' => 'App\\Controller\\ProcessController::cardDeckDealPlayersCards'], ['players', 'cards'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
