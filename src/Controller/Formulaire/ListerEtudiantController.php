<?php

namespace Quizz\Controller\Formulaire;

use Quizz\Core\View\TwigCore;
use Quizz\Model\EtudiantModel;

class ListerEtudiantController
{

    public function inputRequest(array $tabInput)
    {
        // Nulle :)
    }

    public function outputEvent()
    {
        // Obj connect Mysql -> Obj etudiant
        $etudiantModel = new EtudiantModel();

        // Si y a pas de GET alors j'affiche tout
        return TwigCore::getEnvironment()->render(
            'etudiant/list.html.twig',
            [
                'etudiants' => $etudiantModel->getFetchAll()
            ]);
    }


}