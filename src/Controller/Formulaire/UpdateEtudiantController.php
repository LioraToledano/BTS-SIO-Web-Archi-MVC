<?php

namespace Quizz\Controller\Formulaire;

use Quizz\Model\EtudiantModel;

class UpdateEtudiantController
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
                'etudiant' => $etudiantModel->ModificationDonnees((int) $this->id),
                 header("Location: http://localhost:9000/etudiant")
            ];

        } else {
            return null;
        }

    }


}