<?php

namespace App\Controller;

use App\Fram\Http;
use App\Fram\Renderer;

class UserController extends Controller
{
    protected string $modelName = \App\Entity\User::class;

    public function index()
    {

        $users = $this->model->findAllUsers();

        $pageTitle = "Liste des utilisateurs";

        Renderer::render('users/index', compact('pageTitle', 'users'));
    }

    public function show()
    {

        $user_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $user_id = $_GET['id'];
        }
        
        if (!$user_id) {
            die("Manque `id` dans l'URL !!!!");
        }
                   
        $user = $this->model->findUser($user_id);        
        $pageTitle = 'Liste des utilisateurs';
        Renderer::render('users/show', compact('pageTitle', 'user', 'user_id'));
    }

    public function delete()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("L'id n'a pas été spécifié");
        }

        $id = $_GET['id'];
        $user = $this->model->findUser($id);
        if (!$user) {
            die( "$id de l'user n'existe pas.");
        }

        $this->model->deleteUser($id);

        Http::redirect('index.php?path=userlist');
    }

    public function update()
    {
        $id = $_POST['user_id'];
    
        
        $user = $this->model->findUser($id);
        if (!$user) {
            die("L'article $id n'existe pas.");
        }
        $isAdmin = $_POST['isAdmin'];
        if ($isAdmin == 'on'){
            $isAdmin = true;
        } else { $isAdmin = false;}
      
        $this->model->updateUser($id, $isAdmin);

        Http::redirect('index.php?path=userlist');

    }

    public function insert()
    {
        $firstname = null;
        if (!empty($_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
        }

        $lastname = null;
        if (!empty($_POST['lastname'])) {
            $lastname = htmlspecialchars($_POST['lastname']);
        }

        $mail = null;
        if (!empty($_POST['mail'])) {
            $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        }

        $pwd = null;
        if (!empty($_POST['pwd'])) {
            $pwd = htmlspecialchars($_POST['pwd']);
        }

        if ( !$firstname || !$lastname || !$mail || !$pwd ) {
        
            die("Le formulaire a été mal rempli !");
        }

        $this->model->insertUser($firstname, $lastname, $mail, $pwd);

        Http::redirect("index.php");
    }

    public function viewSignup()
    {
        $pageTitle = "S'enregistrer";
        Renderer::render('users/signup', compact('pageTitle'));
    }

    public function viewConnect()
    {
        $pageTitle = "Connexion";
        Renderer::render('users/connect', compact('pageTitle'));
    }

    public function connection()
    {

        if(empty($_POST)){
            $_SESSION['error'][]="Entrées invalides.";
        }elseif($_POST['mail']==''){
            $_SESSION['error'][]="Veuillez saisir votre adresse e-mail.";
        }elseif($_POST['pwd']==''){
            $_SESSION['error'][]="Veuillez saisir vote mot de passe.";
        }else{
        
            $mail = htmlspecialchars(trim($_POST['mail']));
            $pwd =htmlspecialchars(trim($_POST['pwd']));

            $this->model->getUserInformations($mail, $pwd);
        }
        
    }
}