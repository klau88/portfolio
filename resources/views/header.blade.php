<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="navbar-nav m-auto">
            <li className="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
        </ul>
        <div class="navbar-nav">
            <form method="post" action="{{ route('logout') }}">
                @csrf
                @if(auth()->check())
                    <button class="btn nav-link btn-link" type="submit">
                        {{ trans('auth.admin.logout') }}
                    </button>
                @endif
            </form>
        </div>
    </nav>
</header>
