<?php

/**
 * HexDecodeAPIController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Poker\Helpers\HexDecode;

/**
 * The HexDecodeAPIController class.
 * @SuppressWarnings("StaticAccess")
 */
class HexDecodeAPIController extends AbstractController
{
    /**
     * The API route for decoding hex codes.
     */
    #[Route("/api/poker/hex/decode", name: "api_poker_hex_decode", methods: ['POST'])]
    public function apiPokerHexDecode(Request $request): Response
    {
        $hex = (string) $request->request->get("hex");

        if (strlen($hex) != 8) {
            return new JsonResponse([]);
        }

        $response = new JsonResponse((new HexDecode())->hexDecode($hex));

        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $response;
    }
}
