<?php
class Utilisateur
{

    private $idUser;
    private $nom;
    private $prenom;
    private $email;
    private $date;
    private $mdp;

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }
    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    public function hydrate(array $donnee){
        foreach ($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function inscription(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT email FROM `user` WHERE email=:email');
        $req->execute(array(
            "email" =>$this->getEmail()
        ));
        $res = $req->fetch();
        if (is_array($res)){
            header("Location: ../../vue/inscription.php?erreur=0");
        }else{
            $req = $bdd->getBdd()->prepare('INSERT INTO `user`( `nom`, `prenom`, `email`, `mdp`,  `age`) VALUES ( :nom, :prenom, :email, :mdp, :age) ');
            $req->execute(array(
                'nom'=>$this->getNom(),
                'prenom'=>$this->getPrenom(),
                'age'=>$this->getDate(),
                'email'=>$this->getEmail(),
                'mdp'=>$this->getMdp(),
            ));
            header("Location: ../../vue/inscription.php");
        }
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM `user` WHERE email=:email and mdp=:mdp');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
        ));
        $res = $req->fetch();
        if (is_array($res)){
            $this->setNom($res["nom"]);
            $this->setPrenom($res["prenom"]);
            $this->setDate($res["age"]);
            session_start();

            $_SESSION["user"] = $this;
            header("Location: ../../vue/accueil.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE User SET nom=:nom,prenom=:prenom,age=:age,email=:email WHERE id_user=:id_user');
        $res = $req->execute(array(
            "email" =>$this->getEmail(),
            "age" =>$this->getDate(),
            "prenom" =>$this->getPrenom(),
            "nom" =>$this->getNom(),
            "id_user" =>$this->getIdUser(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php?success");
        }else{
            header("Location: ../../vue/edition.php?id_user=".$this->getIdUser()."&erreur");
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM User WHERE id_user=:id_user');
        $res = $req->execute(array(
            "id_user" =>$this->getIdUser(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php?success");
        }else{
            header("Location: ../../vue/connexion.php?erreur");
        }
    }
}