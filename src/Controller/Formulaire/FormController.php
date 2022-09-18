<?php

namespace Quizz\Controller\Formulaire;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;


class FormController implements ControllerInterface
{

    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
    }

    public function outputEvent()
    {
        // Obj connect Mysql -> Obj Questionnaire
        return TwigCore::getEnvironment()->render('etudiant/Form.html.twig', [

        ]);
    }
}