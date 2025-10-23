<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio - Salma Akajou' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #F3CCDE 0%, #fff 50%, #F3CCDE 100%); }
        .hover-lift { transition: transform .3s ease, box-shadow .3s ease; }
        .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(158,104,153,.3); }
        .btn-primary{ background: linear-gradient(135deg,#9E6899 0%,#5B3765 100%); transition: all .3s ease; }
        .btn-primary:hover{ background: linear-gradient(135deg,#5B3765 0%,#9E6899 100%); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(91,55,101,.4); }
        .section-title{ position:relative; display:inline-block; }
        .section-title:after{ content:''; position:absolute; bottom:-10px; left:50%; transform:translateX(-50%); width:60px; height:3px; background:linear-gradient(90deg,#9E6899,#5B3765); border-radius:2px; }
    </style>
    @stack('head')
</head>
<body class="bg-white">
    @include('partials.nav')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    @stack('scripts')
</body>
</html>
