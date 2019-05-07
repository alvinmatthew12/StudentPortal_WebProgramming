<?php 

function postNews(){
	global $connect;

	$title = $_POST['title'];
	$content = $_POST['content'];
	$category = $_POST['category'];

	$sql = "INSERT INTO tb_news (category_id, title, content, create_by) VALUES ('$category', '$title', '$content', 'BC University')";
	$query = $connect->query($sql);
	if ($query === TRUE) {
		return true;
	} else {
		return false;
	}

}

function addNewsCategory(){
    global $connect;

    $category_id = $_POST['category_id'];
    $category = $_POST['category'];

    $sql = "INSERT INTO tb_news_category (category_id, category) VALUES ('$category_id', '$category')";
    $query = $connect->query($sql);
    if ($query === TRUE) {
        return true;
    } else {
        return false;
    }

}

function getAllNewsCategory() {
    global $connect;

    $sql = "SELECT * FROM tb_news_category";
    $query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getNewsCategory($id) {
    global $connect;

    $sql = "SELECT * FROM tb_news_category WHERE id = '$id'";
    $query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}


function getAllNewsData() {
	global $connect;

    $sql = "SELECT tb_news.*, tb_news_category.category FROM tb_news INNER JOIN tb_news_category ON tb_news.category_id = tb_news_category.category_id ORDER BY tb_news.id DESC";
    $query = $connect->query($sql);
    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}

function getNewsData($id) {
    global $connect;

    $sql = "SELECT tb_news.*, tb_news_category.category FROM tb_news INNER JOIN tb_news_category ON tb_news.category_id = tb_news_category.category_id WHERE tb_news.id = '$id'";
    $query = $connect->query($sql);

    if ($query->num_rows > 0)
    {
        return $query;
    } else {
        return false;
    }

    $connect->close();
}


function updateNews($id) {
    global $connect;

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    $sql = "UPDATE tb_news SET title = '$title' , content = '$content', category_id = '$category' WHERE id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

function updateNewsCategory($id) {
    global $connect;

    $category_id = $_POST['category_id'];
    $category = $_POST['category'];

    $sql = "UPDATE tb_news_category SET category_id = '$category_id' , category = '$category' WHERE id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}


function deleteNews($id) {
    global $connect;

    $sql = "DELETE FROM tb_news WHERE id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}

function deleteNewsCategory($id) {
    global $connect;

    $sql = "DELETE FROM tb_news_category WHERE id = '$id'";
    $query = $connect->query($sql);
    if($query === TRUE) {
        return true;
    } else {
        return false;
    }

    $connect->close();
}


 ?>
