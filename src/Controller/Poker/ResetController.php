<?php

/**
 * ResetController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Community;
use App\Entity\Players;
use App\Repository\CommunityRepository;
use App\Poker\Faces;

/**
 * The ResetController class.
 */
class ResetController extends SessionController
{
    /**
     * Route for resetting game.
     */
    #[Route('/proj/reset/post', name: 'proj_reset_post', methods: ['POST'])]
    public function projResetPost(
        ManagerRegistry $doctrine,
        CommunityRepository $communityRepository
    ): Response {
        $this->checkSession();
        $this->session->set("bestPokerHand", []);

        $communityRepository->truncateTables();
        $entityManager = $doctrine->getManager();

        foreach ([0, 1, 2] as $handle) {
            $player = new Players();
            $player->setHandle($handle)
                ->setHand([])
                ->setCash(1000)
                ->setBet(0)
                ->setLatestAction(0)
                ->setDealer(false)
                ->setSmallBlind(false)
                ->setBigBlind(false);

            $entityManager->persist($player);
            $entityManager->flush();
        }

        $community = new Community();
        $community->setStatus(0)
            ->setDeck(array_keys(Faces::UNICODE_FACE_ARRAY))
            ->setDiscarded([])
            ->setHand([])
            ->setBetorder([])
            ->setPot(0)
            ->setRaises(0);

        $entityManager->persist($community);
        $entityManager->flush();

        return $this->redirectToRoute('proj_poker');
    }
}
