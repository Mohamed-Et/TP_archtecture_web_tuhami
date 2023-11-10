<?php
require_once('config/database.php');
require_once('DTOs.php');


class BanqueDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CRUD operations for Banque entity
    public function getAll() {
        $query = "SELECT * FROM Banque";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $banques = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $banqueDTO = new BanqueDTO();
            $banqueDTO->id = $row['id'];
            $banqueDTO->nom = $row['nom'];
            $banqueDTO->adresse = $row['adresse'];
            $banqueDTO->codePostal = $row['code_postal'];
            $banqueDTO->ville = $row['ville'];

            $banques[] = $banqueDTO;
        }

        return $banques;
    }

    public function getById($banqueId) {
        $query = "SELECT * FROM Banque WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $banqueId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Banque with the given ID not found
        }

        $banqueDTO = new BanqueDTO();
        $banqueDTO->id = $row['id'];
        $banqueDTO->nom = $row['nom'];
        $banqueDTO->adresse = $row['adresse'];
        $banqueDTO->codePostal = $row['code_postal'];
        $banqueDTO->ville = $row['ville'];

        return $banqueDTO;
    }

    public function save(BanqueDTO $banqueDTO) {
        $query = "INSERT INTO Banque (nom, adresse, code_postal, ville) VALUES (:nom, :adresse, :code_postal, :ville)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $banqueDTO->nom);
        $stmt->bindParam(":adresse", $banqueDTO->adresse);
        $stmt->bindParam(":code_postal", $banqueDTO->code_postal);
        $stmt->bindParam(":ville", $banqueDTO->ville);

        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function update(BanqueDTO $banqueDTO) {
        $query = "UPDATE Banque SET nom = :nom, adresse = :adresse, code_postal = :code_postal, ville = :ville WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $banqueDTO->nom);
        $stmt->bindParam(":adresse", $banqueDTO->adresse);
        $stmt->bindParam(":code_postal", $banqueDTO->codePostal);
        $stmt->bindParam(":ville", $banqueDTO->ville);
        $stmt->bindParam(":id", $banqueDTO->id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($banqueId) {
        $query = "DELETE FROM Banque WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $banqueId);

        if ($stmt->execute()) {
            return true; // Delete successful
        } else {
            return false; // Delete failed
        }
    }
}

class AgenceDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CRUD operations for Agence entity
    public function getAll() {
        $query = "SELECT * FROM Agence";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $agences = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agenceDTO = new AgenceDTO();
            $agenceDTO->id = $row['id'];
            $agenceDTO->id_banque = $row['id_banque'];
            $agenceDTO->nom = $row['nom'];
            $agenceDTO->adresse = $row['adresse'];
            $agenceDTO->codePostal = $row['code_postal'];
            $agenceDTO->ville = $row['ville'];

            $agences[] = $agenceDTO;
        }

        return $agences;
    }

    public function getById($agenceId) {
        $query = "SELECT * FROM Agence WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $agenceId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Agence with the given ID not found
        }

        $agenceDTO = new AgenceDTO();
        $agenceDTO->id = $row['id'];
        $agenceDTO->id_banque = $row['id_banque'];
        $agenceDTO->nom = $row['nom'];
        $agenceDTO->adresse = $row['adresse'];
        $agenceDTO->codePostal = $row['code_postal'];
        $agenceDTO->ville = $row['ville'];

        return $agenceDTO;
    }

    public function save(AgenceDTO $agenceDTO) {
        $query = "INSERT INTO Agence (id_banque, nom, adresse, code_postal, ville) VALUES (:id_banque, :nom, :adresse, :code_postal, :ville)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_banque", $agenceDTO->id_banque);
        $stmt->bindParam(":nom", $agenceDTO->nom);
        $stmt->bindParam(":adresse", $agenceDTO->adresse);
        $stmt->bindParam(":code_postal", $agenceDTO->codePostal);
        $stmt->bindParam(":ville", $agenceDTO->ville);

        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function update(AgenceDTO $agenceDTO) {
        $query = "UPDATE Agence SET id_banque = :id_banque, nom = :nom, adresse = :adresse, code_postal = :code_postal, ville = :ville WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_banque", $agenceDTO->id_banque);
        $stmt->bindParam(":nom", $agenceDTO->nom);
        $stmt->bindParam(":adresse", $agenceDTO->adresse);
        $stmt->bindParam(":code_postal", $agenceDTO->codePostal);
        $stmt->bindParam(":ville", $agenceDTO->ville);
        $stmt->bindParam(":id", $agenceDTO->id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($agenceId) {
        $query = "DELETE FROM Agence WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $agenceId);

        if ($stmt->execute()) {
            return true; // Delete successful
        } else {
            return false; // Delete failed
        }
    }
}

class ClientDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CRUD operations for Client entity
    public function getAll() {
        $query = "SELECT * FROM Client";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clients = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clientDTO = new ClientDTO();
            $clientDTO->id = $row['id'];
            $clientDTO->nom = $row['nom'];
            $clientDTO->prenom = $row['prénom'];
            $clientDTO->dateNaissance = $row['date_naissance'];
            $clientDTO->adresse = $row['adresse'];
            $clientDTO->codePostal = $row['code_postal'];
            $clientDTO->ville = $row['ville'];
            $clientDTO->telephone = $row['téléphone'];
            $clientDTO->email = $row['e_mail'];
            $clientDTO->idAgence = $row['id_agence'];

            $clients[] = $clientDTO;
        }

        return $clients;
    }

    public function getById($clientId) {
        $query = "SELECT * FROM Client WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $clientId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Client with the given ID not found
        }

        $clientDTO = new ClientDTO();
        $clientDTO->id = $row['id'];
        $clientDTO->nom = $row['nom'];
        $clientDTO->prenom = $row['prénom'];
        $clientDTO->dateNaissance = $row['date_naissance'];
        $clientDTO->adresse = $row['adresse'];
        $clientDTO->codePostal = $row['code_postal'];
        $clientDTO->ville = $row['ville'];
        $clientDTO->telephone = $row['téléphone'];
        $clientDTO->email = $row['e_mail'];
        $clientDTO->idAgence = $row['id_agence'];

        return $clientDTO;
    }

    public function save(ClientDTO $clientDTO) {
        $query = "INSERT INTO Client (nom, prénom, date_naissance, adresse, code_postal, ville, téléphone, e_mail, id_agence) VALUES (:nom, :prenom, :date_naissance, :adresse, :code_postal, :ville, :telephone, :e_mail, :id_agence)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $clientDTO->nom);
        $stmt->bindParam(":prenom", $clientDTO->prenom);
        $stmt->bindParam(":date_naissance", $clientDTO->dateNaissance);
        $stmt->bindParam(":adresse", $clientDTO->adresse);
        $stmt->bindParam(":code_postal", $clientDTO->codePostal);
        $stmt->bindParam(":ville", $clientDTO->ville);
        $stmt->bindParam(":telephone", $clientDTO->telephone);
        $stmt->bindParam(":e_mail", $clientDTO->email);
        $stmt->bindParam(":id_agence", $clientDTO->idAgence);

        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function update(ClientDTO $clientDTO) {
        $query = "UPDATE Client SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, adresse = :adresse, code_postal = :code_postal, ville = :ville, telephone = :telephone, e_mail = :e_mail, id_agence = :id_agence WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $clientDTO->nom);
        $stmt->bindParam(":prenom", $clientDTO->prenom);
        $stmt->bindParam(":date_naissance", $clientDTO->dateNaissance);
        $stmt->bindParam(":adresse", $clientDTO->adresse);
        $stmt->bindParam(":code_postal", $clientDTO->codePostal);
        $stmt->bindParam(":ville", $clientDTO->ville);
        $stmt->bindParam(":telephone", $clientDTO->telephone);
        $stmt->bindParam(":e_mail", $clientDTO->email);
        $stmt->bindParam(":id_agence", $clientDTO->idAgence);
        $stmt->bindParam(":id", $clientDTO->id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($clientId) {
        $query = "DELETE FROM Client WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $clientId);

        if ($stmt->execute()) {
            return true; // Delete successful
        } else {
            return false; // Delete failed
        }
    }
}

class CompteDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CRUD operations for Compte entity
    public function getAll() {
        $query = "SELECT * FROM Compte";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $comptes = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $compteDTO = new CompteDTO();
            $compteDTO->id = $row['id'];
            $compteDTO->id_client = $row['id_client'];
            $compteDTO->type = $row['type'];
            $compteDTO->solde = $row['solde'];
            $compteDTO->dateOuverture = $row['date_ouverture'];
            $compteDTO->dateFermeture = $row['date_fermeture'];

            $comptes[] = $compteDTO;
        }

        return $comptes;
    }

    public function getById($compteId) {
        $query = "SELECT * FROM Compte WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $compteId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Compte with the given ID not found
        }

        $compteDTO = new CompteDTO();
        $compteDTO->id = $row['id'];
        $compteDTO->id_client = $row['id_client'];
        $compteDTO->type = $row['type'];
        $compteDTO->solde = $row['solde'];
        $compteDTO->dateOuverture = $row['date_ouverture'];
        $compteDTO->dateFermeture = $row['date_fermeture'];

        return $compteDTO;
    }

    public function save(CompteDTO $compteDTO) {
        $query = "INSERT INTO Compte (id_client, type, solde, date_ouverture, date_fermeture) VALUES (:id_client, :type, :solde, :date_ouverture, :date_fermeture)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_client", $compteDTO->id_client);
        $stmt->bindParam(":type", $compteDTO->type);
        $stmt->bindParam(":solde", $compteDTO->solde);
        $stmt->bindParam(":date_ouverture", $compteDTO->dateOuverture);
        $stmt->bindParam(":date_fermeture", $compteDTO->dateFermeture);

        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function update(CompteDTO $compteDTO) {
        $query = "UPDATE Compte SET id_client = :id_client, type = :type, solde = :solde, date_ouverture = :date_ouverture, date_fermeture = :date_fermeture WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_client", $compteDTO->id_client);
        $stmt->bindParam(":type", $compteDTO->type);
        $stmt->bindParam(":solde", $compteDTO->solde);
        $stmt->bindParam(":date_ouverture", $compteDTO->dateOuverture);
        $stmt->bindParam(":date_fermeture", $compteDTO->dateFermeture);
        $stmt->bindParam(":id", $compteDTO->id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($compteId) {
        $query = "DELETE FROM Compte WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $compteId);

        if ($stmt->execute()) {
            return true; // Delete successful
        } else {
            return false; // Delete failed
        }
    }
}

