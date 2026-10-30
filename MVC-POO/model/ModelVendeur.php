<?php
/*
FICHIER MODEL pour gérer les interractions avec la BDD concernant la table Vendeur
*/
class ModelVendeur{
    //ATTRIBUT
    private int $idVendeur;
    private string $nomVendeur;
    private string $prenomVendeur;
    private string $emailVendeur;
    private PDO $pdo;

    //CONSTRUCTEUR
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    //GETTER ET SETTER
    /**
     * Get the value of idVendeur
     *
     * @return int
     */
    public function getIdVendeur(): int {
        return $this->idVendeur;
    }

    /**
     * Set the value of idVendeur
     *
     * @param int $idVendeur
     *
     * @return self
     */
    public function setIdVendeur(int $idVendeur): self {
        $this->idVendeur = $idVendeur;
        return $this;
    }

    /**
     * Get the value of nomVendeur
     *
     * @return string
     */
    public function getNomVendeur(): string {
        return $this->nomVendeur;
    }

    /**
     * Set the value of nomVendeur
     *
     * @param string $nomVendeur
     *
     * @return self
     */
    public function setNomVendeur(string $nomVendeur): self {
        $this->nomVendeur = $nomVendeur;
        return $this;
    }

    /**
     * Get the value of prenomVendeur
     *
     * @return string
     */
    public function getPrenomVendeur(): string {
        return $this->prenomVendeur;
    }

    /**
     * Set the value of prenomVendeur
     *
     * @param string $prenomVendeur
     *
     * @return self
     */
    public function setPrenomVendeur(string $prenomVendeur): self {
        $this->prenomVendeur = $prenomVendeur;
        return $this;
    }

    /**
     * Get the value of emailVendeur
     *
     * @return string
     */
    public function getEmailVendeur(): string {
        return $this->emailVendeur;
    }

    /**
     * Set the value of emailVendeur
     *
     * @param string $emailVendeur
     *
     * @return self
     */
    public function setEmailVendeur(string $emailVendeur): self {
        $this->emailVendeur = $emailVendeur;
        return $this;
    }

    /**
     * Get the value of pdo
     *
     * @return PDO
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @param PDO $pdo
     *
     * @return self
     */
    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }

    //METHODS
    public function findAll(){
        //Recupération Liste Vendeur
        try{
            //1. Construire l'objet connexion PDO

            //2. Préparation de la requête
            $request = $this->pdo->prepare("SELECT v.id_vendeur, v.nom_vendeur, v.prenom_vendeur, v.email_vendeur FROM vendeur v");

            //3. Execution de la requête
            $request->execute();

            //4. Récupérere la réponse
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $error){
            return $error->getMessage();
        }
    }


    public function addVendeur(){
        //Enregistrer un utilisateur en BDD
        try{
            //1. Construire l'objet connexion PDO

            //2. Préparation de la requête
            $request = $this->pdo->prepare("INSERT INTO vendeur (nom_vendeur, prenom_vendeur,email_vendeur) VALUES (?,?,?)");

            //3. BindParam
            $request->bindParam(1,$this->nomVendeur,PDO::PARAM_STR);
            $request->bindParam(2,$this->prenomVendeur,PDO::PARAM_STR);
            $request->bindParam(3,$this->emailVendeur,PDO::PARAM_STR);

            //4. Execution de la requête
            $request->execute();

            //5. Retour d'une réponse
            return ['code'=>200, "message"=>"$nom $prenom a été enregistré avec succès"];

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

}