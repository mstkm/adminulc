

@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Jadwal Customer</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/schedule/store') }}">                    
                        <input type="hidden" name="customer" value="{{$customer->id}}">




                            
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Senin</label>
                            <div class="col-md-2">
                                <input type="hidden" class="form-control" name="day[]" value="senin" readonly>                             
                                <input type="time" class="form-control" name="start[]" >                            
                            </div>
                            <div class="col-md-2">                                
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Selasa</label>
                            <div class="col-md-2">
                                <input type="hidden" class="form-control" name="day[]" value="selasa" readonly>                             
                                <input type="time" class="form-control" name="start[]" >                            
                            </div>
                            <div class="col-md-2">                                
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Rabu</label>
                            <div class="col-md-2">
                                <input type="hidden" class="form-control" name="day[]" value="rabu" readonly>                             
                                <input type="time" class="form-control" name="start[]" >                            
                            </div>
                            <div class="col-md-2">                                
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Kamis </label>
                            <div class="col-md-2">
                                <input type="hidden" class="form-control" name="day[]" value="kamis" readonly>                             
                             <input type="time" class="form-control" name="start[]" >                            
                            </div>
                            <div class="col-md-2">                                
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Jumat </label>
                            <div class="col-md-2">
                                <input type="hidden" class="form-control" name="day[]" value="jumat" readonly>                             
                              <input type="time" class="form-control" name="start[]" >                            
                            </div>
                            <div class="col-md-2">                                
                                <input type="time" class="form-control" name="end[]" >                             
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-4">
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