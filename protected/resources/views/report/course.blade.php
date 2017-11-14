@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Laporan Kepuasan Peserta</h4><hr>
            <div class="col-md-6">             
            {!! Form::open(['method'=>'GET','url'=>'/admin/report/finance/periode','role'=>'search'])  !!}
           </div></div> <div class="col-md-5">
            <div class="btn-group" role="group" aria-label="...">

  <div class="btn-group" role="group">
    <!-- <input type="text" class="form-control" placeholder="2017" name="year" aria-label="..." required> -->
    <select class="form-control" class="year" name="year" required>
        <option value="" selected disabled >Periode</option>
        @foreach($periode as $thn)
        <option value="{{$thn->id}}">{{$thn->year}} - {{$thn->quarter}}</option>
        @endforeach
    </select>
  </div>
  <div class="btn-group" role="group">
    <button type="submit" class="fa-btn btn btn-primary"> Load </button>
  </div>
</div>

           
            {!! Form::close() !!} 
            
            </div></div>
      


        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#periode').on('change', function(e){
                                    var id = e.target.value;
                                    $.get('{{ url('periode')}}/'+id, function(data){
                                        console.log(id);
                                        console.log(data);
                                        // $('#level').empty();
                                        $.each(data, function(index, element){
                                            $('service').append("<option value="+element.id+" >"+element.name.toUpperCase()+"</option>");
                                        });
                                    });
                                });
                            });
                        </script>


        <br>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                   <div class="col-md-12">
                   
                     

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
                    <td class="quest">Lama belajar sesuai dengan bobot materi.</td>
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
        

      

@endsection