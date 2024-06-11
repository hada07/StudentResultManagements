<form id="search-form" class="navbar-search navbar-search-light form-inline mr-sm-3" action="{{ route('admin.'.$title.'.search') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Tìm kiếm" type="text" name="valueSearch" value = {{ $valueSearch? $valueSearch : null }}>
        </div>
    </div>
    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
        aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</form>
