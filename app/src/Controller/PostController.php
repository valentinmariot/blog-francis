<?php

namespace App\Controller;

use App\Fram\Http;
use App\Fram\Renderer;

class PostController extends Controller
{

    protected string $modelName = \App\Entity\Post::class;

    public function index()
    {

        $posts = $this->model->findAllPosts();

        $pageTitle = "Accueil";

        Renderer::render('posts/index', compact('pageTitle', 'posts'));
    }

    public function show()
    {

        $post_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $post_id = $_GET['id'];
        }
        
        if (!$post_id) {
            die("Manque `id` dans l'URL !!!!");
        }
                   
        
        $post = $this->model->findPost($post_id);
        
        $commentariesModel = new \App\Entity\Commentaries();
        $commentaries =  $commentariesModel->findAllCommentsByPost($post_id);
                
         $pageTitle = $post['title'];        
        
        Renderer::render('posts/show', compact('pageTitle', 'post', 'commentaries', 'post_id'));
    }

    public function delete()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("L'id n'a pas été spécifié");
        }

        $id = $_GET['id'];
        $posts = $this->model->findPost($id);
        if (!$posts) {
            die("L'article $id n'existe pas.");
        }

        $this->model->deletePost($id);

        Http::redirect('index.php');
    }

    public function insert()
    {
        $title = null;
        if (!empty($_POST['title'])) {
            $title = htmlspecialchars($_POST['title']);
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $id_user = null;
        if (!empty($_POST['id_user'])) {
            $id_user = htmlspecialchars($_POST['id_user']);
        }

        if (!$title || !$content) {
            die("Votre formulaire est incomplet.");
        }

        $this->model->insertPost($title, $content, $id_user);

        Http::redirect('index.php');
    }

    public function view()
    {
        $pageTitle = 'Rédiger un nouvel article';
        Renderer::render('posts/insert', compact('pageTitle'));
    }
}