@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Your Profile <small class="text-muted">Your basic information</small></h4>
                    <hr>
                    <div class="lead">Email Address:</div>
                    <div>{{Auth::user()->email}} (<a href="#">Change</a>)</div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#passwordChange">
                            Change Password
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="lead">Statistics</div>
                    <hr>
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td class="px-0">Uploads: <i class="fas fa-info-circle text-muted" data-toggle="popover" data-placement="top" data-content="Active (Total)"></i></td>
                                <td class=" px-0 text-right">31 (31)</td>
                            </tr>
                            <tr>
                                <td class="px-0">Views:</td>
                                <td class="px-0 text-right">5,663</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
<!-- Change Password -->
<div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="passwordChangeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordChangeLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="text-center">
                    To change your password, a link will be sent to
                </div>
                <div>
                    <span class="lead">{{Auth::user()->email}}</span>
                </div>
                <div class="small text-muted mt-3">
                    If you do not have access to your email, please create a new account.
                </div>
                <hr>
                <div>
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Nevermind</button>
                    <button type="button" class="btn btn-success float-right">Send the link</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush