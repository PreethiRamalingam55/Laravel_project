@if(session('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close font-weight-bold " data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session('custom_error'))
    <div class="mt-2 mb-2 alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('custom_error') }}
        <button type="button" class="btn-close font-weight-bold "data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
