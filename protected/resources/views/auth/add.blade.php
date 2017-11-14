@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add User</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/admin/user/store') }}">
                     

                         <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                      
                          <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" required>
                                @if($errors->has('username')) 
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                       <script type="text/javascript">
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });
    </script>

                       
                          <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                                <select id="admin" name="admin" class="form-control" > 
                                @if(Auth::user()->admin=='admin')
                                    <option value="admin">Admin</option>
                                    <option value="direktur">Direktur</option>
                                    <option value="kepala">Kepala</option>                                    
                                @elseif(Auth::user()->admin=='direktur')   
                                    <option value="kepala">Kepala</option>                                    
                                @endif
                                <option value="dosen">Dosen</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" onChange="checkPasswordMatch();">
                            </div>
                            <div class="registrationFormAlert" id="validate-status"></div>
                        </div>
                         
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Photo</label>
                                <div class="col-md-4 control-label">
                                    <img src="{{ asset('images/user.png') }}" id="showgambar" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"/>
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"></label>
                                <div class="col-md-4 control-label">
                                  <input type="file" id="inputgambar" name="photo" class="validate"/ >
                                  <script type="text/javascript">
                                   function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#showgambar').attr('src', e.target.result);
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    $("#inputgambar").change(function () {
                                        readURL(this);
                                    });
                                    </script>
                                </div>
                          </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-edit"></i>Add</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
