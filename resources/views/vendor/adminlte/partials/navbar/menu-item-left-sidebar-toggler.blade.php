<li class="nav-item mt-3">
    <a class="nav-link" data-widget="pushmenu" href="#"
        @if(config('adminlte.sidebar_collapse_remember'))
            data-enable-remember="true"
        @endif
        @if(!config('adminlte.sidebar_collapse_remember_no_transition'))
            data-no-transition-after-reload="false"
        @endif
        @if(config('adminlte.sidebar_collapse_auto_size'))
            data-auto-collapse-size="{{ config('adminlte.sidebar_collapse_auto_size') }}"
        @endif>
        <i class="fas fa-bars"></i>
        <span class="sr-only">{{ __('adminlte::adminlte.toggle_navigation') }}</span>
    </a>
</li>

<form action="{{ route('users.search') }}" method="post" class="form-inline mx-2">
    @csrf
    <div class="input-group mt-3">
    <input type="text" name="filter" placeholder="Pesquisar" class="form-control form-control-navbar" value="{{ $filters['filter'] ?? '' }}" />
    
        <div class="input-group-append">
            <button type="submit" class="btn btn-navbar">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>