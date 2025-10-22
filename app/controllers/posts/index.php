<?
global $db;

$title = "Home";
$header = "Recent posts";

$posts = $db->query("SELECT * FROM `posts` ORDER BY `post_id` DESC")->findAll();

require_once(VIEWS . "/post/index.tmpl.php");