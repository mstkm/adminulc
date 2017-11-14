

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 <div class="panel-heading">Form Jadwal Ruang {{$room->name}}</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('admin/class/room/schedule/store') }}">                    
                        <input id="id" type="hidden" class="form-control" value="{{$room->id}}" name="rid">
                        <input id="id" type="hidden" class="form-control" value="{{$room->name}}" name="rname">
                    
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Senin </label>
                            
                                <input type="hidden" class="form-control" name="day[]" value="senin">                             
                            
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start[]" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>


                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Selasa </label>
                            
                                <input type="hidden" class="form-control" name="day[]" value="selasa">                             
                            
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start[]" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Rabu </label>
                            
                                <input type="hidden" class="form-control" name="day[]" value="rabu">                             
                            
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start[]" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Kamis </label>
                            
                                <input type="hidden" class="form-control" name="day[]" value="kamis">                             
                            
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start[]" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hidden" class="col-md-4 control-label">Jumat </label>
                            
                                <input type="hidden" class="form-control" name="day[]" value="jumat">                             
                            
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start[]" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-5">
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