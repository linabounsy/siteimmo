<?php

namespace Services;

abstract class Validator {
    
    protected function notEmpty($data) {
        if (empty($data)) {
            return false;
        }
        return true;
    }


    protected function strlenLowerLength($data, $length) {
        if (strlen($data) >= $length) {
            return false;
        }
        return true;
    }
    
    protected function notDiffer($data, $value) {
        if ($data == $value) {
            return false;
        }
        return true;
    }


    protected function numeric($data) {
        if (!is_numeric($data)) {
            return false; 
        }
        return true;
    }


    protected function strlenMaxLength($data, $length) {
        if (strlen($data) < $length) {
            return false;
        }
        return true;
    }

    protected function boolean($data) {
        if (!is_bool($data)) {
            return false;
        }
        return true;
    }


    protected function minZero($data) {
        if ($data < 0) {
            return false;
        }
        return true;
    }

 

}