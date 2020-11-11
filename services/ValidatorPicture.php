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

    protected function extension($fileExtension, $extensionAllowed)
    {
        $fileName = $_FILES['picture']['name'];
        $fileExtension = strtolower(strrchr($fileName, ".")); // isole le nouveau nom de l'image de l'extension + ajouter lowerCase
        $extensionAllowed = array('.jpg', '.jpeg', '.png'); // extension autorisée
        if (!in_array($fileExtension, $extensionAllowed)) {
            return false;
        }
        return true;
    }

    protected function size($picture, $value) 
    {
        
    }
}

/*// si extention de fichier non correct -> error++ et msg
                if (!in_array($fileExtension,  $extensionAllowed)) {
                    $msgerror['picture'] = 'extension acceptée : .jpg .jpeg et .png';
                    $errors++;
                }

                // si poids de l'image est supérieur à 7mo alors error++ et msg
                if ($size > $maxSize) {
                    $msgerror['size'] = 'taille de fichier supérieur à la taille amxi autorisée';
                    $errors++;
                }

                // si le type mime pas correct alors error++ et msg (vérifier le fichier de l'image)
                if (!in_array($fileType,  $type)) {
                    $msgerror['picture'] = "le contenu ne correspond pas à l'extension du fichier";
                    $errors++;
                }

                if (empty($_FILES['picture']['name'])) {
                    $msgerror['picture'] = 'sélectionner une photo';
                    $errors++;
                }
                */