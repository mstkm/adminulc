

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/periode/update/'.$id) }}">


                       
                        <div class="form-group" >
                            <label for="id" class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="year" value="{{$tampiledit->year}}">                             
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Triwulan</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="quarter" value="{{$tampiledit->quarter}}">                             
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection