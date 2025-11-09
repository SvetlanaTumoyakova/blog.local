<?
$title = $header = "New comment";

$postId = (int) $_GET['post_id'];

require_once(VIEWS . "/post/showComment.tmpl.php");
