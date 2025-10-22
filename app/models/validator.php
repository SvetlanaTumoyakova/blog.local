<?
class Validator
{
    private $errors = [];

    private $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
    ];

    private $validators_list = ['required', 'min', 'max'];

    function validate(array $data, array $rules = [])
    {
        foreach ($data as $field_name => $value) {
            if (in_array($field_name, array_keys($rules))) {
                $this->checkAndValidate(field: [
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

                }
            }
        }
    }

    private function andError($fieldname, $err_mess)
    {
        $this->errors[$fieldname][] = $err_mess;
    }
    private function required($value, $rule_value = true)
    {
        return !empty($field);
    }
    private function min($value, $rule_value)
    {
        return mb_strlen($value, "UTF-8") >= $rule_value;
    }

    private function max($value, $rule_value)
    {
        return mb_strlen($value, "UTF-8") <= $rule_value;
    }

}