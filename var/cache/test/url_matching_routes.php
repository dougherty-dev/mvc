<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/deck' => [[['_route' => 'api_deck', '_controller' => 'App\\Controller\\Cards\\CardAPIDeckController::apiDeck'], null, null, null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api_deck_shuffle', '_controller' => 'App\\Controller\\Cards\\CardAPIDeckController::apiDeckShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api_deck_draw', '_controller' => 'App\\Controller\\Cards\\CardAPIDrawSingleController::apiDeckDraw'], null, ['POST' => 0], null, false, false, null]],
        '/card' => [[['_route' => 'card', '_controller' => 'App\\Controller\\Cards\\CardController::card'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'card_deck', '_controller' => 'App\\Controller\\Cards\\CardController::cardDeck'], null, null, null, false, false, null]],
        '/card/deck/reset' => [[['_route' => 'card_deck_reset', '_controller' => 'App\\Controller\\Cards\\CardController::cardDeckReset'], null, null, null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'card_deck_shuffle', '_controller' => 'App\\Controller\\Cards\\CardController::cardDeckShuffle'], null, null, null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'card_deck_draw', '_controller' => 'App\\Controller\\Cards\\CardDrawController::cardDeckDraw'], null, null, null, false, false, null]],
        '/session' => [[['_route' => 'session', '_controller' => 'App\\Controller\\Cards\\CardProcessController::session'], null, null, null, false, false, null]],
        '/session/delete' => [[['_route' => 'session_delete', '_controller' => 'App\\Controller\\Cards\\CardProcessController::sessionDelete'], null, null, null, false, false, null]],
        '/card/deck/draw/process' => [[['_route' => 'card_deck_draw_process', '_controller' => 'App\\Controller\\Cards\\CardProcessController::cardDeckDrawProcess'], null, ['POST' => 0], null, false, false, null]],
        '/card/deck/deal/process' => [[['_route' => 'card_deck_deal_process', '_controller' => 'App\\Controller\\Cards\\CardProcessController::cardDeckDealProcess'], null, ['POST' => 0], null, false, false, null]],
        '/api/game' => [[['_route' => 'api_game', '_controller' => 'App\\Controller\\Game21\\GameAPIController::apiGame'], null, null, null, false, false, null]],
        '/game/player/bets/process' => [[['_route' => 'game_player_bets_process', '_controller' => 'App\\Controller\\Game21\\GameBetController::gamePlayerBetsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/player/wins/process' => [[['_route' => 'game_player_wins_process', '_controller' => 'App\\Controller\\Game21\\GameContinueController::gamePlayerWinsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game' => [[['_route' => 'game', '_controller' => 'App\\Controller\\Game21\\GameController::game'], null, null, null, false, false, null]],
        '/game/doc' => [[['_route' => 'game_doc', '_controller' => 'App\\Controller\\Game21\\GameController::gameDoc'], null, null, null, false, false, null]],
        '/game/dojo' => [[['_route' => 'game_dojo', '_controller' => 'App\\Controller\\Game21\\GameController::gameDojo'], null, null, null, false, false, null]],
        '/game/player/draws/process' => [[['_route' => 'game_player_draws_process', '_controller' => 'App\\Controller\\Game21\\GamePlayerController::gamePlayerDrawsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/over/process' => [[['_route' => 'game_over_process', '_controller' => 'App\\Controller\\Game21\\GameProcessController::gameOverProcess'], null, ['POST' => 0], null, false, false, null]],
        '/game/options/process' => [[['_route' => 'game_options_process', '_controller' => 'App\\Controller\\Game21\\GameProcessController::gameOptionsProcess'], null, ['POST' => 0], null, false, false, null]],
        '/api/library/books' => [[['_route' => 'api_library_books', '_controller' => 'App\\Controller\\Library\\LibraryAPIController::apiLibraryBooks'], null, null, null, false, false, null]],
        '/library/new/post' => [[['_route' => 'library_new_post', '_controller' => 'App\\Controller\\Library\\LibraryAddController::libraryNewPost'], null, ['POST' => 0], null, false, false, null]],
        '/library' => [[['_route' => 'library', '_controller' => 'App\\Controller\\Library\\LibraryController::library'], null, null, null, false, false, null]],
        '/library/new' => [[['_route' => 'library_new', '_controller' => 'App\\Controller\\Library\\LibraryController::libraryNew'], null, null, null, false, false, null]],
        '/library/reset' => [[['_route' => 'library_reset', '_controller' => 'App\\Controller\\Library\\LibraryController::libraryReset'], null, null, null, false, false, null]],
        '/library/delete' => [[['_route' => 'library_delete', '_controller' => 'App\\Controller\\Library\\LibraryDeleteController::libraryDelete'], null, ['POST' => 0], null, false, false, null]],
        '/library/delete/confirm' => [[['_route' => 'library_delete_confirm', '_controller' => 'App\\Controller\\Library\\LibraryDeleteController::libraryDeleteConfirm'], null, ['POST' => 0], null, false, false, null]],
        '/library/reset/post' => [[['_route' => 'library_reset_post', '_controller' => 'App\\Controller\\Library\\LibraryResetController::libraryResetPost'], null, ['POST' => 0], null, false, false, null]],
        '/library/update' => [[['_route' => 'library_update', '_controller' => 'App\\Controller\\Library\\LibraryUpdateController::libraryUpdate'], null, ['POST' => 0], null, false, false, null]],
        '/library/view' => [[['_route' => 'library_view', '_controller' => 'App\\Controller\\Library\\LibraryViewController::libraryView'], null, null, null, false, false, null]],
        '/api/poker/combinations' => [[['_route' => 'api_poker_combinations', '_controller' => 'App\\Controller\\Poker\\API\\CombinationsAPIController::apiPokerCombinations'], null, ['POST' => 0], null, false, false, null]],
        '/api/poker/game' => [[['_route' => 'api_poker_game', '_controller' => 'App\\Controller\\Poker\\API\\GameAPIController::apiPokerGame'], null, null, null, false, false, null]],
        '/api/poker/hand' => [[['_route' => 'api_poker_hand', '_controller' => 'App\\Controller\\Poker\\API\\HandAPIController::apiPokerHand'], null, ['POST' => 0], null, false, false, null]],
        '/api/poker/hex' => [[['_route' => 'api_poker_hex', '_controller' => 'App\\Controller\\Poker\\API\\HexAPIController::apiPokerHex'], null, ['POST' => 0], null, false, false, null]],
        '/api/poker/hex/decode' => [[['_route' => 'api_poker_hex_decode', '_controller' => 'App\\Controller\\Poker\\API\\HexDecodeAPIController::apiPokerHexDecode'], null, ['POST' => 0], null, false, false, null]],
        '/api/poker/winner' => [[['_route' => 'api_poker_winner', '_controller' => 'App\\Controller\\Poker\\API\\WinnerAPIController::apiPokerWinner'], null, null, null, false, false, null]],
        '/proj/poker/begin' => [[['_route' => 'proj_poker_begin', '_controller' => 'App\\Controller\\Poker\\GameBeginController::projPokerBegin'], null, ['POST' => 0], null, false, false, null]],
        '/proj/poker' => [[['_route' => 'proj_poker', '_controller' => 'App\\Controller\\Poker\\GameController::projPoker'], null, null, null, false, false, null]],
        '/proj/poker/next' => [[['_route' => 'proj_poker_next', '_controller' => 'App\\Controller\\Poker\\GameNextController::projPokerBegin'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/proj/poker/round' => [[['_route' => 'proj_poker_round', '_controller' => 'App\\Controller\\Poker\\GameRoundController::projPokerRound'], null, ['POST' => 0], null, false, false, null]],
        '/proj' => [[['_route' => 'proj', '_controller' => 'App\\Controller\\Poker\\HomeController::proj'], null, null, null, false, false, null]],
        '/proj/about' => [[['_route' => 'proj_about', '_controller' => 'App\\Controller\\Poker\\HomeController::projAbout'], null, null, null, false, false, null]],
        '/proj/reset' => [[['_route' => 'proj_reset', '_controller' => 'App\\Controller\\Poker\\HomeController::projReset'], null, null, null, false, false, null]],
        '/proj/about/database' => [[['_route' => 'proj_about_database', '_controller' => 'App\\Controller\\Poker\\HomeController::projAboutDatabase'], null, null, null, false, false, null]],
        '/proj/api' => [[['_route' => 'proj_api', '_controller' => 'App\\Controller\\Poker\\HomeController::projAPI'], null, null, null, false, false, null]],
        '/proj/reset/post' => [[['_route' => 'proj_reset_post', '_controller' => 'App\\Controller\\Poker\\ResetController::projResetPost'], null, ['POST' => 0], null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::home'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\HomeController::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\HomeController::report'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\HomeController::number'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\HomeController::api'], null, null, null, false, false, null]],
        '/metrics' => [[['_route' => 'metrics', '_controller' => 'App\\Controller\\HomeController::metrics'], null, null, null, false, false, null]],
        '/api/quotation' => [[['_route' => 'quotation', '_controller' => 'App\\Controller\\QuotationsController::quotation'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|deck/d(?'
                        .'|eal/(\\d+)/(\\d+)(?'
                            .'|(*:42)'
                        .')'
                        .'|raw/(\\d+)(?'
                            .'|(*:62)'
                        .')'
                    .')'
                    .'|library/book/([^/]++)(*:92)'
                .')'
                .'|/card/deck/d(?'
                    .'|eal(?:/(\\d+)(?:/(\\d+))?)?(*:140)'
                    .'|raw/(\\d+)(*:157)'
                .')'
                .'|/library/(?'
                    .'|edit/([^/]++)(*:191)'
                    .'|view/([^/]++)(*:212)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        42 => [
            [['_route' => 'api_deck_deal_players_cards', '_controller' => 'App\\Controller\\Cards\\CardAPIDealController::apiDeckDealPlayersCards'], ['players', 'cards'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_deck_deal_players_cards_post', '_controller' => 'App\\Controller\\Cards\\CardAPIDealController::apiDeckDealPlayersCardsPost'], ['players', 'cards'], ['POST' => 0], null, false, true, null],
        ],
        62 => [
            [['_route' => 'api_deck_draw_number_post', '_controller' => 'App\\Controller\\Cards\\CardAPIDrawController::apiDeckDrawNumberPost'], ['number'], ['POST' => 0], null, false, true, null],
            [['_route' => 'api_deck_draw_number', '_controller' => 'App\\Controller\\Cards\\CardAPIDrawController::apiDeckDrawNumber'], ['number'], ['GET' => 0], null, false, true, null],
        ],
        92 => [[['_route' => 'api_library_book_isbn', '_controller' => 'App\\Controller\\Library\\LibraryAPIController::apiLibraryBookIsbn'], ['isbn'], null, null, false, true, null]],
        140 => [[['_route' => 'card_deck_draw_deal_players', 'players' => 0, 'cards' => 0, '_controller' => 'App\\Controller\\Cards\\CardDealController::cardDeckDealPlayersCards'], ['players', 'cards'], null, null, false, true, null]],
        157 => [[['_route' => 'card_deck_draw_number', '_controller' => 'App\\Controller\\Cards\\CardDrawController::cardDeckDrawNumber'], ['number'], null, null, false, true, null]],
        191 => [[['_route' => 'library_edit_id', '_controller' => 'App\\Controller\\Library\\LibraryController::libraryEditID'], ['id'], null, null, false, true, null]],
        212 => [
            [['_route' => 'library_view_id', '_controller' => 'App\\Controller\\Library\\LibraryViewController::libraryViewID'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
