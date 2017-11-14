@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/admin/user/update/'.$tampiledit->id) }}" required>
                     

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$tampiledit->name}}" required>
                            </div>                            
                        </div>
                      
                          <div class="form-group">
                            <label for="username" class="col-md-4 control-label">UserName</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{$tampiledit->username}}" readonly>
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
                                <select id="admin" name="admin" class="form-control" disabled> 
                                    
                                    <option value="Auth::user()->admin"><?php echo  ucwords(Auth::user()->admin); ?></option>
                                    
                                </select>
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$tampiledit->email}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{$tampiledit->password}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$tampiledit->password}}">
                            </div>
                            <div class="registrationFormAlert" id="validate-status"></div>
                        </div> 
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Photo</label>
                                <div class="col-md-4 control-label">

                                    @if(Auth::user()->photo==null)
                                    <img src="{{ asset('images/user.png') }}" id="showgambar" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                                    @else
                                    <img src="{{ asset('images/user/'.$tampiledit->photo) }}" id="showgambar" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                                    @endif  
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
                                        <i class="fa fa-btn fa-edit"></i>Update</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
