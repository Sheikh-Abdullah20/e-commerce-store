@if (session()->has('success'))
    <div class="alert text-dark alert-dismissible fade show" style="background-color: #4ca97f;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>

    @elseif(session()->has('error'))
    <div class="alert text-light alert-dismissible fade show" style="background-color: #b55555">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>

    @elseif(session()->has('delete'))
    <div class="alert text-light alert-dismissible fade show" style="background-color: #b55555">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif