@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

    
        <h4><i class="fa fa-book"></i> Data Keuangan Kursus Tahun <?php echo date('Y'); ?></h4><hr>
    
            {!! Form::open(['method'=>'GET','url'=>'/admin/report/finance/filter'])  !!}


             <div class="col-md-6 btn-group" role="group" aria-label="...">
    


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


            
  
            {!! Form::close() !!} 
         
   
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <br><br>
   
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Presentase Layanan</div>
            <div id="chart2" style="width:100%">@barchart('Votes', 'chart2')</div>                       
        </div>         
    </div>
                    
        </div>         
    </div>
    </div>


    
</div>
        

      

@endsection