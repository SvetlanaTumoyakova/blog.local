<?
function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data): never
{
    dump($data);
    die;
}

function abort($code = 404)
{
    $title = $code;
    $header = "$code - ";

    switch ($code) {
        case '404':
            $header .= "Page not found";
            break;
        case '500':
            $header .= "Server error";
            break;
        default:
            break;
    }
    require_once(VIEWS . "/error.tmpl.php");
}

function load_req_data(array $fillable)
{
    $data = [];
    foreach ($_POST as $key => $val) {
        if (in_array($key, $fillable)) {
            $data[$key] = trim(htmlentities($val));
        }
    }
    return $data;
}
function old($field_name)
{
    return isset($_POST[$field_name]) ? h($_POST[$field_name]) : "";
}

function h($str)
{
    return trim(htmlentities($str, ENT_QUOTES));
}