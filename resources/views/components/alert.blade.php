@if (session()->has('success'))
    <div class="alert text-dark" style="background-color: #4ca97f;">
        {{ session('success') }}
    </div>

    @elseif(session()->has('error'))
    <div class="alert text-light" style="background-color: #b55555">
        {{ session('error') }}
    </div>

    @elseif(session()->has('delete'))
    <div class="alert text-light" style="background-color: #b55555">
        {{ session('delete') }}
    </div>
@endif