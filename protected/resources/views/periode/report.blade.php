@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Laporan Tahun {{$now->year}} Triwulan {{$now->quarter}} </h4><hr>
            <div class="col-md-6">



              
            {!! Form::open(['method'=>'GET','url'=>'/admin/report/finance/periode','role'=>'search'])  !!}
            <div class="col-md-5">
            <select id="service" name="periode" class="form-control" >   
            <option value="0">------Pilih Periode--------</option>
            @foreach($periode as $item)
            <option value="{!!$item->id!!}" >{!!$item->year!!} Periode {!!$item->quarter!!}</option>
            @endforeach         
            </select>                                         
            </div>


            
            <button type="submit" class="fa-btn btn btn-primary"> Submit </button>
            
            {!! Form::close() !!} 
            
            </div>
            
        </div>
        <br>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
<div class="container">
    <div class="row">
        <!--blog start-->
        <div class="col-lg-12 ">
            <div id="chart" style="width:100%">@barchart('data', 'chart')</div>
        </div>
    </div>
</div>
        

      

@endsection