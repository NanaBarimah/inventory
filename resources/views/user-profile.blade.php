<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventory Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
    />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/now-ui-dashboard.min.css?v=1.2.0')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/main.css')}}" />
</head>

<body>
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main-panel">
            @include('layouts.navbar', ['page_title' => 'User Profile'])
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="#" id="profile_update_form">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="First Name" value="{{Auth::user()->firstname}}" name="firstname">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="{{Auth::user()->lastname}}" name="lastname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="tel" class="form-control" placeholder="Username" value="{{Auth::user()->phone_number}}" name="phone_number"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" placeholder="Username" value="{{Auth::user()->email}}" name="email" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <p class="form-control" disabled>{{Auth::user()->role}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="title">Change Password</h5>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                        <label>Old Password</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="old_password" id="old_password">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <label>New Password</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="new_password" id="new_password">
                                                <p class="text-danger text-center" style="font-size:11px; display:none">The passwords you have provided do not match</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <label>Confirm Password</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="confirm_password">
                                                <p class="text-danger text-center" style="font-size:11px; display:none;">The passwords you have provided do not match</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-center">
                                        <input type="hidden" name="user" id="user" value="{{Auth::user()->id}}"/>
                                        <button type="submit" id="btn_submit" class="btn btn-wd btn-purple" disabled>Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                <img class="round" width="96" height="96" avatar="{{Auth::user()->firstname}} {{Auth::user()->lastname}}" />
                                    <h5 class="title" id="card-fullname">{{ucfirst(Auth::user()->firstname)}} {{ucfirst(Auth::user()->lastname)}}</h5>
                                    <p class="description" id="card-username">
                                        {{Auth::user()->username}}
                                    </p>
                                </div>
                                <p class="description text-center">
                                    {{ucfirst(Auth::user()->role)}}
                                    <br> {{$hospital->name}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
            @include('hospital-modal')
    
    <!--   Core JS Files   -->
    <!--script src="{{ asset('js/app.js') }}" defer></script-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/now-ui-dashboard.min.js?v=1.2.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-notify.js')}}" type="text/javascript"></script>
    <script>
        $('#profile_update_form input').on('input', function(){
            $('#btn_submit').prop('disabled', false);
        });

        $('#profile_update_form').on('submit', function(e){
            e.preventDefault();
            const btn = $('#btn_submit');

            if($('#old_password').val() == '' && $('#new_password').val() == ''){
                var form_data = $('#profile_update_form').serialize()+'&password_reset=no';
                $('#profile_update_form').find('input').prop('disabled', true);
            }else{
                if($('#new_password').val() != $('#confirm_password').val()){
                    $('.text-danger').css('display', 'block');
                    $('#profile_update_form').find('input').prop('disabled', false);
                    $('#btn_submit').html('Save');
                    return false;
                }else{
                    var form_data = $('#profile_update_form').serialize()+'&password_reset=yes';
                    $('#profile_update_form').find('input').prop('disabled', true);
                }
            }

            submit_form("/api/users/update/{{Auth::user()->id}}", "put", form_data, undefined, btn, true);
        });

    </script>
</body>
</html>