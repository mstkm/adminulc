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
     Bulan
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php
$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$jlh_bln=count($bulan);
for($c=0; $c<$jlh_bln; $c++){
    $x=$c+1;
    echo"<li><div><input type=radio name=month value=0$x> $bulan[$c] </div></li>";
}
?>
    </ul>
  </div> 


      <div class="btn-group" role="group">

    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tahun
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        @foreach($year as $thn)
        <li> <input type="radio" name="year" value="{{$thn->tahun}}"> {{$thn->tahun}}</li>
        @endforeach
    </ul>
  </div>
  <button class="btn btn-primary" type="submit">Muat</button>       
</div>


            
  
            {!! Form::close() !!} 
            <div class="col-md-2 navbar-right navbar-text navbar-right"><a href="{{url('admin/report/finance/bulan/'.$bln.'/tahun/'.$thnpil.'/print')}}" class="btn btn-success">Unduh Laporan</a></div>
            </div>
          
   
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
<div class="col-md-12">
        
                   
                          
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Total</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;"><?php echo 'Rp. '.number_format($all); ?></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-success">
                                    <div class="panel-heading">Jumlah Daftar</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;"><?php echo 'Rp. '.number_format($daftar); ?></div>
                                </div>
                            </div>
                                 <div class="col-md-3">
                                <div class="panel panel-info">
                                    <div class="panel-heading">Jumlah Kursus & Lunas</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;"><?php echo 'Rp. '.number_format($kursus); ?></div>
                                </div>
                            </div>                          
                            <div class="col-md-3">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Jumlah Retur</div>
                                    <img src="{{ asset('images/barchart.png') }}" class="center-block" alt="Cinque Terre" width="74" height="74">
                                    <div class="panel-body" style="text-align: center;"><?php echo 'Rp. '.number_format(-1*$retur); ?></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                   
                     

        <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Pendaftar/Level</div>                     

           <div id="piechart" style="width:100%">@piechart('level_id', 'piechart')</div>
                       
        </div>

         
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading">Presentase Pendaftar/Tipe Layanan</div>                     

           <div id="piechart2" style="width:100%">@piechart('type', 'piechart2')</div>
                       
        </div>

         
    </div>
  
   
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Presentase Layanan</div>
            <div id="chart2" style="width:100%">@barchart('Votes', 'chart2')</div>                       
        </div>         
    </div>
  
    <div class="col-md-12">
     <div class="col-md-5">
        <div class="panel panel-default">
        <div class="panel-heading">Daftar Ulang Tahun</div>   
           <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Hari n Tanggal</th>                          
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($user as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td></td><td><?php echo ucwords($item->name) ?></td><td>
                    <?php echo date("D j M Y", strtotime($item->birthdate)); ?></td>

                 
                 
                </tr>
            @endforeach
            
            </tbody>
        </table> 
        </div>

         
    </div>
   
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Transaksi Terbaru</div>
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Kursus / Test</th>                          
                        <th>Keterangan</th>
                        <th>Jenis Bayar</th>
                        <th>Harga</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td></td><td><?php echo ucwords($item->nama) ?></td><td><?php echo ucwords( $item->service );?></td>
                    <td>
                    @if($item->test==NULL)
                    <?php echo ucwords( $item->level );?>
                    @else
                    <?php echo date("D j M Y", strtotime($item->tgltest)); ?>

                    @endif
                    </td>
                    <td><?php echo  strtoupper(" $item->bayar "); ?></td>
                    <td>Rp. <?php echo number_format($item->harga); ?>

                    
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>                     
        </div>         
    </div>
    </div>


    
</div>
        

      

@endsection