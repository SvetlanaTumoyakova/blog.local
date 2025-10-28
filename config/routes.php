<?

$router->get('home', 'posts/index.php');
$router->get('', 'posts/index.php');
$router->get('/', 'posts/index.php');
$router->get('posts', 'posts/index.php');

$router->get('post', 'posts/show.php');

$router->get('posts/create', 'posts/create.php');

$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

$router->get('about', 'about.php');
