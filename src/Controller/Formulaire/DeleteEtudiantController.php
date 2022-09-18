<?php

namespace Quizz\Controller\Formulaire;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Model\EtudiantModel;

class DeleteEtudiantController implements ControllerInterface
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
        if (isset($this->id)) {
                [
                    'etudiant' => $etudiantModel->suppressionDonnees((int) $this->id),
                    header("Location: http://localhost:9000/etudiant")
                ];

        } else {
            return null;
        }

    }

}