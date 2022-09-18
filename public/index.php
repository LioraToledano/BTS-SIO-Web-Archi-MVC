<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Quizz\Core\Controller\FastRouteCore;

// Gestion des fichiers environnement
//On stock le fichier d environnement .env, on y met tout ce qui est confidentiel, les mots de passe le Dotenv veut dire qu on implemente toujours un dossier de configuration
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Couche Controller
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/', 'Quizz\Controller\HomeController');
    $route->addRoute('GET', '/lister', 'Quizz\Controller\Questionnaire\ListController');
    $route->addRoute('GET', '/detail/{id:\d+}', 'Quizz\Controller\Questionnaire\ViewController');
    $route->addRoute('GET',"/helloworld",'Quizz\Controller\HelloWorldController');
    $route->addRoute("GET", '/nom/{id:\d+}', "Quizz\Controller\NomController");
    $route->addRoute('GET', '/etudiant/add', 'Quizz\Controller\Formulaire\FormController');
    $route->addRoute('POST', '/soumissionformulaire', 'Quizz\Controller\Formulaire\SubmitController');
    $route->addRoute('GET', '/etudiant', 'Quizz\Controller\Formulaire\ListerEtudiantController');
    $route->addRoute('GET', '/etudiant/{id:\d+}', 'Quizz\Controller\Formulaire\EtudiantController');
    $route->addRoute('GET', '/etudiant/{id:\d+}/del', 'Quizz\Controller\Formulaire\DeleteEtudiantController');
    $route->addRoute('POST', '/modifierInformations/{id:\d+}', 'Quizz\Controller\Formulaire\UpdateEtudiantController');







});
// Dispatcher -> Couche view
echo FastRouteCore::getDispatcher($dispatcher);

