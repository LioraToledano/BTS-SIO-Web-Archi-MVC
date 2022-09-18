<?php

namespace Quizz\Controller\Formulaire;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Model\EtudiantModel;

class SubmitController implements ControllerInterface

{

    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
    }

    public function outputEvent()
    {
        // Obj connect Mysql -> Obj Questionnaire
        $etudiantModel = new EtudiantModel();

        // Si y a pas de GET alors j'affiche tout
         $etudiantModel->recuperationDonnees();


    }
}