<?php

namespace App\Services;

class DeveloperService
{
    public function getProfile(): array
    {
        return [
            'nom' => 'Akajou',
            'prenom' => 'Salma',
            'role' => 'Développeuse Web Full Stack',
            'bio' => "Passionnée par la programmation et la conception d'interfaces intuitives et modernes.",
            'email' => 'salmaakajou1@gmail.com',
            'numeroTelephone' => '+212 6 00 00 00 00',
            'localisation' => 'Tanger, Maroc',
            'photoProfile' => 'imgs/photo_profile1.png',
            'github' => 'https://github.com/salma-dev123',
            'linkedin' => 'https://www.linkedin.com/in/salma-akajou',
        ];
    }
}
