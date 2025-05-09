<?php
require_once 'App/Model/Article.php';

class ArticleController
{
    private $articleModel;

    public function __construct($mysqli)
    {
        $this->articleModel = new Article($mysqli);
    }

    public function index()
    {
        $articles = $this->articleModel->getAll();

        include 'App/View/Article/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $image = null;

            if (!empty($_FILES['image']['name'])) {
                $uploadDir = 'public/uploads/';
                $image = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $image);
            }

            $this->articleModel->create($title, $content, $image);
            header("Location: index.php?controller=Article&action=index");
            exit;
        }

        include 'App/View/Article/articleForm.php';
    }

    public function view()
{
    $id = $_GET['id'] ?? null;
    if (!$id) {
        echo "Няма статия с това ID";
        return;
    }

    $article = $this->articleModel->getById($id);
    if (!$article) {
        echo "Статията не е намерена";
        return;
    }

    include 'App/View/Article/viewArticle.php';
}

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Няма статия с това ID";
            return;
        }

        $article = $this->articleModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $image = $article['image'];

            if (!empty($_FILES['image']['name'])) {
                $uploadDir = 'public/uploads/';
                $image = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $image);
            }

            $this->articleModel->update($id, $title, $content, $image);
            header("Location: index.php?controller=Article&action=index");
            exit;
        }

        include 'App/View/Article/articleForm.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->articleModel->delete($id);
        }

        header("Location: index.php?controller=Article&action=index");
        exit;
    }
}
?>
