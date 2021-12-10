<?php

namespace App\Controller;

use App\Fram\Http;

class CommentaryController extends Controller
{
    /**
     * @var string
     */
    protected string $modelName = \App\Entity\Commentaries::class;

    public function insert()
    {
        $postModel = new \App\Entity\Post;

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $post_id = null;
        if (!empty($_POST['post_id']) && ctype_digit($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
        }
        if ( !$post_id || !$content) {
            die("Le formulaire est incomplet");
        }

        $postModel = new \App\Entity\Post;

        $post = $postModel->findPost($post_id);

        if (!$post) {
            die("L'article $post_id n'existe pas.");
        }

        $this->model->insertComment($content, $post_id);

        Http::redirect("index.php?path=post&id=" . $post_id);
    }

    public function delete()
    {

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("L'identifiant n'a pas été spécifié.");
        }
        
        $id = $_GET['id'];
         
        $commentary = $this->model->findComment($id);
        if (!$commentary) {
            die("$id du commentaire n'existe pas.");
        }
        $this->model->deleteComment($id);
        
        $post_id = $commentary['post_id'];
                    
        Http::redirect("index.php?path=post&id=" . $post_id);
    }
}