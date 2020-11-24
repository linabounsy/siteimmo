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

    protected function lessThan($pictureSize, $value) 
    {
        if ($pictureSize > $value) {
            return false;
        }
        return true;
    }



}
