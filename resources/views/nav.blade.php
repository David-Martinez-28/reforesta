<nav style="display: flex; align-items: center; gap: 15px; padding: 10px; background: #f8f9fa;">
    <a href="{{ url('/') }}">Inicio</a>
    <a href="{{ url('/usuarios') }}">Usuarios</a>
    <a href="{{ url('/especies') }}">Especies</a>
    <a href="{{ url('/eventos/create') }}">Crear Eventos</a>

    <div style="border-left: 1px solid #ccc; height: 20px; margin: 0 10px;"></div>

    @auth
        <div style="display: flex; align-items: center; gap: 10px;">

            <a href="{{ route('usuarios.show', Auth::user()->id) }}"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none; color: inherit;">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar"
                        style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; border: 1px solid #ddd;">
                @else
                    <div
                        style="width: 35px; height: 35px; border-radius: 50%; background: #007bff; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                        {{ substr(Auth::user()->nombre, 0, 1) }}
                    </div>
                @endif

                <span style="font-weight: bold;">{{ Auth::user()->nombre }}</span>
            </a>
            <form action="{{ route('logout') }}" method="GET" style="display:inline">
                @csrf
                <button type="submit"
                    style="background: #ff4d4d; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">
                    Salir
                </button>
            </form>
        </div>
    @endauth

    @guest
        <a href="{{ route('login') }}"
            style="background: #28a745; color: white; padding: 5px 15px; border-radius: 4px; text-decoration: none;">
            Iniciar Sesión
        </a>
    @endguest
    @guest
        <a href="{{ route('usuarios.create') }}"
            style="background: red; color: white; padding: 5px 15px; border-radius: 4px; text-decoration: none;">
            Registrarse
        </a>
    @endguest

</nav>