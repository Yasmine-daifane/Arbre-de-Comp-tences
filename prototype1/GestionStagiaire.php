

<?php
include  "./Stagiaire.php";

class GestionStagiaire
{
    // Connect Databases
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'DataBase1';

    private function connect() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch(PDOException $e) {
            echo 'connect is error' . $e->getMessage();
        }
    }

    // getstagire
    public function getStagiare() {
        $stmt = $this->connect()->prepare("SELECT * FROM personne  ");
        if(!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        $stagiaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stagiairesData = [];
    

        foreach($stagiaires as $stagiaire) {
            $GestionStagire = new  Stagiaire();
            $GestionStagire->setId($stagiaire['Id']);
            $GestionStagire->setNom($stagiaire['Nom']);
            $GestionStagire->setCne($stagiaire['CNE']);
            array_push($stagiairesData, $GestionStagire);
        }

        return $stagiairesData;
    }

}


?>