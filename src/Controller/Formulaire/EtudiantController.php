<?php

namespace Quizz\Controller\Formulaire;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;
use Quizz\Model\EtudiantModel;

class EtudiantController implements ControllerInterface
{
    private $id;

    public function inputRequest(array $tabInput)
    {
        if (isset($tabInput["VARS"]["id"])) {
            $this->id = $tabInput["VARS"]["id"];
        }
    }

    public function outputEvent()
    {
        // Obj connect Mysql -> Obj Questionnaire
        $etudiantModel = new EtudiantModel();

        // je teste la variable GET /?id
        if (isset($this->id)) {
            return TwigCore::getEnvironment()->render(
                'etudiant/etudiant.html.twig',
                [
                    'etudiant' => $etudiantModel->getFechId((int) $this->id)
                ]);
        } else {
            return null;
        }
    }
}