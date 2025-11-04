<?
require_once MODELS . "/Pagination.php";
global $db;

$title = "Home";
$header = "Recent posts";

$page = $_GET['page'] ?? 1;
$total = $db->query("SELECT COUNT(*) FROM `posts`")->getColumn();
$pagination = new Pagination($page, $total);

$start_id = $pagination->getStartId();

$posts = $db->query("SELECT * FROM `posts` ORDER BY `post_id` DESC LIMIT $start_id, $pagination->perPage")->findAll();

require_once(VIEWS . "/post/index.tmpl.php");