<?php

namespace Src\Validator;

abstract class BaseValidator
{
    protected array $errors = [];

    public function errors(): array
    {
        return $this->errors;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    abstract public function validate(array $data): bool;
}
