
<!-- Heading -->
<div class="sidebar-heading">
    Summary
</div>
<!-- Dashboard view -->
<li class="nav-item">
    <a class="nav-link" href="{{route('dashboard.user')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>My Dashboard</span></a>
</li>

@if(auth()->user()->userHasRole('Admin'))
<!-- Dashboard view -->
<li class="nav-item">
    <a class="nav-link" href="{{route('dashboard.show')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>
<!-- Users view -->
<li class="nav-item">
    <a class="nav-link" href="{{route('users.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Users</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="{{route('categories.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Categories</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="{{route('tags.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Tags</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Authorizations view -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuth" aria-expanded="true" aria-controls="collapseAuth">
        <i class="fas fa-fw fa-cog"></i>
        <span>Authorizations</span>
    </a>
    <div id="collapseAuth" class="collapse" aria-labelledby="headingAuth" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner">
        <h6 class="collapse-header">Authorizations</h6>
        <a class="collapse-item" href="{{route('roles.index')}}">Roles</a>
        <a class="collapse-item" href="{{route('permissions.index')}}">Permission</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Comments view -->
<li class="nav-item">
    <a class="nav-link" href="{{route('comments.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Comments</span></a>
</li>
@endif
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Posts view -->
<li class="nav-item">
    <a class="nav-link" href="{{route('post.index')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Posts</span></a>
</li>


