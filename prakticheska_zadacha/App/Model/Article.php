<?php
class Article
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM articles ORDER BY title ASC";
        $result = $this->mysqli->query($sql);

        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
        return $articles;
    }

    public function getById($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($title, $content, $image = null)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO articles (title, content, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $image);
        return $stmt->execute();
    }

    public function update($id, $title, $content, $image = null)
    {
        if ($image) {
            $stmt = $this->mysqli->prepare("UPDATE articles SET title = ?, content = ?, image = ? WHERE id = ?");
            $stmt->bind_param("sssi", $title, $content, $image, $id);
        } else {
            $stmt = $this->mysqli->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $content, $id);
        }
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
