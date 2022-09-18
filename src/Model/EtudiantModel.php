<?php

namespace Quizz\Model;

use PDOException;
use Quizz\Core\Service\DatabaseService;
use Quizz\Entity\Etudiant;

class EtudiantModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DatabaseService::getConnect();
    }

    public function recuperationDonnees()
    {

        try {

            $_POST['password'] = password_hash( $_POST['password'],PASSWORD_DEFAULT );
            $requete = $this->bdd->prepare("INSERT INTO `etudiants` (`login`,`motDePasse`,`nom`,`prenom`,`email`) VALUES( '$_POST[login]','$_POST[password]','$_POST[name]','$_POST[prenom]','$_POST[email]')");
            $requete->execute();
        }
        catch (PDOException $exception){
            echo "Il y a une erreur: " .$exception->getMessage();
        }

    }
    public function getFetchAll()
    {
        $requete = $this->bdd->prepare('SELECT * FROM etudiants');
        $requete->execute();
        $tabEtudiant = [];

        foreach ($requete->fetchAll() as $value)
        {
            $etudiant = new Etudiant();
            $etudiant->setIdEtudiant($value["idEtudiant"]);
            $etudiant->setNom($value["nom"]);
            $etudiant->setPrenom($value["prenom"]);
            $tabEtudiant[] = $etudiant;
        }

        return $tabEtudiant;
    }

    /**
     * @param int $id
     * @return Etudiant
     */
    public function getFechId(int $id)
    {
        $requete = $this->bdd->prepare('SELECT * FROM etudiants where idEtudiant = ' . $id);
        $requete->execute();
        $result = $requete->fetch();

        $etudiant = new Etudiant();
        $etudiant->setIdEtudiant($result["idEtudiant"]);
        $etudiant->setNom($result["nom"]);
        $etudiant->setPrenom($result["prenom"]);

        return  $etudiant;
    }

    /**
     * @param int $id
     * @return Etudiant
     */
    public function suppressionDonnees(int $id)
    {
        $requete = $this->bdd->prepare('DELETE FROM etudiants where idEtudiant = ' . $id);
        $requete->execute();

    }

}