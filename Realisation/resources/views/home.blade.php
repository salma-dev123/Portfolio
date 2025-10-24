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
    .animate-slide-down{animation:slideDown .8s ease-out forwards}
    @keyframes slideDown{from{opacity:0;transform:translateY(-50px)}to{opacity:1;transform:translateY(0)}}
    .hero-title{opacity:0;animation:slideDown .8s ease-out .2s forwards}
    .hero-subtitle{opacity:0;animation:slideDown .8s ease-out .4s forwards}
    .hero-description{opacity:0;animation:slideDown .8s ease-out .6s forwards}
    .hero-buttons{opacity:0;animation:slideDown .8s ease-out .8s forwards}
    .project-card img{width:100%;height:200px;object-fit:cover;border-bottom:2px solid #D6A8C4}
    .see-more-btn{background:linear-gradient(135deg,#9E6899 0%,#5B3765 100%);color:#fff;padding:.75rem 2rem;border-radius:2rem;font-weight:600;transition:all .3s ease}
    .see-more-btn:hover{background:linear-gradient(135deg,#5B3765 0%,#9E6899 100%);transform:translateY(-2px);box-shadow:0 8px 20px rgba(91,55,101,.4)}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
  const btn=document.querySelector('a[href="#contact-section"]');
  if(btn){btn.addEventListener('click',function(e){e.preventDefault();document.getElementById('contact-section').scrollIntoView({behavior:'smooth'})});}
});
</script>
@endpush
<section class="gradient-bg pt-32 pb-20 px-6 relative overflow-hidden">
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
        <div class="mb-8 flex justify-center relative">
            <div class="w-48 h-48 rounded-full p-1 shadow-lg" style="background: linear-gradient(135deg, #D6A8C4, #BA88AE);">
                <div class="w-full h-full rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset($profile['photoProfile']) }}" alt="{{ $profile['prenom'] }} {{ $profile['nom'] }}">
                </div>
            </div>
            <div class="absolute -right-8 top-0 star-doodle">
                <svg width="40" height="40" viewBox="0 0 40 40">
                    <circle cx="20" cy="20" r="15" fill="#BA88AE" opacity="0.7"/>
                    <text x="20" y="26" text-anchor="middle" fill="white" font-size="20">✨</text>
                </svg>
            </div>
        </div>
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4 hero-title">{{ $profile['prenom'] }} {{ $profile['nom'] }}</h1>
        <p class="text-2xl md:text-3xl font-semibold mb-6 hero-subtitle" style="color:#9E6899;">{{ $profile['role'] }}</p>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed hero-description">{{ $profile['bio'] }} Je transforme vos idées en expériences web exceptionnelles.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center hero-buttons">
            <a href="{{ route('about') }}" class="btn-primary text-white px-8 py-4 rounded-full font-semibold shadow-lg inline-block"><i class="fas fa-folder-open mr-2"></i>Savoir plus</a>
            <a href="#contact-section" class="bg-white text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl transition border-2 inline-block" style="color:#9E6899; border-color:#9E6899; background:#F3CCDE;"><i class="fas fa-user mr-2"></i>Contacter</a>
        </div>
    </div>
    <div class="absolute bottom-10 right-10 cursive-text text-4xl hidden lg:block" style="color:#BA88AE; opacity:.3; transform: rotate(-5deg);">Let's create together</div>
</section>

<section class="py-20 px-6 gradient-bg relative overflow-hidden">
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4 section-title">Mes Projets Réalisés</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Découvrez une sélection de mes projets qui reflètent ma créativité et mes compétences.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($projects as $p)
            <div class="project-card hover-lift bg-white rounded-2xl border-2 border-[#F3CCDE] overflow-hidden">
                <img src="{{ asset($p['image']) }}" alt="{{ $p['titre'] }}" class="w-full h-52 object-cover border-b-2" style="border-color:#D6A8C4;">
                <div class="p-6 flex flex-col gap-4">
                    <h3 class="text-xl font-semibold" style="color:#5B3769;">{{ $p['titre'] }}</h3>
                    <p class="text-gray-600">{{ $p['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('projects.index') }}" class="inline-block text-white px-6 py-3 rounded-full see-more-btn" style="background: linear-gradient(135deg, #9E6899 0%, #5B3765 100%);">
                <i class="fas fa-arrow-right mr-2"></i>Voir plus
            </a>
        </div>
    </div>
</section>

<section id="contact-section" class="py-20 px-6 bg-white relative overflow-hidden">
    <div class="decorative-element top-10 left-10 arrow-doodle hidden lg:block">
        <svg width="100" height="100" viewBox="0 0 100 100">
            <path d="M20 80 Q 40 20, 80 50" stroke="#BA88AE" stroke-width="3" fill="none" stroke-linecap="round"/>
            <circle cx="80" cy="50" r="5" fill="#BA88AE"/>
        </svg>
    </div>
    <div class="cursive-text text-4xl absolute bottom-20 left-20 hidden lg:block" style="color:#D6A8C4; opacity:.2; transform: rotate(-10deg);">Get in touch</div>
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4 section-title">Contactez-moi</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Une question ? Un projet ? N'hésitez pas à me contacter.</p>
        </div>
        <div class="max-w-2xl mx-auto grid sm:grid-cols-2 gap-6">
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
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fab fa-linkedin text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">LinkedIn</h3><p class="text-gray-700"><a href="{{ $profile['linkedin'] }}" class="hover:text-purple-600" target="_blank" rel="noopener">{{ $profile['linkedin'] }}</a></p></div>
                </div>
            </div>
            <div class="rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fab fa-github text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">GitHub</h3><p class="text-gray-700"><a href="{{ $profile['github'] }}" class="hover:text-purple-600" target="_blank" rel="noopener">{{ $profile['github'] }}</a></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
