<?
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

global $db;
require_once(MODELS . "/Validator.php");

$fillable = ['post_id', 'author_name', 'comment_content'];
$data = load_req_data($fillable);
$rules = [
    'author_name' => [
        'required' => true,
        'min' => 3,
        'max' => 30
    ],
    'comment_content' => [
        'required' => true,
        'min' => 3,
    ],
];

var_dump($data);

$validator = new Validator();
$validation = $validator->validate($data, $rules);

$postId = $data['post_id'];

if (!$validation->hasErrors()) {
    try {
        $db->query(
            "INSERT INTO `comments` (`post_id`, `author_name`, `comment_content`) VALUES (?, ?, ?)",
            [$postId, $data['author_name'], $data['comment_content']]
        );
        $_SESSION['success'] = "Comment created successfully";
    } catch (PDOException $e) {
        $_SESSION['danger'] = "SERVER ERROR";
    }
    redirect("/post?id=$postId");
}

$title = $header = "New comment";
require_once(VIEWS . "/post/showComment.tmpl.php");
