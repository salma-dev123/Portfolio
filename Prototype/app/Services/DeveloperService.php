<?php

namespace App\Services;

class DeveloperService
{
    public function getProfile()
    {
        return [
            'name' => 'Salma Akajou',
            'role' => 'Développeuse Full Stack',
            'bio' => "Passionnée par la création d'applications web modernes et bien structurées.",
            'email' => 'salma.akajou@gmail.com',
        ];
    }
}