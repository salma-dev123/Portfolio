<?php

namespace App\Http\Controllers;

use App\Services\DeveloperService;
use App\Services\ProjectService;
use App\Services\TechnologieService;

class PortfolioController extends Controller
{
    public function __construct(
        protected DeveloperService $developerService,
        protected ProjectService $projectService,
        protected TechnologieService $technologieService,
    ) {}

    public function home()
    {
        $profile = $this->developerService->getProfile();
        $projects = $this->projectService->featured(3);
        return view('home', compact('profile', 'projects'));
    }

    public function about()
    {
        $profile = $this->developerService->getProfile();
        $technologies = $this->technologieService->all();
        return view('about', compact('profile', 'technologies'));
    }

    public function projects()
    {
        $projects = $this->projectService->all();
        $profile = $this->developerService->getProfile();
        return view('projects.index', compact('projects', 'profile'));
    }

    public function project(int $id)
    {
        $project = $this->projectService->find($id);
        abort_if(!$project, 404);
        $profile = $this->developerService->getProfile();
        $technologies = $this->technologieService->all();
        return view('projects.show', compact('project', 'profile', 'technologies'));
    }
}

