<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Soluciones Empresariales</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /* Estilos completos con ajustes en la sección superior */
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}html{font-family:'Nunito',sans-serif;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}
            .bg-corporate-blue{background-color:#1E3A8A}.bg-corporate-light{background-color:#F1F5F9}.text-corporate-blue{color:#1E3A8A}
            .hover\:bg-corporate-blue:hover{background-color:#1E3A8A}.hover\:text-white:hover{color:#fff}
            .banner-image{background-size:cover;background-position:center;height:400px;width:100%;object-fit:cover;animation:fadeIn 1.5s ease-in-out}
            .card{transition:all 0.3s ease;border-radius:0.5rem;overflow:hidden}.card:hover{transform:translateY(-5px) scale(1.02);box-shadow:0 6px 12px rgba(0,0,0,0.15)}
            .card img{width:100%;height:200px;object-fit:cover;animation:slideUp 1s ease-out}
            .card:hover img{transform:scale(1.05);transition:transform 0.3s ease}
            .min-h-screen{min-height:100vh}
            .btn-primary{background-color:#1E3A8A;color:white;padding:0.75rem 1.5rem;border-radius:0.375rem;text-decoration:none;display:inline-block;animation:pulse 2s infinite}
            .btn-primary:hover{background-color:#172554;animation:none}
            .container{max-width:1200px;margin-left:auto;margin-right:auto;padding:0 1rem}
            .header{padding:1rem 0;background-color:#1E3A8A;box-shadow:0 2px 10px rgba(0,0,0,0.1);position:sticky;top:0;z-index:10}
            .header .logo-container{display:flex;align-items:center}
            .header img{height:60px;width:auto;animation:spinIn 1s ease-out}
            .header nav{display:flex;align-items:center;gap:1.5rem}
            .header a{transition:color 0.3s ease}
            .footer{padding:2rem 0}
            .grid{gap:2rem}
            @media (max-width:640px){.header{flex-direction:column;padding:1rem}.header nav{margin-top:1rem}}
            @media (min-width:640px){.sm\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}}

            /* Animaciones */
            @keyframes fadeIn {
                from {opacity:0;}
                to {opacity:1;}
            }
            @keyframes slideUp {
                from {transform:translateY(20px);opacity:0;}
                to {transform:translateY(0);opacity:1;}
            }
            @keyframes spinIn {
                from {transform:rotate(0deg) scale(0.5);opacity:0;}
                to {transform:rotate(360deg) scale(1);opacity:1;}
            }
            @keyframes pulse {
                0% {transform:scale(1);}
                50% {transform:scale(1.05);}
                100% {transform:scale(1);}
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-corporate-light">
            <!-- Header -->
            <header class="header text-white">
                <div class="container flex items-center justify-between">
                    <div class="logo-container">
                        <img src="images/corporate-logo.png" alt="Logo Empresa">
                        <h1 class="ml-4 text-xl font-bold">Soluciones Empresariales</h1>
                    </div>
                    @if (Route::has('login'))
                        <nav class="hidden sm:flex">
                            @auth
                                <a href="{{ url('/home') }}" class="text-white hover:text-gray-300">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Iniciar Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Registrarse</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </header>

            <!-- Banner -->
            <div class="banner-image" style="background-image: url('images/corporate-banner.jpg')">
                <div class="bg-black bg-opacity-50 h-full flex items-center">
                    <div class="container text-white">
                        <h2 class="text-4xl font-bold mb-4">Impulsa tu Negocio al Siguiente Nivel</h2>
                        <p class="text-lg mb-6">Soluciones innovadoras para empresas modernas</p>
                        <a href="#" class="btn-primary">Contáctanos</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container py-12">
                <div class="grid grid-cols-1 sm:grid-cols-3">
                    <!-- Card 1 -->
                    <div class="card bg-white shadow">
                        <img src="images/corporate-service1.jpg" alt="Consultoría">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-corporate-blue">Consultoría Estratégica</h3>
                            <p class="mt-2 text-gray-600">Optimizamos tus procesos para maximizar resultados.</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card bg-white shadow">
                        <img src="images/corporate-service2.jpg" alt="Tecnología">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-corporate-blue">Soluciones Tecnológicas</h3>
                            <p class="mt-2 text-gray-600">Implementamos software a medida para tu empresa.</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card bg-white shadow">
                        <img src="images/corporate-service3.jpg" alt="Capacitación">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-corporate-blue">Capacitación Corporativa</h3>
                            <p class="mt-2 text-gray-600">Formamos a tu equipo para el éxito.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-corporate-blue text-white footer">
                <div class="container flex flex-col sm:flex-row justify-between items-center">
                    <div class="text-center sm:text-left mb-4 sm:mb-0">
                        <p>© 2025 Soluciones Empresariales. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>