@extends('admin.layout-data.layout-auth')

@section('auth_content')
    <div class="color-line"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12" style="margin-top: 20px">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN TO DASHBOARD</h3>
                    <p>This is navodaya allumni admin!</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('admin.adminLoginFormSubmit') }}" id="loginForm" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="email">Email *</label>
                                <input type="text" title="Please enter you email" required="" value=""
                                    name="email" id="email" class="form-control">
                                <span class="help-block small">Your unique email to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password *</label>
                                <input type="password" title="Please enter your password" required="" value=""
                                    name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
                                    <input type="checkbox" class="i-checks" name="remember"> Remember me </label>>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="{{route('admin.registerAdminForm')}}">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
@endsection
