 <?php 
 
 
//  include  "./Stagiaire.php";
if (file_exists('./Entities/Stagiaire.php')) {
    include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
    include '../Entities/Stagiaire.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Stagiaire.php not found in either directory.";
}

  class GestionStagiaire {
    
        private $Connection = Null;
    
        private function getConnection()
        {
            if (is_null($this->Connection)) {
                $this->Connection = mysqli_connect('localhost', 'root', '', 'database1');
                // Vérifier l'ouverture de la connexion avec la base de données
                if (!$this->Connection) {
                    $message = 'Erreur de connexion: ' . mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;
        }
     

    public function GetAllData()
    {
        $sql = 'SELECT * FROM personne';
        $query = mysqli_query($this->getConnection(), $sql);
        $stagiairs_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $stagiairs = array();
        foreach ($stagiairs_data as $stagiair_data) {
            $stagiair = new Stagiaire();
            $stagiair->SetId($stagiair_data['Id']);
            $stagiair->SetNom($stagiair_data['Nom']);
            $stagiair->SetCNE($stagiair_data['CNE']);
            array_push($stagiairs, $stagiair);
        }
        return   $stagiairs;
    }
 
    public function Add($stagiair)
    {
        $Nom = $stagiair->GetNom();
        $CNE =$stagiair->GetCNE();
        // requête SQL
        $sql = "INSERT INTO `personne`(`Nom`, `CNE`) VALUES ('$Nom','$CNE')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Delet($Id)
    {
        $sql = "DELETE FROM personne WHERE Id= '$Id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function GetStagiaireParId($Id)
    {
        $sql = "SELECT * FROM personne WHERE Id= '$Id' ";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $stagiair_data = mysqli_fetch_assoc($result);
        $stagiair = new Stagiaire();
        $stagiair->SetId($stagiair_data['Id']);
        $stagiair->SetNom($stagiair_data['Nom']);
        $stagiair->SetCNE($stagiair_data['CNE']);
        return $stagiair;
    }

    public function Edit($Id,$Nom,$CNE)
    {
        // Requête SQL
        $sql = "UPDATE personne SET  Nom='$Nom', CNE='$CNE' WHERE Id= '$Id'";
        //  
        mysqli_query($this->getConnection(), $sql);
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
    

     



  } 
       

      
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?>