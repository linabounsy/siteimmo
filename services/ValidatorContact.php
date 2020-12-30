<?php


namespace Services;

class ValidatorContact
{

    protected function notEmpty($data)
    {
        if (empty($data)) {
            return false;
        }
        return true;
    }


    protected function strlenLowerLength($data, $length)
    {
        if (strlen($data) >= $length) {
            return false;
        }
        return true;
    }

    protected function strlenLowerLengthPhone($data, $length)
    {
        if (strlen($data) != $length) {
            return false;
        }
        return true;
    }


    protected function numeric($data)
    {
        if (!is_numeric($data)) {
            return false;
        }
        return true;
    }


    protected function emailRegex($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}
