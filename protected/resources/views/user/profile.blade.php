@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">
                <div class="panel-heading">Profil User
                <a href="{{ url('/admin/user/edit/'.$user->id) }}"> <span class="fa fa-btn navbar-right">Edit</span></a>          
                    <div class="panel-body ">

          
                     
                    <div class="panel-body ">
                        <strong>
                            @if($user->photo==null)
                            <img src="{{ asset('images/user.png') }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                            @else
                            <img src="{{ asset('images/user/'.$user->photo) }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                            @endif

                            <p style="text-align:center;"><?php echo ucwords($user->name);?> 
                            <p style="text-align:center;"><?php echo ucwords($user->username);?> 
                            <p style="text-align:center;">{{ $user->phone }} 
                            <p style="text-align:center;">{{ $user->email }}                           
                    </div> 
                </div>
            </div>                 
        </div>
        {!! Form::open(['method'=>'GET','url'=>'/admin/report/finance/filter'])  !!}


             <div class="btn-group" role="group" aria-label="...">
    


      <div class="btn-group" role="group">

    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tahun
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        @foreach($listperiode as $thn)
        <li> <input type="radio" name="periode_id" value="{{$thn->id}}"> {{$thn->year}}</li>
        @endforeach
    </ul>
  </div>
  <button class="btn btn-primary" type="submit">Muat</button>       
</div>
<br>
<br>

            
  
            {!! Form::close() !!} 
         
   
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
    
        <div class="panel panel-default">
            <div class="panel-heading">Presentase Kehadiran</div>
            <div id="chart2" style="width:100%">@barchart('Votes', 'chart2')</div>                       
        </div>         


     
        <h4><i class="glyphicon glyphicon-time"></i> Jadwal Sibuk  </h4>
   
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
        </div>
      
@endsection