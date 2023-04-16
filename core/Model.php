<?php 

namespace App\Core;
abstract class Model 
{

	public const RULE_REQUIRED = 'required';
	public const RULE_UNIQUE = 'unique';
	public const RULE_NUMERIC = 'numeric';

	public const RULE_EMAIL = 'email';
	public const RULE_MIN  = 'min';
	public const RULE_MAX = 'max';
	public const RULE_MATCH = 'match';



public function validateUnique($attribute, $value)
{
    $tableName = static::tableName();
    $statement = Application::$app->db->pdo->prepare("
        SELECT * FROM $tableName WHERE $attribute = :attribute
    ");
    $statement->bindValue(':attribute', $value);
    $statement->execute();
    $record = $statement->fetchObject();
    if ($record) {
        $this->addError($attribute, self::RULE_UNIQUE);
    }
}



	public function loadData($data)
	{
		foreach($data as $key => $value)
		{
			if(property_exists($this, $key))
			{
				$this->{$key} = $value;
			}
		}
	}

	abstract public function rules(): array;


	public array $errors = [];


	public function validate()
	{
		foreach($this->rules() as $attribute => $rules)
		{
			$value = $this->{$attribute};

			foreach($rules as $rule)
			{
				$ruleName = $rule;

				if(!is_string($ruleName))
				{
					$ruleName = $rule[0];
				}

				if($ruleName === self::RULE_REQUIRED && !$value)
				{
					$this->addError($attribute, self::RULE_REQUIRED);

				}
			
				


				if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL))
				{
					$this->addError($attribute, self::RULE_EMAIL);

				}

				if($ruleName === self::RULE_MIN && strlen($value) < $rule['min'])
				{
					$this->addError($attribute, self::RULE_MIN, $rule);					
				}


				if($ruleName === self::RULE_MAX && strlen($value) > $rule['max'])
				{
					$this->addError($attribute, self::RULE_MAX, $rule);					
				}


				if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']})
				{
					$this->addError($attribute, self::RULE_MATCH, $rule);					
				}


				 if ($ruleName === self::RULE_UNIQUE) {
                	$this->validateUnique($attribute, $value);
            	}

            	if($ruleName === self::RULE_NUMERIC && !is_numeric($value))
					{
					    $this->addError($attribute, self::RULE_NUMERIC);
					}

			}
		}
		
		return empty($this->errors);

	}


	public function addError(string $attribute, string $rule, $params = [])
	{
		$message = $this->errorMessages()[$rule] ?? '';

		foreach($params as $key => $value)
		{
			$message = str_replace("{{$key}}", $value, $message);
		}

		$this->errors[$attribute][] = $message;
	}

	public function errorMessages()
	{
		return [

			 self::RULE_REQUIRED => 'This field is required',
			 self::RULE_UNIQUE => 'Sku must be unique',			
			 self::RULE_NUMERIC => 'This field must be a numeric value',			 
		     self::RULE_EMAIL => 'This field must be valid email address',
		     self::RULE_MIN  => 'Min Length of this field must be {min}',
		     self::RULE_MAX => 'Max length of this field must be {max}',
		     self::RULE_MATCH => 'This field must be the same as {match}',

		     //newly added code for validation

		     'size-required' => 'Please provide size',
        'size-numeric' => 'Size must be a numeric value',
        'height-required' => 'Please provide height',
        'height-numeric' => 'Height must be a numeric value',
        'length-required' => 'Please provide length',
        'length-numeric' => 'Length must be a numeric value',
        'width-required' => 'Please provide width',
        'width-numeric' => 'Width must be a numeric value',
        'weight-required' => 'Please provide weight',
        'weight-numeric' => 'Weight must be a numeric value',

		];
	}


	public function hasError($attribute)
	{
		return $this->errors[$attribute] ?? false;
	}


	public function getFirstError($attribute)
	{
		return $this->errors[$attribute][0] ?? false;
	}


}