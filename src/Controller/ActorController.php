<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    #[Route('/actor', name: 'app_actor')]
    public function index(
        ActorRepository $actorRepository, 
        FilmRepository $filmRepository
    ): Response
    {
        // Exemple association fictive utilisateur/adresse
        // $idUser = 1;

        // $currentUser = $userRepository->find($idUser);
        // $address = new Address();
        // $address->setLine1($request->request->get('line1'));
        // $address->setLine2($request->request->get('line2'));
        
        // // Sauvegarde l'adresse
        // $addressRepository->add($address);
        // $currentUser->addAddress($address);
        // $userRepository->add($currentUser);

        $actor = $actorRepository->find(2);
        // On veut accéder aux langues des films
        // foreach($actor->getFilm() as $film) {
        //     printf("%s (%s)", $film->getTitle(), $film->getLanguage()->getName());
        // }

        $film = $filmRepository->find(999);
        // A choisir : soit ajouter, soit supprimer (pour l'exemple)
        //$actor->addFilm($film);
        //$actor->removeFilm($film);
        // Décommenter aussi cette ligne pour sauvegarder les modifications en base
        //$actorRepository->add($actor);

        return $this->render('actor/index.html.twig', [
            'actor' => $actor,
        ]);
    }
}
