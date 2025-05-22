<?php

/**
 * StatesController class.
 * Author: nido24
 */

declare (strict_types=1);

namespace App\Controller\Poker\Unit;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommunityRepository;
use App\Entity\Community;
use App\Entity\Players;
use App\Poker\Faces;

/**
 * The StatesController class.
 */
class StatesController extends AbstractController
{
    /**
     * Route for changing game parameters for testing purposes.
     */
    #[Route('/proj/unit/states', name: 'proj_unit_states', methods: ['POST'])]
    public function projUnitStatest(
        Request $request,
        ManagerRegistry $doctrine,
        CommunityRepository $communityRepository
    ): Response {
        $communityRepository->truncateTables();
        $entityManager = $doctrine->getManager();

        $req = $request->request->all();

        foreach ($req["players"] as $key => $player) {
            $entityPlayer = new Players();
            $entityPlayer->setHandle($key)
                ->setHand($player["hand"])
                ->setCash(intval($player["cash"]))
                ->setBet(intval($player["bet"]))
                ->setLatestAction(intval($player["action"]))
                ->setDealer(boolval($player["dealer"]))
                ->setSmallBlind(boolval($player["smallblind"]))
                ->setBigBlind(boolval($player["bigblind"]));

            $entityManager->persist($entityPlayer);
            $entityManager->flush();
        }

        $community = new Community();
        $community->setStatus(intval($req["community"]["status"]))
            ->setHand($req["community"]["hand"])
            ->setPot(intval($req["community"]["pot"]))
            ->setRaises(intval($req["community"]["raises"]));

        $entityManager->persist($community);
        $entityManager->flush();

        return $this->redirectToRoute('proj_poker');
    }
}
