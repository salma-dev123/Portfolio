@extends('layouts.app')

@section('content')
@push('head')
<style>
    .decorative-element{position:absolute;pointer-events:none;z-index:1}
    .arrow-doodle{animation:float 3s ease-in-out infinite}
    .star-doodle{animation:twinkle 2s ease-in-out infinite}
    @keyframes float{0%,100%{transform:translateY(0) rotate(0)}50%{transform:translateY(-10px) rotate(5deg)}}
    @keyframes twinkle{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.7;transform:scale(1.1)}}
    .circle-blob{animation:blob 4s ease-in-out infinite}
    @keyframes blob{0%,100%{border-radius:60% 40% 30% 70% / 60% 30% 70% 40%}50%{border-radius:30% 60% 70% 40% / 50% 60% 30% 60%}}
    .cursive-text{font-family:'Brush Script MT',cursive;font-style:italic}
    .fade-in-up{opacity:0;transform:translateY(100px);transition:opacity .6s ease, transform .6s ease}
    .fade-in-up.visible{opacity:1;transform:translateY(0)}
    .fade-in-up.delay-1{transition-delay:.2s}
    .fade-in-up.delay-2{transition-delay:.4s}
    .fade-in-up.delay-3{transition-delay:.6s}
    .fade-in-down{opacity:0;transform:translateY(-50px);animation:fadeInDown 1s ease-out forwards}
    @keyframes fadeInDown{0%{opacity:0;transform:translateY(-50px)}100%{opacity:1;transform:translateY(0)}}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
  const els=document.querySelectorAll('.fade-in-up');
  const onScroll=()=>{const h=window.innerHeight; els.forEach(e=>{const r=e.getBoundingClientRect(); if(r.top<h-100) e.classList.add('visible');});};
  window.addEventListener('scroll',onScroll); onScroll();
});
</script>
@endpush

<section class="gradient-bg pt-32 pb-20 px-6 relative overflow-hidden hero-content">
    <div class="decorative-element top-20 left-10 arrow-doodle hidden lg:block">
        <svg width="100" height="100" viewBox="0 0 100 100">
            <path d="M10 50 Q 30 30, 50 50 T 90 50" stroke="#BA88AE" stroke-width="3" fill="none" stroke-linecap="round"/>
            <path d="M85 45 L 90 50 L 85 55" stroke="#BA88AE" stroke-width="3" fill="none" stroke-linecap="round"/>
        </svg>
    </div>
    <div class="decorative-element top-40 right-20 star-doodle hidden lg:block">
        <svg width="60" height="60" viewBox="0 0 60 60">
            <path d="M30 5 L35 25 L55 30 L35 35 L30 55 L25 35 L5 30 L25 25 Z" fill="#D6A8C4" opacity="0.6"/>
        </svg>
    </div>
    <div class="decorative-element bottom-20 left-1/4 hidden lg:block">
        <div class="w-20 h-20 rounded-full circle-blob" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4); opacity: 0.4;"></div>
    </div>
    <div class="max-w-5xl mx-auto text-center relative z-10">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6 fade-in-down">{{ $project['titre'] }}</h1>
        <p class="text-gray-600">Découvrez les détails de mon projet de {{ $project['titre'] }}</p>
    </div>
    <div class="absolute bottom-10 right-10 cursive-text text-4xl hidden lg:block" style="color:#BA88AE; opacity:.3; transform: rotate(-5deg);">
        {{ $project['titre'] }}
    </div>
</section>

<section class="py-20 px-6 bg-white relative overflow-hidden">
    <div class="decorative-element top-10 right-10 hidden lg:block">
        <svg width="80" height="80" viewBox="0 0 80 80">
            <circle cx="40" cy="40" r="30" fill="none" stroke="#F3CCDE" stroke-width="3" stroke-dasharray="5,5"/>
        </svg>
    </div>
    <div class="max-w-6xl mx-auto relative z-10 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 section-title">Aperçu Visuel</h2>
        <div class="w-full max-w-4xl mx-auto overflow-hidden rounded-xl shadow-xl hover-lift fade-in-up delay-1">
            <img src="{{ asset($project['image']) }}" alt="{{ $project['titre'] }}" class="w-full h-auto object-cover">
        </div>
    </div>
</section>

<section class="py-20 px-6 bg-gray-50 relative overflow-hidden">
    <div class="decorative-element bottom-20 left-10 arrow-doodle hidden lg:block">
        <svg width="120" height="60" viewBox="0 0 120 60">
            <path d="M10 30 Q 40 10, 70 30 Q 100 50, 110 30" stroke="#D6A8C4" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-dasharray="8,4"/>
        </svg>
    </div>
    <div class="max-w-6xl mx-auto relative z-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 section-title">Description</h2>
        <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto fade-in-up delay-2">
            {{ $project['description'] }}
        </p>
    </div>
</section>

