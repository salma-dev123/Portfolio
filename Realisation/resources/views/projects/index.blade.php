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
    .project-card{position:relative;border-radius:1.5rem;overflow:hidden;cursor:pointer;transition:all .4s cubic-bezier(0.4,0,0.2,1);background:#fff;border:2px solid #F3CCDE;display:flex;flex-direction:column;height:100%;background:linear-gradient(135deg,#F3CCDE,#fff);opacity:0;transform:translateY(100px);transition:opacity .6s ease, transform .6s ease}
    .project-card.visible{opacity:1;transform:translateY(0)}
    .project-image-wrapper{position:relative;height:250px;width:100%;overflow:hidden;background:linear-gradient(135deg,#F3CCDE,#D6A8C4)}
    .project-image{width:100%;height:100%;object-fit:cover;transition:opacity .4s ease, transform .4s ease}
    .project-card:hover .project-image{opacity:.7;transform:scale(1.05)}
    .project-image-wrapper i{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size:5rem;color:rgba(255,255,255,.8);z-index:1;opacity:0;transition:opacity .4s ease}
    .project-card:hover .project-image-wrapper i{opacity:1}
    .project-overlay{position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.3);display:flex;justify-content:center;align-items:center;opacity:0;transition:opacity .4s ease;z-index:2}
    .project-card:hover .project-overlay{opacity:1}
    .project-overlay h3{color:#fff;font-size:1.75rem;font-weight:700;text-align:center;text-shadow:0 2px 4px rgba(0,0,0,.3);padding:0 1rem}
    .project-info{padding:2rem;background:#fff;display:flex;flex-direction:column;align-items:center;text-align:center;z-index:3;flex:1}
    .project-title{font-size:1.5rem;font-weight:600;color:#5B3765;margin:0 0 1rem 0}
    .project-description{font-size:.95rem;color:#6b7280;line-height:1.6;margin:0 0 auto 0}
    .project-btn{background:linear-gradient(135deg,#9E6899,#5B3765);color:#fff;padding:.75rem 2rem;border-radius:9999px;font-weight:600;text-align:center;display:inline-block;transition:all .3s ease;box-shadow:0 4px 10px rgba(91,55,101,.2);margin-top:1.5rem}
    .project-btn:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(91,55,101,.4)}
    .fade-in-down{opacity:0;transform:translateY(-50px);animation:fadeInDown 1s ease-out forwards}
    @keyframes fadeInDown{0%{opacity:0;transform:translateY(-50px)}100%{opacity:1;transform:translateY(0)}}
}</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
  const heroEls=document.querySelectorAll('.hero-content .fade-in-down');
  heroEls.forEach((el,i)=>el.style.animationDelay=`${i*0.2}s`);
  const cards=document.querySelectorAll('.project-card');
  function check(){
    const h=window.innerHeight;
    cards.forEach(c=>{const r=c.getBoundingClientRect(); if(r.top<h-100){c.classList.add('visible')}});
  }
  window.addEventListener('scroll',check); check();
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
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6 section-title fade-in-down">Mes Projets</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed fade-in-down">
            Découvrez une sélection de mes réalisations qui reflètent ma passion pour le développement web. Chaque projet représente un défi unique et une opportunité d'apprendre de nouvelles technologies.
        </p>
    </div>
    <div class="absolute bottom-10 right-10 cursive-text text-4xl hidden lg:block" style="color:#BA88AE; opacity:.3; transform: rotate(-5deg);">My Creative Work</div>
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
    <div class="cursive-text text-3xl absolute top-20 left-20 hidden lg:block" style="color:#D6A8C4; opacity:.2; transform: rotate(-10deg);">Hover to explore</div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
            @foreach($projects as $p)
            <div class="project-card hover-lift">
                <div class="project-image-wrapper">
                    <img src="{{ asset($p['image']) }}" alt="{{ $p['titre'] }}" class="project-image">
                    <i class="fas {{ ['fa-paw','fa-utensils','fa-vote-yea','fa-book','fa-briefcase','fa-plane'][$loop->index % 6] }}"></i>
                    <div class="project-overlay"><h3>{{ $p['titre'] }}</h3></div>
                </div>
                <div class="project-info">
                    <h3 class="project-title">{{ $p['titre'] }}</h3>
                    <p class="project-description">{{ $p['description'] }}</p>
                    <a href="{{ route('projects.show', $p['id']) }}" class="project-btn">Voir détails</a>
                </div>
            </div>
            @endforeach
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
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4 section-title">Vous avez un projet en tête ?</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Discutons de vos idées et transformons-les en solutions digitales élégantes et performantes.</p>
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
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">LinkedIn</h3><p class="text-gray-700"><a href="{{ $profile['linkedin'] }}" target="_blank" rel="noopener" class="hover:text-purple-600">{{ $profile['linkedin'] }}</a></p></div>
                </div>
            </div>
            <div class="rounded-2xl p-8 hover-lift" style="background: linear-gradient(135deg, #F3CCDE, #D6A8C4);">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 rounded-lg flex items-center justify-center" style="background:#9E6899;"><i class="fab fa-github text-white text-2xl"></i></div>
                    <div><h3 class="font-bold text-gray-800 mb-2 text-lg">GitHub</h3><p class="text-gray-700"><a href="{{ $profile['github'] }}" target="_blank" rel="noopener" class="hover:text-purple-600">{{ $profile['github'] }}</a></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
