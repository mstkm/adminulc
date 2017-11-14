@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah User</div>
                <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/admin/user/store') }}">

                     

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                          
                        </div>
                      </div>
                          <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" value="{{ old('username') }}" name="username" required>
                             
                            </div>
                        </div>


                       
                          <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                                <select id="admin" value="{{ old('username') }}" name="admin" class="form-control" > 
                                @if(Auth::user()->admin=='admin')
                                    <option value="admin" selected=>Admin</option>
                                    <option value="direktur">Direktur</option>
                                    <option value="kepala">Kepala</option>                                    
                                @elseif(Auth::user()->admin=='direktur')   
                                    <option value="kepala" selected>Kepala</option>                                    
                                @endif
                                <option value="dosen">Dosen</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"  name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" onChange="checkPasswordMatch();">
                                <div id="validate-status"></div>
                            </div>
                            
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
                                  <input type="file" id="inputgambar" value="{{ old('username') }}" name="photo" class="validate"/ >
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
                                        <button id="btnsave" type="submit" class="btn btn-primary">
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
