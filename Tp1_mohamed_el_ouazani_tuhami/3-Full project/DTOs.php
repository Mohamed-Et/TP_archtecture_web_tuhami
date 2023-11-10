<?php

class BanqueDTO {
    public $id;
    public $nom;
    public $adresse;
    public $code_postal;
    public $ville;
}

class AgenceDTO {
    public $id;
    public $id_banque;
    public $nom;
    public $adresse;
    public $code_postal;
    public $ville;
}

class ClientDTO {
    public $id;
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $adresse;
    public $codePostal;
    public $ville;
    public $telephone;
    public $email;
    public $idAgence;
}

class CompteDTO {
    public $id;
    public $id_client;
    public $type;
    public $solde;
    public $dateOuverture;
    public $dateFermeture;
}

class Ligne_compteDTO {
    public $id;
    public $id_compte;
    public $date;
    public $montant;
    public $type_transaction;
}


class ConseillerDTO {
    public $id;
    public $id_agence;
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $adresse;
    public $codePostal;
    public $ville;
    public $telephone;
    public $email;
}

?>
