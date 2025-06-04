<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextPlay | @yield('titulo')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/a2e5cdd5e6.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3 py-2 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand me-4" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="120">
            </a>
            {{-- Selector de idioma con banderas y nombres --}}
            <div class="dropdown me-3">
                <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://flagcdn.com/24x18/{{ App::getLocale() == 'en' ? 'gb' : App::getLocale() }}.png" alt="Idioma" width="24" height="18" class="me-2">
                </button>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center {{ App::getLocale() == 'es' ? 'fw-bold' : '' }}" href="{{ url('lang/es') }}">
                            <img src="https://flagcdn.com/24x18/es.png" alt="Español" width="24" height="18" class="me-2">
                            <span>Español</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center {{ App::getLocale() == 'en' ? 'fw-bold' : '' }}" href="{{ url('lang/en') }}">
                            <img src="https://flagcdn.com/24x18/gb.png" alt="English" width="24" height="18" class="me-2">
                            <span>English</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center {{ App::getLocale() == 'pt' ? 'fw-bold' : '' }}" href="{{ url('lang/pt') }}">
                            <img src="https://flagcdn.com/24x18/pt.png" alt="Português" width="24" height="18" class="me-2">
                            <span>Português</span>
                        </a>
                    </li>
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarMain">
                <ul class="navbar-nav gap-4 text-center">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold nav-hover fs-5" href="{{ route('juegos.index') }}">{{ __('general.games') }}</a>
                    </li>
                    @auth
                    @if(auth()->user()->rol === 'admin')
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold nav-hover fs-5" href="{{ route('admin.juegos.create') }}">{{ __('general.crearjuegos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold nav-hover fs-5" href="{{ route('admin.juegos.index') }}">{{ __('general.gestionarjuegos') }}</a>
                    </li>
                    @endif
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="{{ route('login') }}">{{ __('general.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold" href="{{ route('register') }}">{{ __('general.register') }}</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a href="{{ route('favoritos') }}" class="nav-link text-white">
                            <i class="far fa-heart fs-5"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link text-white">
                            <i class="fas fa-shopping-cart fs-5"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ __('general.profile') }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('editarUsuario') }}">
                                    <i class="fas fa-user-edit me-2"></i>{{ __('general.editarperfil') }}
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-link nav-link text-black fw-semibold" type="submit">
                                        <i class="fas fa-sign-out-alt me-2"></i> {{ __('general.logout') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @yield('contenido')
    </main>
    <footer id="footer" class="bg-dark text-light pt-4 opacity-0 translate-y-50 transition">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>NextPlay</h5>
                    <p>{{ __('general.textoInfo1') }}</p>
                    <h5>{{ __('general.developers') }}</h5>
                    <p>Gonzalo Jimeno y Mario Fernandez</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>{{ __('general.Enlacesútiles') }}</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('terminos') }}" class="text-decoration-none text-light">{{ __('general.teminosycondiciones') }}</a></li>
                        <li><a href="{{ route('privacidad') }}" class="text-decoration-none text-light">{{ __('general.politicadeprivacidad') }}</a></li>
                        <li><a href="{{ route('ayuda') }}" class="text-decoration-none text-light">{{ __('general.ayuda') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>{{ __('general.redessociales') }}</h5>
                    <a href="https://www.facebook.com/?locale=es_ES" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/?lang=es" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="text-center py-3 border-top border-secondary">
                &copy; 2025 NextPlay - {{ __('general.derechos') }}
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-hover');
            navLinks.forEach(link => {
                link.addEventListener('mouseover', () => link.classList.add('active-hover'));
                link.addEventListener('mouseleave', () => link.classList.remove('active-hover'));
            });

            // 🎯 Footer animation
            const footer = document.getElementById('footer');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        footer.classList.add('animate-in');
                        observer.unobserve(footer); // Solo una vez
                    }
                });
            }, {
                threshold: 0.1
            });

            observer.observe(footer);
        });
    </script>


</body>

</html>