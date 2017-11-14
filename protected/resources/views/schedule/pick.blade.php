

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Kursus</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/schedule/pick/store') }}">                    

                                       
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
                            <label for="id" class="col-md-4 control-label"> Pilih Hari</label>
                                <div class="col-md-6">
                                 <select class="form-control" name="day">
                                     <option value="senin">Senin</option>
                                     <option value="selasa">Selasa</option>
                                     <option value="rabu">Rabu</option>
                                     <option value="kamis">Kamis</option>
                                     <option value="jumat">Jumat</option>
                                 </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="name" class=" col-md-4 control-label">Jam  </label>
                            <div class="col-md-2">
                                <input type="text" class="timepicker form-control" name="start" >                             
                                
                            </div>
                            <div class="col-md-2">
                            <input type="text" class="timepicker form-control" name="end" >                             
                            </div>
                        </div>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>                   

      <script>
            
                $('.timepicker').datetimepicker({

                    format: 'HH:mm'

                });                  
        
        </script>  
                     
                        
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