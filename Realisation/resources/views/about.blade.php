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
    .fade-in-down{opacity:0;transform:translateY(-50px);animation:fadeInDown 1s ease-out forwards}
    @keyframes fadeInDown{0%{opacity:0;transform:translateY(-50px)}100%{opacity:1;transform:translateY(0)}}
    .photo-animation{opacity:0;transform:translateY(50px);animation:fadeInUp 1.2s ease-out forwards}
    @keyframes fadeInUp{0%{opacity:0;transform:translateY(50px)}100%{opacity:1;transform:translateY(0)}}
    .contact-card-vertical{min-height:120px;display:flex;align-items:center}
    .delayed{animation-delay:.3s}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
  const heroEls=document.querySelectorAll('.hero-content .fade-in-down');
  heroEls.forEach((el,i)=>el.style.animationDelay=`${i*0.2}s`);
  const photo=document.querySelector('.photo-animation');
  if(photo){photo.style.animationDelay='0.5s'}
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
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4 fade-in-down">À propos de moi</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed fade-in-down delayed">
            Découvrez mon parcours passionnant dans le développement web.<br>
            Explorez mes compétences et mes projets qui reflètent ma créativité.<br>
            Plongez dans mon univers pour en savoir plus sur mon expertise !
        </p>
    </div>
</section>