class Ligne_compteDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CRUD operations for Ligne_compte entity
    public function getAll() {
        $query = "SELECT * FROM Ligne_compte";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $ligneComptes = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ligneCompteDTO = new Ligne_compteDTO();
            $ligneCompteDTO->id = $row['id'];
            $ligneCompteDTO->id_compte = $row['id_compte'];
            $ligneCompteDTO->date = $row['date'];
            $ligneCompteDTO->montant = $row['montant'];
            $ligneCompteDTO->type_transaction = $row['type_transaction'];

            $ligneComptes[] = $ligneCompteDTO;
        }

        return $ligneComptes;
    }

    public function getById($ligneCompteId) {
        $query = "SELECT * FROM Ligne_compte WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $ligneCompteId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Ligne_compte with the given ID not found
        }

        $ligneCompteDTO = new Ligne_compteDTO();
        $ligneCompteDTO->id = $row['id'];
        $ligneCompteDTO->id_compte = $row['id_compte'];
        $ligneCompteDTO->date = $row['date'];
        $ligneCompteDTO->montant = $row['montant'];
        $ligneCompteDTO->type_transaction = $row['type_transaction'];

        return $ligneCompteDTO;
    }

    public function save(Ligne_compteDTO $ligneCompteDTO) {
        $query = "INSERT INTO Ligne_compte (id_compte, date, montant, type_transaction) VALUES (:id_compte, :date, :montant, :type_transaction)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_compte", $ligneCompteDTO->id_compte);
        $stmt->bindParam(":date", $ligneCompteDTO->date);
        $stmt->bindParam(":montant", $ligneCompteDTO->montant);
        $stmt->bindParam(":type_transaction", $ligneCompteDTO->type_transaction);

        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function update(Ligne_compteDTO $ligneCompteDTO) {
        $query = "UPDATE Ligne_compte SET id_compte = :id_compte, date = :date, montant = :montant, type_transaction = :type_transaction WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_compte", $ligneCompteDTO->id_compte);
        $stmt->bindParam(":date", $ligneCompteDTO->date);
        $stmt->bindParam(":montant", $ligneCompteDTO->montant);
        $stmt->bindParam(":type_transaction", $ligneCompteDTO->type_transaction);
        $stmt->bindParam(":id", $ligneCompteDTO->id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($ligneCompteId) {
        $query = "DELETE FROM Ligne_compte WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $ligneCompteId);

        if ($stmt->execute()) {
            return true; // Delete successful
        } else {
            return false; // Delete failed
        }
    }
}


class ConseillerDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CRUD operations for Conseiller entity
    public function getAll() {
        $query = "SELECT * FROM Conseiller";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $conseillers = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $conseillerDTO = new ConseillerDTO();
            $conseillerDTO->id = $row['id'];
            $conseillerDTO->id_agence = $row['id_agence'];
            $conseillerDTO->nom = $row['nom'];
            $conseillerDTO->prenom = $row['prenom'];
            $conseillerDTO->dateNaissance = $row['date_naissance'];
            $conseillerDTO->adresse = $row['adresse'];
            $conseillerDTO->codePostal = $row['code_postal'];
            $conseillerDTO->ville = $row['ville'];
            $conseillerDTO->telephone = $row['telephone'];
            $conseillerDTO->email = $row['e_mail'];

            $conseillers[] = $conseillerDTO;
        }

        return $conseillers;
    }

    public function getById($conseillerId) {
        $query = "SELECT * FROM Conseiller WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $conseillerId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Conseiller with the given ID not found
        }

        $conseillerDTO = new ConseillerDTO();
        $conseillerDTO->id = $row['id'];
        $conseillerDTO->id_agence = $row['id_agence'];
        $conseillerDTO->nom = $row['nom'];
        $conseillerDTO->prenom = $row['prenom'];
        $conseillerDTO->dateNaissance = $row['date_naissance'];
        $conseillerDTO->adresse = $row['adresse'];
        $conseillerDTO->codePostal = $row['code_postal'];
        $conseillerDTO->ville = $row['ville'];
        $conseillerDTO->telephone = $row['telephone'];
        $conseillerDTO->email = $row['e_mail'];

        return $conseillerDTO;
    }

    public function save(ConseillerDTO $conseillerDTO) {
        $query = "INSERT INTO Conseiller (id_agence, nom, prenom, date_naissance, adresse, code_postal, ville, telephone, e_mail) VALUES (:id_agence, :nom, :prenom, :date_naissance, :adresse, :code_postal, :ville, :telephone, :e_mail)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_agence", $conseillerDTO->id_agence);
        $stmt->bindParam(":nom", $conseillerDTO->nom);
        $stmt->bindParam(":prenom", $conseillerDTO->prenom);
        $stmt->bindParam(":date_naissance", $conseillerDTO->dateNaissance);
        $stmt->bindParam(":adresse", $conseillerDTO->adresse);
        $stmt->bindParam(":code_postal", $conseillerDTO->codePostal);
        $stmt->bindParam(":ville", $conseillerDTO->ville);
        $stmt->bindParam(":telephone", $conseillerDTO->telephone);
        $stmt->bindParam(":e_mail", $conseillerDTO->email);

        if ($stmt->execute()) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }

    public function update(ConseillerDTO $conseillerDTO) {
        $query = "UPDATE Conseiller SET id_agence = :id_agence, nom = :nom, prenom = :prenom, date_naissance = :date_naissance, adresse = :adresse, code_postal = :code_postal, ville = :ville, telephone = :telephone, e_mail = :e_mail WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_agence", $conseillerDTO->id_agence);
        $stmt->bindParam(":nom", $conseillerDTO->nom);
        $stmt->bindParam(":prenom", $conseillerDTO->prenom);
        $stmt->bindParam(":date_naissance", $conseillerDTO->dateNaissance);
        $stmt->bindParam(":adresse", $conseillerDTO->adresse);
        $stmt->bindParam(":code_postal", $conseillerDTO->codePostal);
        $stmt->bindParam(":ville", $conseillerDTO->ville);
        $stmt->bindParam(":telephone", $conseillerDTO->telephone);
        $stmt->bindParam(":e_mail", $conseillerDTO->email);
        $stmt->bindParam(":id", $conseillerDTO->id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($conseillerId) {
        $query = "DELETE FROM Conseiller WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $conseillerId);

        if ($stmt->execute()) {
            return true; // Delete successful
        } else {
            return false; // Delete failed
        }
    }
}

?>
