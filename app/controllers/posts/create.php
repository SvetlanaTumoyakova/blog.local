<?
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = [];
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

    $validator = new Validator();
    $validation = $validator->validate($data, $rules);


    if (empty($data['title'])) {
        $errors['title'] = "Title is required";
    }
    if (empty($data['descr'])) {
        $errors['descr'] = "Description is required";
    }
    if (empty($data['content'])) {
        $errors['content'] = "Content is required";
    }

    if (empty($errors)) {
        $db->query(
            "INSERT INTO `posts`(`title`, `descr`, `content`) VALUES (?,?,?)",
            [$data['title'], $data['descr'], $data['content']]
        );
    }
}

$title = $header = "New post";

require_once(VIEWS . "/post/create.tmpl.php");