<section class="py-20 px-6 bg-white relative overflow-hidden">
    <div class="decorative-element top-10 right-10 hidden lg:block">
        <svg width="80" height="80" viewBox="0 0 80 80">
            <circle cx="40" cy="40" r="30" fill="none" stroke="#F3CCDE" stroke-width="3" stroke-dasharray="5,5"/>
        </svg>
    </div>
    <div class="decorative-element bottom-20 left-10 arrow-doodle hidden lg:block">
        <svg width="120" height="60" viewBox="0 0 120 60">
            <path d="M10 30 Q 40 10, 70 30 Q 100 50, 110 30" stroke="#D6A8C4" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-dasharray="8,4"/>
        </svg>
    </div>
    <div class="decorative-element top-40 left-1/3 star-doodle hidden lg:block">
        <svg width="50" height="50" viewBox="0 0 50 50">
            <polygon points="25,5 30,20 45,20 33,28 38,43 25,35 12,43 17,28 5,20 20,20" fill="#9E6899" opacity="0.4"/>
        </svg>
    </div>
    <div class="decorative-element bottom-10 right-1/4 circle-blob hidden lg:block">
        <div class="w-16 h-16 rounded-full" style="background: linear-gradient(135deg, #BA88AE, #9E6899); opacity: 0.3;"></div>
    </div>
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Mon Parcours</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    <strong>Biographie :</strong> Je suis {{ $profile['prenom'] }} {{ $profile['nom'] }}, {{ $profile['role'] }}. {{ $profile['bio'] }}
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    <strong>Motivation :</strong> Ce qui me pousse à avancer est le défi de concevoir des interfaces intuitives et modernes, tout en explorant des technologies innovantes comme React, WordPress et Flutter. Voir mes projets prendre vie est une source de satisfaction immense.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    <strong>Parcours :</strong><br>
                    - Baccalauréat en sciences au Lycée Ibn Rochd Tanger (2023-2024), où j’ai développé une rigueur analytique essentielle.<br>
                    - Formation en développement digital à l’ISMONTIC Tanger (2024-2025), qui m’a donné des bases solides en création web.<br>
                    - Stage chez LadissiCom (avril-mai 2025), où j’ai affiné mes compétences pratiques.<br>
                    - Actuellement en formation en développement mobile à Solicode Tanger, un programme 100 % pratique axé sur l’autoformation et les projets concrets.
                </p>
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
                        'mongodb' => ['fas fa-database','text-green-700'],
                        'bootstrap' => ['fab fa-bootstrap','text-purple-600'],
                        'git' => ['fab fa-git-alt','text-orange-500'],
                        'wordpress' => ['fab fa-wordpress','text-blue-600'],
                        'wordpres' => ['fab fa-wordpress','text-blue-600'],
                        'elementor' => ['fas fa-layer-group','text-green-600'],
                        'api' => ['fas fa-code','text-yellow-600'],
                        'node.js' => ['fab fa-node-js','text-green-600'],
                    ];
                @endphp
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Technologies maîtrisées</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($technologies as $tech)
                            @php
                                $key = strtolower($tech['nom']);
                                $icon = $iconMap[$key][0] ?? 'fas fa-code';
                                $color = $iconMap[$key][1] ?? 'text-gray-600';
                            @endphp
                            <div class="bg-white p-4 rounded-xl shadow-md hover-lift flex items-center justify-center gap-2">
                                <i class="{{ $icon }} {{ $color }} text-xl"></i>
                                <span class="text-gray-700 font-medium">{{ $tech['nom'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex justify-center relative">
                <div class="w-80 h-80 rounded-lg p-2 shadow-xl hover-lift" style="background: linear-gradient(135deg, #D6A8C4, #BA88AE);">
                    <div class="w-full h-full rounded-lg bg-gray-200 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset($profile['photoProfile']) }}" class="photo-animation" alt="Photo de profil">
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 star-doodle">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl shadow-lg" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">💜</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 px-6 bg-white relative overflow-hidden">
    <div class="decorative-element top-10 left-10 arrow-doodle hidden lg:block">
        <svg width="100" height="100" viewBox="0 0 100 100">
            <path d="M20 80 Q 40 20, 80 50" stroke="#BA88AE" stroke-width="3" fill="none" stroke-linecap="round"/>
            <circle cx="80" cy="50" r="5" fill="#BA88AE"/>
        </svg>
    </div>
    <div class="cursive-text text-4xl absolute bottom-20 left-20 hidden lg:block" style="color: #D6A8C4; opacity: 0.2; transform: rotate(-10deg);">
        Get in touch
    </div>
    <div class="max-w-4xl mx-auto relative z-10 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 section-title">Contactez-moi</h2>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-10">
            N'hésitez pas à me contacter pour toute question ou collaboration, je suis ouverte à échanger !
        </p>
        <div class="space-y-6">
            <div class="contact-card-vertical rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center flex-shrink-0" style="background: #9E6899;"><i class="fas fa-map-marker-alt text-white text-2xl"></i></div>
                    <div class="text-left">
                        <h3 class="font-bold text-gray-800 mb-1 text-xl">Localisation</h3>
                        <p class="text-gray-700 text-lg">{{ $profile['localisation'] }}</p>
                    </div>
                </div>
            </div>
            <div class="contact-card-vertical rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center flex-shrink-0" style="background: #9E6899;"><i class="fas fa-envelope text-white text-2xl"></i></div>
                    <div class="text-left">
                        <h3 class="font-bold text-gray-800 mb-1 text-xl">Email</h3>
                        <p class="text-gray-700 text-lg">{{ $profile['email'] }}</p>
                    </div>
                </div>
            </div>
            <div class="contact-card-vertical rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center flex-shrink-0" style="background: #9E6899;"><i class="fab fa-linkedin text-white text-2xl"></i></div>
                    <div class="text-left">
                        <h3 class="font-bold text-gray-800 mb-1 text-xl">LinkedIn</h3>
                        <p class="text-gray-700 text-lg"><a href="{{ $profile['linkedin'] }}" class="hover:text-purple-600" target="_blank" rel="noopener">{{ $profile['linkedin'] }}</a></p>
                    </div>
                </div>
            </div>
            <div class="contact-card-vertical rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center flex-shrink-0" style="background: #9E6899;"><i class="fab fa-github text-white text-2xl"></i></div>
                    <div class="text-left">
                        <h3 class="font-bold text-gray-800 mb-1 text-xl">GitHub</h3>
                        <p class="text-gray-700 text-lg"><a href="{{ $profile['github'] }}" class="hover:text-purple-600" target="_blank" rel="noopener">{{ $profile['github'] }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

