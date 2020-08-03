@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center full-height">
        <div>
            <div class="card">
                <div class="card-body">
                    <div class="h4 text-center">Create an account</div>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
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
                                <button type="submit" class="btn btn-block btn-primary">Create Account</button>
                            </div>
                            <hr class="hr-text" data-content="or use a social account">
                            <div id="my-signin2"></div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
            <div class="small text-muted text-center mt-3">Go back to <a href="{{route('login')}}">sign in</a></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function googleSuccess(googleUser) {
        console.log(googleUser.getBasicProfile());
    }
    function googleFailure(error) {
        console.log(error);
    }
    function googleRenderButton() {
        gapi.signin2.render('my-signin2', {
            'scope': 'profile email',
            'width': 240,
            'height': 50,
            'longtitle': true,
            'setText': 'test',
            'theme': 'dark',
            'ux_mode': 'popup',
            'redirect_uri': '{{ env("GOOGLE_REDIRECT_URL") }}',
            'onsuccess': googleFailure,
            'onfailure': googleFailure,
        });
    }
</script>
<script src="https://apis.google.com/js/platform.js?onload=googleRenderButton" async defer>
</script>
@endpush