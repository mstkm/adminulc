@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Laporan Kepuasan Peserta <?php echo ucwords($level->name); ?> </h4><hr>
            <div class="col-md-6">             

            <div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Periode <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">

  @foreach($periode as $thn)
  <li><a href="{{url('admin/course/'.$lid.'/report/kelas/'.$kp.'/periode/'.$thn->id)}}">{{$thn->year}} - {{$thn->quarter}}</a></li>
        @endforeach   
 
  </ul>
</div>


            
            </div></div></div>
      


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
 {{-- */$x=0;/* --}}
            @foreach($user as $item)
                {{-- */$x++;/* --}}
                <?php if (sizeof($user)%2==0) {
                    echo '<div class="col-md-6">';}
                    else{
                    echo '<div class="col-md-4">';
                }
                 ?>
    
        <div class="panel panel-default">
        <div class="panel-heading">{{$item->name}} {{$item->present}}</div>                     

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
                    <td class="text-center">1</td>
                    <td class="quest">Pengajar menguasai materi dengan baik</td>
                    <th class="text-center">{{$item->q7}}</th>  
                </tr>
                <tr>
                    <td class="text-center">2</td>
                     <td class="quest">Pengajar mengajar dengan suara yang jelas.</td>
                    <th class="text-center">{{$item->q8}}</th>  
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="quest">Pengajar membagi perhatian secara merata kepada semua peserta kursus</td>
                   <th class="text-center">{{$item->q9}}</th>  
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="quest">Pengajar yang menjelaskan dengan baik, sistematis, mudah dipahami.</td>
                    <th class="text-center">{{$item->q10}}</th>  
                    </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td class="quest">Pengajar memotivasi peserta untuk belajar.</td>
                    <th class="text-center">{{$item->q11}}</th>  
                </tr>
                <tr>
                    <td class="text-center">6</td>
                    <td class="quest">Pengajar menjawab semua pertanyaan dengan jelas.</td>
                    <th class="text-center">{{$item->q12}}</th>  
                </tr>
                <tr>
                    <td class="text-center">7</td>
                    <td class="quest">Pengajar memusatkan perhatian pada topik.</td>
                   <th class="text-center">{{$item->q13}}</th>  
                </tr><tr>
                    <td class="text-center">8</td>
                    <td class="quest">Pengajar menciptakan suasana tertib, serius, namun rileks untuk belajar.</td>
                    <th class="text-center">{{$item->q14}}</th>  
                </tr><tr>
                    <td class="text-center">9</td>
                    <td class="quest">Pengajar menciptakan keseimbangan antara belajar 1 arah dan interaktif.</td>
                    <th class="text-center">{{$item->q15}}</th>  
                </tr><tr>
                    <td class="text-center">10</td>
                    <td class="quest">Pengajar mendayagunakan fasilitas kelas dengan baik.</td>
                    <th class="text-center">{{$item->q16}}</th>  
                </tr><tr>
                    <td class="text-center">11</td>
                    <td class="quest">Pengajar bersikap ramah dan berpenampilan profesional..</td>
                    <th class="text-center">{{$item->q17}}</th>  
                </tr><tr>
                    <td class="text-center">12</td>
                    <td class="quest">Pengajar mengawali dan mengakhiri pelajaran tepat waktu.</td>
                    <th class="text-center">{{$item->q18}}</th>  
                </tr>
            </tbody>
        </table> 
                       
        </div>

         
    </div>
    @endforeach


    
</div>
        

      

@endsection