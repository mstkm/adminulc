@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Keuangan Kursus Tahun {{$now->year}} - Periode {{$now->quarter}}</h4><hr>
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


            
            <button type="submit" class="fa-btn btn btn-primary"> Load </button>
            
            {!! Form::close() !!} 
            
            </div>
            
        </div>
        <br>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
<div class="col-md-12">
        
                   
                          
                                <div class="col-md-3">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">Jumlah Daftar</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;">{{$bayar}}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-success">
                                    <div class="panel-heading">Jumlah Kursus</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;">{{$kursus}}</div>
                                </div>
                            </div>
                                 <div class="col-md-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Jumlah Lunas</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;">{{$lunas}}</div>
                                </div>
                            </div>
                             
                                 <div class="col-md-3">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Jumlah Retur</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;">{{$retur}}</div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                   
                     

        <div class="col-md-4">
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Pendaftar/Level</div>                     

           <div id="piechart" style="width:100%">@piechart('level_id', 'piechart')</div>
                       
        </div>

         
    </div>
   
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Presentase Layanan</div>
            <div id="chart" style="width:100%">@barchart('data', 'chart')</div>                       
        </div>         
    </div>
  
    <div class="col-md-4">
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Kepuasan Kursus</div>                     

           <div id="kursus" style="width:100%">@piechart('kursus', 'kursus')</div>
                       
        </div>

         
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Mengikuti Kembali</div>                     
           <div id="lagi" style="width:100%">@piechart('lagi', 'lagi')</div>
                       
        </div>

         
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Kepuasan Pelayanan</div>                   
           <div id="layanan" style="width:100%">@piechart('layanan', 'layanan')</div>
                       
        </div>

         
    </div>
 

    <div class="col-md-6">
     
   
    <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">A</th>
                        <th>Materi</th>
                   
                        <th class="text-center">Rata - rata</th>
                    </tr>
            </thead>
            <tbody>
        
                <tr>
                    <td class="text-center num">1</td>
                    <td class="quest" >Materi sesuai dengan kemampuan saya</td>
                    <th class="text-center">{{$q1avd}}</th>                                  
                </tr>
                 <tr>
                   <td class="text-center">2</td>
                    <td class="quest">Menarik, membuat saya bergairah belajar.</td>   
                    <th class="text-center">{{$q2avd}}</th>              
                </tr>
                <tr>
                   <td class="text-center">3</td>
                    <td class="quest">Materi memberi banyak informasi</td>    
                    <th class="text-center">{{$q3avd}}</th>             
                </tr>
            
            </tbody>
        </table> 
        </div>
        <div class="col-md-6">

        <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">B</th>
                        <th>Waktu Belajar</th>
                        <th class="text-center">Rata - rata</th> 
                    </tr>
            </thead>
            <tbody>
            
        
                <tr>
                    <td class="text-center num" >1</td>
                    <td class="quest">Waktu sesuai dengan kebutuhan/kondisi saya</td> 
                    <th class="text-center">{{$q4avd}}</th> 


                                     
                </tr>
                <tr>
                    <td class="text-center num" >2</td>
                    <td class="quest">Lama belajar (100 menit) sesuai dengan bobot materi.</td>
                    <th class="text-center">{{$q5avd}}</th> 


                                     
                </tr>
                 <tr>
                   <td class="text-center">3</td>
                    <td class="quest">Materi memberi banyak informasi</td>  
                    <th class="text-center">{{$q6avd}}</th>    
                                 
                </tr>            
            </tbody>
        </table>        

    </div>

            
    </div>
    </div>
</div>
        

      

@endsection