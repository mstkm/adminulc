@extends('layouts.app')
@section('content')
 
<div class="container">
      <div class=row>
        <h4><i class="fa fa-book"></i> PENDAFTAR </h4><hr>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
       <!--  <div class="col-md-6">
        @if(Auth::user()->admin=='dosen')
        @else
            
                <a href="{{ url('admin/course/' . $level->id.'/class/'.$level->kelas.'/attendance/print') }}" class="btn btn-primary" target="_blank"><i class="glyphicon glyphicon-print"></i> Print Absen</a> 
                <a href="{!!url('admin/course/' . $level->id.'/class/'.$level->kelas.'/berita/print')!!}" class="btn btn-primary" target="_blank"><i class="glyphicon glyphicon-print"></i> Print Berita Acara</a>
            @endif  
                <a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/add')!!}" class="btn btn-primary"  ><i class="glyphicon glyphicon-check"></i> Input Nilai</a> 
                <a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/edit')!!}" class="btn btn-primary"  ><i class="glyphicon glyphicon-pencil"></i> Edit Nilai</a>               
            
            </div> -->
           
             <div class="col-md-5 btn-group" role="group" aria-label="...">
    

  <div class="btn-group" role="group">

    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-download"></i>
     Unduh
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li> <a href="{{ url('admin/course/' . $level->level_id.'/class/'.$level->kelas.'/attendance/print') }}" target="_blank" > Unduh Absen</a></li>
         <li><a href="{!!url('admin/course/' . $level->level_id.'/class/'.$level->kelas.'/berita/print')!!}" target="_blank" >Unduh Berita Acara</a></li>
         <li><a href="{!!url('admin/course/' . $level->level_id.'/report/kelas/'.$level->kelas.'/periode/'.$pid.'/print')!!}" target="_blank" >Unduh Laporan</a></li>
    </ul>
  </div>             


</div>

</div>

<br>

            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num" rowspan="2">No</th>
                        <th rowspan="2" class="name">Nama</th>
                        <td class=" name"> Tanggal</td>
                        <th  class="text-center num" >Kehadiran</th>
                         <th  class="text-center">Materi</th>
                        <th rowspan="2" class="action">Action</th>
                    </tr>
                 
                    
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($pengajar as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name ) ?></td><td>{{$item->start}}</td><td>
                
@if($item->status_user===1)
                  <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/0') }}" 
                  class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" disabled data-placement="right" 
                  @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen') disabled @endif> H 
                    </a>
                  @elseif($item->status_user===0)
                  <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/1') }}" 
                  class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" disabled data-placement="right"
                   @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen') disabled @endif> 
                    A</a>
                  @else
                  
                   <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/1') }}" 
                  class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"
           disabled >H  </a>
             <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/0') }}" 
                  class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"
            disabled >A  </a>
                  @endif
                   </td>

<td>{{$item->keterangan}}</td>                    <td class="text-center"> 


                    <a href="{{ url('/admin/user/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> 
                    
                   
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['admin/course/delete/'.$item->lid.'/class/'.$item->class.'/customer/'.$item->nid],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Yakin Hapus Peserta ini?")'
                            ));!!}
                        {!! Form::close() !!}  
                                                           
                            
                           
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>


      <h1>
<div class="btn-group" role="group">
<a  href="{{ url('/admin/course/'.$id.'/class/'.$kp.'/addcustomer') }}" 
                  class="btn btn-primary" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"> <span class="glyphicon glyphicon-plus"></span> Peserta
                    </a>
                   <a href="{!!url('/admin/course/'. $id.'/class/'.$level->kelas.'/grade/add')!!}" class="btn btn-info"  ><i class="glyphicon glyphicon-check"></i> Input Nilai</a> 
                <a href="{!!url('/admin/course/'. $id.'/class/'.$level->kelas.'/grade/edit')!!}" class="btn btn-success"  ><i class="glyphicon glyphicon-pencil"></i> Edit Nilai</a> </div>
</h1>
         <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num" rowspan="2">No</th>
                        <th rowspan="2" class="name">Nama</th>
                        <th colspan="{{$jumweek}}" class="text-center">Kehadiran</th> 
                        <th rowspan="2" >Nilai</th>  
                        <th rowspan="2" class="action">Action</th>               
                    
                    </tr>
                    <tr>
                     
                        <?php for ($i=1; $i <=$jumweek ; $i++) { 
                          echo "<th class=text-center>$i</th> ";
                        } ?>
                    
                        
                    
                    </tr>
                 
                    
            </thead>
            <tbody>
            

            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name ) ?></td>
                    {{-- */$p=0;/* --}}
                     @foreach($item->attendance as $att)
                     {{-- */$p++;/* --}}


                    <td >
                    @if($att->status_customer===0)
                    <a href="" class="btn btn-danger btn-xs disabled" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right" ><span aria-hidden="true"/>A</a> 
                    @elseif($att->status_customer===1) 
                    <!-- checked disabled> -->
                    <a href="" class="btn btn-primary btn-xs disabled" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a> 
                    @elseif($att->status_customer===null)
                    <div class="btn-group" role="group" aria-label="...">
  

  <div class="btn-group" role="group">
                   <a href="{{ url('/admin/course/attendance/setabsencust/'.$att->id.'/0') }}" 
                  class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"> A
                    </a>
                    <a href="{{ url('/admin/course/attendance/setabsencust/'.$att->id.'/1') }}" 
                  class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"> H
                    </a>
                    </div>
                    </div>
                    
                    
{{$att->q2}}
      
                    

                    @endif
                    
              
                    
                   
                  
                       @endforeach
                    </td>
                    <td><?php echo ucwords($item->nilai ) ?></td>
                    <td class="text-center"> 
                    <a href="{{ url('/admin/customer/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> 
                    <a href="{{ url('/admin/report/customer/'. $item->id.'/add') }}" class="btn btn-success btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right">

                    @if($item->q2===0)
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"/>
                    @else
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"/>
                    @endif</a> 
               
                   
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['admin/course/delete/customer/'.$item->nota_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Yakin Hapus Peserta ini?")'
                            ));!!}
                        {!! Form::close() !!}  
                                                           
                            
                           
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
   
        </div>
      

@endsection