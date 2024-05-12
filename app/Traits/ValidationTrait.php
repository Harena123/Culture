<?php

namespace App\Traits;

use DateTime;
use Normalizer;

trait ValidationTrait {
    public function validerNom($nom) {
        // Logique de validation du nom
        return strlen($nom) >= 3 && strlen($nom) <= 50;
    }

    public function validerEmail($email) {
        // Logique de validation de l'email
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Convertit une chaîne d'heure au format HH:MM en objet DateTime.
     * @param string $timeString La chaîne d'heure à convertir (ex: "10:00").
     * @return DateTime|null Retourne un objet DateTime si la conversion réussit, sinon null.
     */
    public function convertirStringEnTime($timeString)
    {
        $time = DateTime::createFromFormat('H:i', $timeString);
        
        if ($time instanceof DateTime) {
            return $time;
        } else {
            return null;
        }
    }

    public function convertirCaracteresSpeciaux($chaine)
    {
        $search = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'à', 'á', 'â', 'ã', 'ä', 'å', 'È', 'É', 'Ê', 'Ë', 'è', 'é', 'ê', 'ë', 'Ì', 'Í', 'Î', 'Ï', 'ì', 'í', 'î', 'ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'ù', 'ú', 'û', 'ü', 'Ç', 'ç', 'Ý', 'ý', 'ÿ', 'Ñ', 'ñ');
        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a', 'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'C', 'c', 'Y', 'y', 'y', 'N', 'n');

        return str_replace($search, $replace, $chaine);
    }

    public function cleanAccents($string)
    {
        // Convertissez les caractères spéciaux et les accents en caractères normaux
        $normalizedString = Normalizer::normalize($string, Normalizer::FORM_D);
        return preg_replace('/[^a-zA-Z0-9]/', '', $normalizedString); // Supprimez les caractères spéciaux restants si nécessaire
    }

    public function convertToDate(string $dateString, string $format = 'Y-m-d')
    {
        $time = strtotime($dateString);
        $newformat = date($format,$time);

        return $newformat;
    }

    public function convertToInt(string $stringValue)
    {
        return is_numeric($stringValue) ? (int)$stringValue : null;
    }
    public function convertToDouble(string $stringValue)
    {
        $stringValue = str_replace(',','.',$stringValue);
        return is_numeric($stringValue) ? (float)$stringValue : null;
    }

}