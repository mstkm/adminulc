

@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Toefl</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('admin/periode/store') }}">                    

                        <div class="form-group">                        
                            <label for="id" class="col-md-4 control-label">Tahun Ajaran</label>
                            <div class="col-md-6">

                                <input type="text" class="form-control" name="year" placeholder="2016/2017">
                               
                             
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Quarter</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="quarter">                             
                            </div>
                        </div>
                        
                        <input type="hidden" name="status" value="0">
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