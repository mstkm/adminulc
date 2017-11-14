

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Kursus</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/service/test/schedule/store') }}">                    

                                       
            @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Layanan</label>
                            <div class="col-md-6" id="pilkursus" >
                             <select id="service" name="service_id" class="form-control" >   
                             <option value="0">---------Pilih Test----------------</option>
                             @foreach($service as $item)
                             <option value="{!!$item->id!!}"> {!!$item->name!!} </option>
                            @endforeach                     
                            </select>                           
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                            <div class="col-md-6">                            
                             <select id="level" name="level_id" class="form-control" >   
                                <option value="0">---------Pilih Level------------</option>                                        
                             </select>  

                            
                            </div>
                        </div>
                    <!--  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
                        <div class="form-group">                        
                            <label for="id" class="col-md-4 control-label"> Pilih Jadwal</label>
                                <div class="col-md-6">
                                 <div id="datetimepicker" class="input-group custom-search-form">
                                  

      <input class="form-control timepicker"  type="text" class="form-control" name="date" value="{{ old('date') }}">
<script type="text/javascript">
    $('.timepicker').datetimepicker({

        format: 'DD:MM:YYYY HH:mm:ss'

    }); 
</script> -->





                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Ruang</label>
                            <div class="col-md-6">
                             <select id="admin" name="room_id" class="form-control" >   

                             @foreach($room as $item)                             
                                    <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                            @endforeach                     
                                </select>  

                            
                            </div>
                        </div>

                        <div class="form-group">                        
                            <label for="id" class="col-md-4 control-label"> Pilih Jadwal</label>
                                <div class="col-md-6">
                                 <div id="datetimepicker" class="input-group custom-search-form">
                                    <input type="date" class="form-control" name="date" id="datetimepicker"  value="{{ old('date') }}">
                                    <span class="input-group-btn">
                                        <span class="input-group-btn">
                                            <span id="btnload" class="btn btn-primary"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Jam  </label>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="start" >                             
                                
                            </div>
                            <div class="col-md-2">
                            <input type="time" class="form-control" name="end" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"> Kapasitas  </label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="capacity" >                                
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