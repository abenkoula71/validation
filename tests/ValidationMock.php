<?php namespace Tests\Validation;

use Framework\Validation\Validation;

class ValidationMock extends Validation
{
	public function parseRule(string $rule) : array
	{
		return parent::parseRule($rule);
	}

	public function extractRules(string $rules) : array
	{
		return parent::extractRules($rules);
	}
}
