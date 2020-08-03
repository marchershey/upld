@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center full-height">
        <div>
            <div class="card">
                <div class="card-body">
                    <div class="h4 text-center">Sign in</div>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if(count($errors) > 1)
                        <div class="alert alert-danger small text-center" role="alert">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="form-row mb-3">
                                <input type="text" class="form-control text-center" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-row mb-3">
                                <input type="text" class="form-control text-center" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-row">
                                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                            </div>
                            <hr class="hr-text" data-content="or use a social account">
                            <div id="my-signin2"></div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
            <div class="small text-muted text-center mt-3">Don't have an account? <a href="{{route('register')}}">Create one</a>.</div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function onSuccess(googleUser) {
      console.log(googleUser.getBasicProfile());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'setText': 'test',
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }


</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
@endpush