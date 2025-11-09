<?

$router->get('home', 'posts/index.php');
$router->get('', 'posts/index.php');
$router->get('/', 'posts/index.php');
$router->get('posts', 'posts/index.php');

$router->get('post', 'posts/show.php');

$router->get('posts/create', 'posts/create.php');

$router->get('posts/comment', 'posts/createComment.php');

$router->post('posts', 'posts/store.php');

$router->post('posts/comment', 'posts/storeComment.php');

$router->delete('posts', 'posts/destroy.php');

$router->patch('posts', 'posts/rates.php');

$router->get('about', 'about.php');