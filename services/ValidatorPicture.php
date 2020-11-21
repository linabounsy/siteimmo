<?php

namespace Services;

class ValidatorPicture
{

    protected function notEmpty($picture)
    {
        if (empty($picture)) {
            return false;
        }
        return true;
    }

    protected function extension($extension, $extensionAllowed)
    {
        
        if (!in_array($extension, $extensionAllowed)) {
            return false;
        }
        return true;
    }

    protected function size($picture, $value) 
    {
        if ($picture > $value) {
            return false;
        }
        return true;
    }

    protected function type($picture, $type)
    {
        if (!in_array($picture, $type)) {
            return false;
        }
        return true;
    }



}
