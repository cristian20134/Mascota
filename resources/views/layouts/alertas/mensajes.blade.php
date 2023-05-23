@if (session('mensaje'))
    <div class="alert alert-{{ session('mensaje') [0] }}" role="alert">
        {{ session('mensaje') [1] }}
    </div>
@endif
