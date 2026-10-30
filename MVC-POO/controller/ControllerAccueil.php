<?php
/*
FICHIER CONTROLLER pour la page d'Accueil
*/
class ControllerAccueil{
    //ATTRIBUT
    private ModelVendeur $modelVendeur;
    private ViewAccueil $viewAccueil;

    //CONSTRUCTEUR
    public function __construct(ModelVendeur $modelVendeur, ViewAccueil $viewAccueil){
        $this->modelVendeur = $modelVendeur;
        $this->viewAccueil = $viewAccueil;
    }

    //GETTER ET SETTER
    /**
     * Get the value of modelVendeur
     *
     * @return ModelVendeur
     */
    public function getModelVendeur(): ModelVendeur {
        return $this->modelVendeur;
    }

    /**
     * Set the value of modelVendeur
     *
     * @param ModelVendeur $modelVendeur
     *
     * @return self
     */
    public function setModelVendeur(ModelVendeur $modelVendeur): self {
        $this->modelVendeur = $modelVendeur;
        return $this;
    }

    /**
     * Get the value of viewAccueil
     *
     * @return ViewAccueil
     */
    public function getViewAccueil(): ViewAccueil {
        return $this->viewAccueil;
    }

    /**
     * Set the value of viewAccueil
     *
     * @param ViewAccueil $viewAccueil
     *
     * @return self
     */
    public function setViewAccueil(ViewAccueil $viewAccueil): self {
        $this->viewAccueil = $viewAccueil;
        return $this;
    }

    //METHOD
    public function render(){
        //1.Récupérer les données utilisateurs
        // -> appelle à findAll() du model et stocker les données retournés dans une variable
        $data = $this->modelVendeur->findAll();

        //2. Vérifier les data pour savoir si je reçois un tableau de donnée ou un message d'erreur
        switch(gettype($data)){
            case "string" :
                //Cas où on reçoit un message d'erreur
                $this->viewAccueil->setMessageError($data)->display();
                break;
            case "array" :
                //Cas où on reçoit nos données
                $this->viewAccueil->setList($data)->display();
                break;
        }
    }
}

