

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Jadwal Test</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/service/test/schedule/update') }}">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="id" value="{{$tampiledit->id}}">


                      
                        <div class="form-group" >
                            <label for="id" class="col-md-4 control-label">Tanggal dan Jam</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control timepicker" name="date" value="<?php echo date("d-m-Y H:i", strtotime($tampiledit->start)); ?>">                            
                            </div>

                
                        </div>

                       

                                     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>                      
<script type="text/javascript">

    $('.timepicker').datetimepicker({

        format: 'DD-MM-YYYY HH:mm'

    }); 



</script> 
                        <div class="form-group">                        
    <label for="id" class="col-md-4 control-label">Durasi</label>
    <div class="col-md-6">
<div class="input-group">
        <input type="text" value="{{$tampiledit->end -$tampiledit->start}}" class="form-control" name="durasi" placeholder="120" required  placeholder="Recipient's username" aria-describedby="basic-addon2" >  
         <span class="input-group-addon" id="basic-addon2">Menit</span>                            
</div>
    </div>
</div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Jumlah Kursi</label>
                            <div class="col-md-6">                               
                                <input id="name" type="number" class="form-control" name="capacity" value="{{$tampiledit->capacity}}">                             
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Simpan</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-danger" data-toggle="tooltip" data-placement="left"><span aria-hidden="true"/>Batal</a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection