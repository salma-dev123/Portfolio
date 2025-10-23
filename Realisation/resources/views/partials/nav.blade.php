<nav class="fixed top-0 w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">
                <span class="text-purple-600" style="color:#9E6899;">Salma</span>
                <span class="text-gray-800"> Akajou</span>
            </div>
            <ul class="hidden md:flex space-x-8 text-gray-700 font-medium">
                <li><a href="{{ route('home') }}" class="hover:text-purple-600 transition {{ request()->routeIs('home') ? 'text-[\#9E6899]' : '' }}">Accueil</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-purple-600 transition {{ request()->routeIs('about') ? 'text-[\#9E6899]' : '' }}">À propos</a></li>
                <li><a href="{{ route('projects.index') }}" class="hover:text-purple-600 transition {{ request()->routeIs('projects.*') ? 'text-[\#9E6899]' : '' }}">Projets</a></li>
            </ul>
            <div class="md:hidden"><i class="fas fa-bars text-2xl text-gray-700"></i></div>
        </div>
    </div>
</nav>
