<form action="{{ route('users.search') }}" method="post" class="form-inline mx-2">
@csrf
<div class="input-group mt-3">
<input type="text" name="filter" placeholder="Filtrar:" class="form-control form-control-navbar" value="{{ $filters['filter'] ?? '' }}" />

    <div class="input-group-append">
        <button type="submit" class="btn btn-navbar">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
</form>

{{-- <form action="{{ $item['href'] }}" method="{{ $item['method'] }}" class="form-inline mx-2">
    <div class="input-group mt-3">
        <input class="form-control form-control-navbar" type="search" name="{{ $item['input_name'] }}"
               placeholder="{{ ('Pesquisar') }}" aria-label="{{ $item['aria-label'] ?? $item['text'] }}">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>

            {{-- placeholder --}}
            {{-- $item['text'] --}}
        {{-- </div>
    </div>
</form> --}}