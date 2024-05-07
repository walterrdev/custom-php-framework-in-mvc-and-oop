<?php
/**
 * Controlador para las páginas.
 */
class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();

        $datos = [
            'title' => 'Welcome to Custom PHP framework in MVC and OOP - WALTERRDEV',
            'posts' => $posts
        ];

        $this->view('pages/home', $datos);
    }
    
    public function post()
    {
        // $this->view('pages/post');
    }

    public function edit($idPost)
    {
        echo "ID Post: " . $idPost;
    }
}
