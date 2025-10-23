<?
class Validator
{
    private $errors = [];

    private $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
        'email' => "Not valid email",
        'math' => 'The :fieldname: field must be matched  :rulevalue:',
    ];

    public $data;

    private $validators_list = ['required', 'min', 'max', 'email', 'match'];

    function validate(array $data, array $rules = [])
    {
        $this->data = $data;
        foreach ($data as $field_name => $value) {
            if (in_array($field_name, array_keys($rules))) {
                $this->checkAndValidate([
                    'fieldname' => $field_name,
                    'value' => $value,
                    'rules' => $rules[$field_name]
                ]);
            }
        }
        return $this;
    }
    private function checkAndValidate($field)
    {
        foreach ($field['rules'] as $rule => $rule_value) {
            if (in_array($rule, $this->validators_list)) {
                if (call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {
                    $this->addError(
                        $field["fieldname"],
                        str_replace(
                            [':fieldname:', ":rulevalue:"],
                            [$field["fieldname"], $rule_value],
                            $this->messages[$rule]
                        )
                    );
                }
            }
        }
    }
    private function addError($fieldname, $err_mess)
    {
        $this->errors[$fieldname][] = $err_mess;
    }

    function hasErrors()
    {
        return !empty($this->errors);
    }

    function getErrors()
    {
        return $this->errors;
    }

    private function required($value, $rule_value = true)
    {
        return empty($value);
    }
    private function min($value, $rule_value)
    {
        return mb_strlen($value, "UTF-8") <= $rule_value;
    }

    private function max($value, $rule_value)
    {
        return mb_strlen($value, "UTF-8") >= $rule_value + 1;
    }
    private function email($value, $rule_value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    private function math($value, $rule_value)
    {
        return $value == $this->data[$rule_value];
    }

    function listErrors($fieldname)
    {
        $errors_list = '';
        if (isset($this->errors[$fieldname])) {
            $errors_list .= "<div class='invalid-feedback d-block'><ul class='list-unstyled'>";
            foreach ($this->errors[$fieldname] as $error) {
                $errors_list .= "<li>$error</li>";
            }
            $errors_list .= "</ul></div>";
        }
        return $errors_list;
    }
}