@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Kursus Bahasa </h4><hr>
            <div class="col-md-6">



         
            
            </div>
            
        </div>
        <br>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                            <div class="col-md-12">
                   
                     
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Pendaftar/Level</div>                     

           <div id="piechart" style="width:100%">@barchart('data', 'piechart')</div>
                       
        </div>

         
    </div>
   
                       
        </div>         
    </div>
    </div>


    
</div>
        

      

@endsection