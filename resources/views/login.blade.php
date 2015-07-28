@extends('base')

@section('content')
<div class="login-wrapper">
    <div class="text-center">
        <h2 class="fadeInUp animation-delay8" style="font-weight:bold">
            <span class="text-success">Welcome</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>
        </h2>
    </div>
    <div class="login-widget animation-delay1">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-left">
                    <i class="fa fa-lock fa-lg"></i> Login
                </div>
            </div>
            <div class="panel-body">
                <form class="form-login">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Username" class="form-control input-sm bounceIn animation-delay2">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay4">
                    </div>
                    <div class="form-group">
                        <label class="label-checkbox inline">
                            <input type="checkbox" class="regular-checkbox chk-delete">
                            <span class="custom-checkbox info bounceIn animation-delay4"></span>
                        </label>
                        Remember me
                    </div>
                    <hr>

                    <a class="btn btn-success btn-sm bounceIn animation-delay5 login-link pull-right" href="index.html"><i class="fa fa-sign-in"></i> Sign in</a>
                </form>
            </div>
        </div><!-- /panel -->
    </div><!-- /login-widget -->
</div>
@endsection