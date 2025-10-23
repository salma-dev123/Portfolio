<?php

namespace App\Services;

class ProjectService
{
    protected array $projects;

    public function __construct()
    {
        $this->projects = [
            [
                'id' => 1,
                'titre' => 'Site de Gestion de Zoo',
                'description' => "Ce projet est une application web conçue pour faciliter la gestion d’un zoo. Elle permet de suivre la gestion des animaux, de gérer les visiteurs, et d’optimiser les ressources quotidiennes. L’interface utilisateur est intuitive, avec des tableaux de bord personnalisables et des rapports détaillés. Ce projet a été développé avec une approche centrée sur l’utilisateur, garantissant une expérience fluide et efficace.",
                'image' => 'imgs/zoo.png',
                'dateDebut' => '12 janvier 2025',
                'dateFin' => '25 janvier 2025',
                'technologies' => ['HTML/CSS', 'ReactJS', 'Node.js']
            ],
            [
                'id' => 2,
                'titre' => 'Plateforme de Recettes',
                'description' => 'Cette plateforme est une application web interactive permettant aux utilisateurs d’explorer des recettes du monde entier. Elle propose une liste d’ingrédients, des étapes de préparation détaillées, et des filtres personnalisés pour trouver des plats selon les goûts ou préférences alimentaires. Développée avec une approche centrée sur l’utilisateur, elle offre une expérience fluide et inspirante pour les amateurs de cuisine.',
                'image' => 'imgs/recette.png',
                'dateDebut' => '02 Octobre 2024',
                'dateFin' => '14 octobre 2024',
                'technologies' => ['HTML', 'CSS (Tailwind)', 'JavaScript']
            ],
            [
                'id' => 3,
                'titre' => 'Système de Gestion des Élections',
                'description' => 'Ce système permet d’organiser et de suivre les élections en ligne avec des rapports détaillés et une sécurité renforcée. Il offre des fonctionnalités pour gérer les candidats, les électeurs, et les résultats, tout en assurant transparence et fiabilité grâce à une base de données sécurisée et des outils de gestion efficaces.',
                'image' => 'imgs/elections.png',
                'dateDebut' => '06 juin 2024',
                'dateFin' => '19 juin 2024',
                'technologies' => ['HTML', 'PHP', 'Bootstrap', 'Git', 'MySQL']
            ],
            [
                'id' => 4,
                'titre' => 'Gestion de Bibliothèque',
                'description' => 'Cette solution numérique permet de gérer les livres, les emprunts et les utilisateurs d’une bibliothèque. Elle offre des fonctionnalités pour ajouter, modifier ou supprimer des livres, suivre les prêts, et gérer les utilisateurs facilement. La plateforme inclut un catalogue en ligne et des alertes automatiques pour simplifier la gestion quotidienne.',
                'image' => 'imgs/bibliotheque.png',
                'dateDebut' => '28 Avril 2024',
                'dateFin' => '14 Mai 2024',
                'technologies' => ['HTML', 'CSS', 'Bootstrap', 'PHP', 'Laravel', 'MySQL']
            ],
            [
                'id' => 5,
                'titre' => 'Portfolio Professionnel',
                'description' => 'Ce portfolio professionnel a été réalisé avec WordPress et Elementor pour présenter les compétences et projets d’un ingénieur. Il dispose d’un menu de navigation facilitant l’accès aux différentes pages. L’interface est moderne, responsive et entièrement personnalisable pour valoriser le profil.',
                'image' => 'imgs/portfolio.png',
                'dateDebut' => '07 avril 2025',
                'dateFin' => '19 avril 2025',
                'technologies' => ['WordPress', 'Elementor', 'PHP']
            ],
            [
                'id' => 6,
                'titre' => 'Planification de Voyage',
                'description' => 'Une application de planification de voyages offrant des itinéraires personnalisés et un suivi en temps réel. Elle propose des recommandations d’hôtels, de restaurants, de lieux touristiques et d’activités selon la destination choisie. Les utilisateurs peuvent également partager leurs avis et commentaires directement sur le site pour enrichir l’expérience communautaire.',
                'image' => 'imgs/planification_voyage.jpeg',
                'dateDebut' => '2 Février 2025',
                'dateFin' => '6 Juin 2025',
                'technologies' => ['Laravel', 'React', 'API', 'MySQL', 'HTML', 'CSS Tailwind', 'Node.js']
            ],
        ];
    }

    public function all(): array
    {
        return $this->projects;
    }

    public function find(int $id): ?array
    {
        foreach ($this->projects as $project) {
            if ($project['id'] === $id) return $project;
        }
        return null;
    }

    public function featured(int $limit = 3): array
    {
        return array_slice($this->projects, 0, $limit);
    }
}
