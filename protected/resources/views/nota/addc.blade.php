

@extends('layouts.app')
@section('content')



<d<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Form Registrasi Kursus</div>
            <div class="panel-body">
                <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/customer/store') }}">         
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif           
                    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div id="cust-status"></div>   

                    
                    <div class="form-group">                        
                        <label for="id" class="col-md-4 control-label">ID/NRP</label>
                        <div class="col-md-6">
                           <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="username" id="username" placeholder="12345678" value="{{ old('username') }}" required>
                            <span class="input-group-btn">
                                <span class="input-group-btn">
                                    <span id="btnload" class="btn btn-primary">Cek</span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>                             
                        <input id="id" type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                    </div>
                </div>


                <div class="form-group">
                    <label for="admin" class="col-md-4 control-label">Asal</label>
                    <div class="col-md-6">                            
                        <select id="asal" name="asal" class="form-control" required>   
                            <option value="ubaya">UBAYA</option>                          
                            <option value="umum">UMUM</option>
                        </select>                                
                    </div>
                </div>                  
                <div class="form-group">
                    <label for="admin" class="col-md-4 control-label">Pilih Test</label>
                    <div class="col-md-6">
                        <select id="service" name="service_id" class="form-control" required>   
                            <option value="" disabled selected>---------Pilih Layanan----------------</option>
                            @foreach($service as $item)                             
                            <option value="{!!$item->id!!}"><?php echo ucwords( $item->name );?></option>
                            @endforeach                     
                        </select> 
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                    <div class="col-md-6">
                        <select id="level" name="level" class="form-control" required>   
                            <option value="" disabled selected>---------Pilih Level--------------------</option>

                        </select> 
                    </div>
                </div>

               
                <div class="form-group">
                    <label for="admin" class="col-md-4 control-label">Jenis Bayar</label>
                    <div class="col-md-6">                            
                        <select id="admin" name="bayar" class="form-control" required>  
                        <option value="" disabled selected required>---------Pilih Jenis Bayar--------------------</option>

                            <option value="daftar">Daftar</option> 
                            <option value="kursus">Kursus</option>
                            <option value="lunas">Lunas</option>

                        </select>                                
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" id="btnsave">
                            <i class="fa fa-btn fa-user"></i>Save</button>
                        </div>
                    </div>                       
                </form>
            </div>
        </div>
    </div>
</div>
</div>                       
@endsection