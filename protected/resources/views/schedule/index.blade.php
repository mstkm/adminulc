@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Daftar Jadwal </h4><hr>
            <div class="col-md-6">

            @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')                     
            @else

<div class="btn-group" role="group" aria-label="...">
    

  <div class="btn-group" role="group">
 
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tambah Jadwal
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="{!!url('admin/service/test/schedule/add')!!}">Jadwal Test</a></li>
        <li> @if(Auth::user()->admin!='dosen'||Auth::user()->admin!='staff')
  <a href="{!!url('admin/course/add')!!}">Buka Kelas</a>
  @else</li>
    </ul>
    @endif
  </div>
  <div class="btn-group" role="group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tambah Peserta
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="{!!url('admin/customer/course/add')!!}" > Kursus</a></li>
         <li><a href="{!!url('admin/customer/test/add')!!}" >Test</a></li>
       
    </ul>
  </div>
        @if($id==='course')

    <a class="btn btn-default" href="{!!url('admin/course')!!}" ><i class="glyphicon glyphicon-th-list"></i> Daftar Jadwal</a>
    @elseif($id==='test')
    <a class="btn btn-default" href="{!!url('admin/course')!!}" ><i class="glyphicon glyphicon-th-list"></i> Daftar Jadwal</a>
    @endif
</div>



                @endif
                
            </div>
           
        </div>
        <br>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
        <div class="panel panel-primary">

        <div class="panel-heading">       

        </div>

        <div class="panel-body" >

            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}

        </div>

    </div>
   
</div>
      

@endsection