<section class="py-20 px-6 bg-white relative overflow-hidden">
    <div class="decorative-element top-20 left-1/3 star-doodle hidden lg:block">
        <svg width="50" height="50" viewBox="0 0 50 50">
            <polygon points="25,5 30,20 45,20 33,28 38,43 25,35 12,43 17,28 5,20 20,20" fill="#9E6899" opacity="0.4"/>
        </svg>
    </div>
    <div class="max-w-6xl mx-auto relative z-10 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 section-title">Dates du Projet</h2>
        <div class="grid md:grid-cols-2 gap-8 max-w-2xl mx-auto">
            <div class="bg-white p-6 rounded-xl shadow-md hover-lift fade-in-up delay-3">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Date de Début</h3>
                <p class="text-gray-600">{{ $project['dateDebut'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md hover-lift fade-in-up delay-3">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Date de Fin</h3>
                <p class="text-gray-600">{{ $project['dateFin'] }}</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 px-6 gradient-bg relative overflow-hidden">
    <div class="decorative-element bottom-10 right-1/4 circle-blob hidden lg:block">
        <div class="w-16 h-16 rounded-full" style="background: linear-gradient(135deg, #BA88AE, #9E6899); opacity: 0.3;"></div>
    </div>
    <div class="max-w-6xl mx-auto relative z-10 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 section-title">Technologies Utilisées</h2>
        @php
            $iconMap = [
                'html' => ['fab fa-html5','text-orange-600'],
                'css' => ['fab fa-css3-alt','text-blue-500'],
                'tailwindcss' => ['fab fa-css3-alt','text-cyan-500'],
                'javascript' => ['fab fa-js','text-yellow-500'],
                'php' => ['fab fa-php','text-purple-600'],
                'laravel' => ['fab fa-laravel','text-red-600'],
                'react' => ['fab fa-react','text-blue-500'],
                'mysql' => ['fas fa-database','text-blue-600'],
                'bootstrap' => ['fab fa-bootstrap','text-purple-600'],
                'git' => ['fab fa-git-alt','text-orange-500'],
                'wordpress' => ['fab fa-wordpress','text-blue-600'],
                'elementor' => ['fas fa-layer-group','text-green-600'],
                'api' => ['fas fa-code','text-yellow-600'],
                'node.js' => ['fab fa-node-js','text-green-600'],
            ];
            $alias = [
                'reactjs' => 'react',
                'html/css' => 'html',
                'css/tailwind' => 'tailwindcss',
                'csstailwind' => 'tailwindcss',
                'css(tailwind)' => 'tailwindcss',
                'nodejs' => 'node.js',
            ];
        @endphp
        <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @foreach($project['technologies'] as $techName)
                @php
                    $key = strtolower($techName);
                    $key = str_replace([' ', '(', ')'], '', $key);
                    $key = $alias[$key] ?? $key;
                    $icon = $iconMap[$key][0] ?? 'fas fa-code';
                    $color = $iconMap[$key][1] ?? 'text-gray-600';
                @endphp
                <div class="bg-white p-6 rounded-xl shadow-md hover-lift fade-in-up flex items-center justify-center gap-3">
                    <i class="{{ $icon }} {{ $color }} text-2xl"></i>
                    <span class="text-gray-700 font-semibold">{{ $techName }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 px-6 bg-white relative overflow-hidden">
    <div class="decorative-element top-20 left-1/4 star-doodle hidden lg:block">
        <svg width="50" height="50" viewBox="0 0 50 50">
            <polygon points="25,5 30,20 45,20 33,28 38,43 25,35 12,43 17,28 5,20 20,20" fill="#9E6899" opacity="0.4"/>
        </svg>
    </div>
    <div class="decorative-element bottom-10 right-20 hidden lg:block">
        <div class="w-16 h-16 rounded-lg circle-blob" style="background: linear-gradient(135deg, #BA88AE, #9E6899); opacity: 0.3;"></div>
    </div>
    <div class="cursive-text text-4xl absolute top-10 left-20 hidden lg:block" style="color:#5B3765; opacity:.2; transform: rotate(-8deg);">Let's Connect</div>
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4 section-title">Vous avez un projet en tête ?</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">N'hésitez pas à me contacter, je serai ravie d'échanger avec vous.</p>
        </div>
        <div class="grid sm:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <div class="rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fas fa-map-marker-alt text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">Localisation</h3><p class="text-gray-700">{{ $profile['localisation'] }}</p></div>
                </div>
            </div>
            <div class="rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fas fa-envelope text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">Email</h3><p class="text-gray-700">{{ $profile['email'] }}</p></div>
                </div>
            </div>
            <div class="rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fab fa-github text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">GitHub</h3><p class="text-gray-700"><a href="{{ $profile['github'] }}" target="_blank" rel="noopener" class="hover:text-purple-600">{{ $profile['github'] }}</a></p></div>
                </div>
            </div>
            <div class="rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fab fa-linkedin text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">LinkedIn</h3><p class="text-gray-700"><a href="{{ $profile['linkedin'] }}" target="_blank" rel="noopener" class="hover:text-purple-600">{{ $profile['linkedin'] }}</a></p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="fixed bottom-6 right-6 z-50">
    <a href="{{ route('projects.index') }}" class="btn-primary text-white font-semibold py-3 px-6 rounded-full hover-lift">Retour aux projets</a>
</div>
@endsection
