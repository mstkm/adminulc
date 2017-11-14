

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Kursus</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/class/room/store') }}">                    

                        
                   
                    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif


                                
                                
                          

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Ruang</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  
                                value="{{$tampiledit->name}}" value="{{ old('name') }}" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Kapasitas Ruang</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{$tampiledit->capacity}}" value="{{ old('capacity') }}" name="capacity" required>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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