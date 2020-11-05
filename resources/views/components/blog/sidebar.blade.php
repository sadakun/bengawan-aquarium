<nav class="tm-nav" id="tm-nav">            
    <ul>
        <li class="tm-nav-item active"><a href="{{route('home')}}" class="tm-nav-link">
            <i class="fas fa-home"></i>
            Blog Home
        </a></li>
        @if(Auth::check())
        <li class="tm-nav-item"><a href="{{route('admin.index')}}" class="tm-nav-link">
            <i class="far fa-comments"></i>
            Dashboard
        </a></li>
        @else
        <li class="tm-nav-item"><a href="/login" class="tm-nav-link">
            <i class="fas fa-pen"></i>
            Login
        </a></li>
        <li class="tm-nav-item"><a href="/register" class="tm-nav-link">
            <i class="fas fa-users"></i>
            Register
        </a></li>
        @endif
        <li class="tm-nav-item"><a href="{{route('resume')}}" class="tm-nav-link">
            <i class="far fa-comments"></i>
            Resume
        </a></li>
    </ul>
</nav>