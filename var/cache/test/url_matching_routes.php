<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/deck' => [[['_route' => 'api_deck', '_controller' => 'App\\Controller\\CardAPIController::apiDeck'], null, null, null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api_deck_shuffle', '_controller' => 'App\\Controller\\CardAPIController::apiDeckShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api_deck_draw', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDraw'], null, ['POST' => 0], null, false, false, null]],
        '/session' => [[['_route' => 'session', '_controller' => 'App\\Controller\\CardProcessController::session'], null, null, null, false, false, null]],
        '/session/delete' => [[['_route' => 'session_delete', '_controller' => 'App\\Controller\\CardProcessController::sessionDelete'], null, null, null, false, false, null]],
        '/card/deck/draw/process' => [[['_route' => 'card_deck_draw_process', '_controller' => 'App\\Controller\\CardProcessController::cardDeckDrawProcess'], null, ['POST' => 0], null, false, false, null]],
        '/card/deck/deal/process' => [[['_route' => 'card_deck_deal_process', '_controller' => 'App\\Controller\\CardProcessController::cardDeckDealProcess'], null, ['POST' => 0], null, false, false, null]],
        '/card' => [[['_route' => 'card', '_controller' => 'App\\Controller\\CardProcessController::card'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'card_deck', '_controller' => 'App\\Controller\\CardProcessController::cardDeck'], null, null, null, false, false, null]],
        '/card/deck/reset' => [[['_route' => 'card_deck_reset', '_controller' => 'App\\Controller\\CardProcessController::cardDeckReset'], null, null, null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'card_deck_shuffle', '_controller' => 'App\\Controller\\CardProcessController::cardDeckShuffle'], null, null, null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'card_deck_draw', '_controller' => 'App\\Controller\\CardProcessController::cardDeckDraw'], null, null, null, false, false, null]],
        '/api/game' => [[['_route' => 'api_game', '_controller' => 'App\\Controller\\GameAPIController::apiGame'], null, null, null, false, false, null]],
        '/game/player/draws/process' => [[['_route' => 'game_player_draws_process', '_controller' => 'App\\Controller\\GameProcessController::gamePlayerDrawsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/player/bets/process' => [[['_route' => 'game_player_bets_process', '_controller' => 'App\\Controller\\GameProcessController::gamePlayerBetsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/player/wins/process' => [[['_route' => 'game_player_wins_process', '_controller' => 'App\\Controller\\GameProcessController::gamePlayerWinsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/over/process' => [[['_route' => 'game_over_process', '_controller' => 'App\\Controller\\GameProcessController::gameOverProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/options/process' => [[['_route' => 'game_options_process', '_controller' => 'App\\Controller\\GameProcessController::gameOptionsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game' => [[['_route' => 'game', '_controller' => 'App\\Controller\\GameProcessController::game'], null, null, null, false, false, null]],
        '/game/doc' => [[['_route' => 'game_doc', '_controller' => 'App\\Controller\\GameProcessController::gameDoc'], null, null, null, false, false, null]],
        '/game/dojo' => [[['_route' => 'game_dojo', '_controller' => 'App\\Controller\\GameProcessController::gameDojo'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::home'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\HomeController::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\HomeController::report'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\HomeController::number'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\HomeController::api'], null, null, null, false, false, null]],
        '/metrics' => [[['_route' => 'metrics', '_controller' => 'App\\Controller\\HomeController::metrics'], null, null, null, false, false, null]],
        '/library' => [[['_route' => 'library', '_controller' => 'App\\Controller\\LibraryController::library'], null, null, null, false, false, null]],
        '/library/view' => [[['_route' => 'library_view', '_controller' => 'App\\Controller\\LibraryController::libraryView'], null, null, null, false, false, null]],
        '/library/new' => [[['_route' => 'library_new', '_controller' => 'App\\Controller\\LibraryController::libraryNew'], null, null, null, false, false, null]],
        '/library/reset' => [[['_route' => 'library_reset', '_controller' => 'App\\Controller\\LibraryController::libraryReset'], null, null, null, false, false, null]],
        '/api/library/books' => [[['_route' => 'api_library_books', '_controller' => 'App\\Controller\\LibraryController::apiLibraryBooks'], null, null, null, false, false, null]],
        '/library/new/post' => [[['_route' => 'library_new_post', '_controller' => 'App\\Controller\\LibraryProcessController::libraryNewPost'], null, ['POST' => 0], null, false, false, null]],
        '/library/update' => [[['_route' => 'library_update', '_controller' => 'App\\Controller\\LibraryProcessController::libraryUpdate'], null, ['POST' => 0], null, false, false, null]],
        '/library/reset/post' => [[['_route' => 'library_reset_post', '_controller' => 'App\\Controller\\LibraryProcessController::libraryResetPost'], null, ['POST' => 0], null, false, false, null]],
        '/api/quotation' => [[['_route' => 'quotation', '_controller' => 'App\\Controller\\QuotationsController::quotation'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|deck/d(?'
                        .'|raw/(\\d+)(?'
                            .'|(*:36)'
                        .')'
                        .'|eal/(\\d+)/(\\d+)(?'
                            .'|(*:62)'
                        .')'
                    .')'
                    .'|library/book/([^/]++)(*:92)'
                .')'
                .'|/card/deck/d(?'
                    .'|raw/(\\d+)(*:124)'
                    .'|eal(?:/(\\d+)(?:/(\\d+))?)?(*:157)'
                .')'
                .'|/library/(?'
                    .'|view/([^/]++)(*:191)'
                    .'|edit/([^/]++)(*:212)'
                    .'|delete/([^/]++)(*:235)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        36 => [
            [['_route' => 'api_deck_draw_number', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDrawNumber'], ['number'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_deck_draw_number_post', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDrawNumberPost'], ['number'], ['POST' => 0], null, false, true, null],
        ],
        62 => [
            [['_route' => 'api_deck_deal_players_cards', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDealPlayersCards'], ['players', 'cards'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_deck_deal_players_cards_post', '_controller' => 'App\\Controller\\CardAPIController::apiDeckDealPlayersCardsPost'], ['players', 'cards'], ['POST' => 0], null, false, true, null],
        ],
        92 => [[['_route' => 'api_library_book_isbn', '_controller' => 'App\\Controller\\LibraryController::apiLibraryBookIsbn'], ['isbn'], null, null, false, true, null]],
        124 => [[['_route' => 'card_deck_draw_number', '_controller' => 'App\\Controller\\CardProcessController::cardDeckDrawNumber'], ['number'], null, null, false, true, null]],
        157 => [[['_route' => 'card_deck_draw_deal_players', 'players' => 0, 'cards' => 0, '_controller' => 'App\\Controller\\CardProcessController::cardDeckDealPlayersCards'], ['players', 'cards'], null, null, false, true, null]],
        191 => [[['_route' => 'library_view_id', '_controller' => 'App\\Controller\\LibraryController::libraryViewID'], ['id'], null, null, false, true, null]],
        212 => [[['_route' => 'library_edit_id', '_controller' => 'App\\Controller\\LibraryController::libraryEditID'], ['id'], null, null, false, true, null]],
        235 => [
            [['_route' => 'library_delete_id', '_controller' => 'App\\Controller\\LibraryProcessController::libraryDeleteID'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
