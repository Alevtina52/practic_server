<?php

namespace Src\Validator;

class DateValidator
{
    public static function notPast(string $datetime, string $fieldName = 'Дата'): ?string
    {
        $now = date('Y-m-d H:i:s');
        $input = date('Y-m-d H:i:s', strtotime($datetime));

        if ($input < $now) {
            return "{$fieldName} не может быть в прошлом.";
        }

        return null;
    }

    public static function notFuture(string $date, string $fieldName = 'Дата рождения'): ?string
    {
        $today = date('Y-m-d');
        $input = date('Y-m-d', strtotime($date));

        if ($input > $today) {
            return "{$fieldName} не может быть в будущем.";
        }

        return null;
    }
}
