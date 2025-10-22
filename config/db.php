<?

return [
    'host' => 'MySQL-8.2',
    'username' => 'root',
    "password" => '',
    'charset' => 'utf8',
    'dbname' => "blog",
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
];