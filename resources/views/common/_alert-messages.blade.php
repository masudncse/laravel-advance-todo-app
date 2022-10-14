@if ( $errors->any() )
    <p class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-circle"></i>
        <strong>{{ __('Opps!') }}</strong> {{ __('The given data was invalid') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </p>
@endif

@if (session()->has('message'))
    <p class="alert {{ session()->get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-circle"></i>
        <strong>Head up!</strong> {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </p>
@endif

@if (session()->has('success'))
    <p class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-circle"></i>
        <strong>Head up!</strong> {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </p>
@endif

@if (session()->has('warning'))
    <p class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-circle"></i>
        <strong>Warning!</strong> {{ session()->get('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </p>
@endif

@if (session()->has('error'))
    <p class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-circle"></i>
        <strong>Error!</strong> {{ session()->get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </p>
@endif

@if (session()->has('info'))
    <p class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="mdi mdi-alert-circle"></i>
        <strong>Head up!</strong> {{ session()->get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </p>
@endif
