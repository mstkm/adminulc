

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/service/test/schedule/store') }}">


                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Level</label>
                            <div class="col-md-6">                            
                                <select id="admin" name="level_id" class="form-control" required >  
                                @foreach($level as $item)
                             <option value="{!!$item->id!!}">{!!$item->nama!!} -> {!!$item->level!!}</option>
                            @endforeach                     
                                </select>                                
                            </div>
                        </div> 
                        <div class="form-group" >
                            <label for="id" class="col-md-4 control-label">Tanggal</label>
                            <div class="col-md-6">
                                <input id="id" type="date" class="form-control" name="date">                             
                            </div>
                            
                        </div>
                        <div class="form-group" >
                            <label for="id" class="col-md-4 control-label">Jam</label>
                            <div class="col-md-6">
                                <input id="id" type="time" class="form-control" name="start">                             
                                <input id="id" type="time" class="form-control" name="end">                             
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Jumlah Kursi</label>
                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control" name="capacity">                             
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