@extends('admin.layout-data.layout-auth')

@section('auth_content')
    <div class="color-line"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px">
                <div class="text-center custom-login">
                    <h3>Admin Registration</h3>
                    <p>This is navodaya allumni admin! registration. </p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('admin.registerAdminFormSubmit') }}" id="loginForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Full name *</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone Number *</label>
                                    <input type="text" class="form-control" name="phone_number">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirm Password *</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default">Cancel</button>
                                <p style="margin-top: 10px">
                                    <a href="{{ route('admin.adminLoginForm') }}">Already an account Login</a>
                                </p>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
    </div>
@endsection
