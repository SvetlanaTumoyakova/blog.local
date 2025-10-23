<?
require_once(MODELS . "/Validator.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fillable = ['title', 'descr', 'content'];
    $data = load_req_data($fillable);
    $rules = [
        'title' => [
            'required' => true,
            'min' => 3,
            'max' => 8
        ],
        'descr' => [
            'required' => true,
            'min' => 3,
            'max' => 8
        ],
        'content' => [
            'required' => true,
            'min' => 5,
        ]
    ];

    $data2 = [
        "email" => "lilian@gmail.com",
        'pass' => '1234',
        "pass_confirm" => '1234'
    ];

    $rules2 = [
        'email' => [
            'email' => true
        ],
        'pass' => [
            'required' => true,
            'min' => 3
        ],
        "pass_confirm" => [
            'math' => 'pass'
        ]
    ];

    $validator = new Validator();
    $validation = $validator->validate($data, $rules);

    if (!$validation->hasErrors()) {
        try {
            $db->query("INSERT INTO `posts`(`title`, `descr`, `content`) VALUES (?,?,?)", [$data['title'], $data['descr'], $data['content']]);
            $__SESSION['success'] = "Post created successfully";
        } catch (PDOException $e) {
            $__SESSION['error'] = "SERVER ERROR";
        }
        redirect('home');
    }
}

$title = $header = "New post";

require_once(VIEWS . "/post/create.tmpl.php");