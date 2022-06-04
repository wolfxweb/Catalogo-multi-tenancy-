@if (session('status')) 
    <div class="alert {{ session('classAlerta') }} alert-dismissible fade show"  role="alert">
        <strong>  {{session('status')}}</strong>
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif