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

    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-print"></i>
     Print
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li> <a href="{{ url('admin/course/' . $level->id.'/class/'.$level->kelas.'/attendance/print') }}" target="_blank" > Print Absen</a></li>
         <li><a href="{!!url('admin/course/' . $level->id.'/class/'.$level->kelas.'/berita/print')!!}" target="_blank" >Print Berita Acara</a></li>
    </ul>
  </div>             
<a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/add')!!}" class="btn btn-primary"  ><i class="glyphicon glyphicon-check"></i> Input Nilai</a> 
                <a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/edit')!!}" class="btn btn-primary"  ><i class="glyphicon glyphicon-pencil"></i> Edit Nilai</a> 

</div>

</div>

<br>

            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center" rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th>Kehadiran</th> 
                        <th>Action</th>
                    </tr>
                    
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($pengajar as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name ) ?></td><td>
                    {{-- */$p=0;/* --}}
                     @foreach($item->attendances as $att)
                     {{-- */$p++;/* --}}
                                         <!-- <td> -->
  

  <div class="modal fade" id="myModal{{$x}}" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Jadwal Kehadiran <?php echo date("D j M Y H:i", strtotime($att->schedule->start));?></h4>
        </div>
        <div class="modal-body">
            <form name="frm"  role="form" method="POST" action="{{ url('admin/course/attendance/'.$item->id.'/setabsen')}}">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Keterangan</label>
           <textarea class="form-control" id="message-text" name="keterangan"></textarea>
          </div>
          <div class="form-group">
          <div>
            <label for="message-text" class="control-label">Kehadiran:</label>
            <div>
            <input type="radio" name="kehadiran" value="1">Hadir
            </div>
            <div><input type="radio" name="kehadiran" value="0">Tidak Hadir</div>
          </div>
           <div class="modal-footer">
          <button type="submit" class="btn btn-default">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
        </form>
        </div>
       
          
        </div>
    </div>
  </div>
</div>
</div>        <!-- <input type="checkbox" name="absen[]" value="{{$att->id}}"  -->

                    @if($att->status_user===0)
                    <a href="" class="btn btn-danger btn-xs disabled" title="{{$att->keterangan}}" data-toggle="tooltip" data-placement="left"><span aria-hidden="true"/>A</a> 
                    @elseif($att->status_user===1) 
                    <a href="" class="btn btn-primary btn-xs disabled" title="{{$att->keterangan}}" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a> 
                    @elseif($att->status_user===null)
                    <!-- <a href="{{ url('admin/course/attendance/'.$item->id.'/setabsen')}}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a>
                    <a href="{{ url('admin/course/attendance/'.$item->id.'/setabsen')}}" class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>A</a>             
                     -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$x}}">Open Modal</button>
                 
                 @endif
       
                    ||
                       @endforeach
                   
                    </td>
                    <td class="text-center"> 
                    <a href="{{ url('/admin/customer/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> 
                    
                   
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
<a  href="{{ url('/admin/course/'.$lid.'/class/'.$kp.'/addcustomer') }}" 
                  class="btn btn-primary" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"> <span class="glyphicon glyphicon-plus"></span> Peserta
                    </a>
                   <a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/add')!!}" class="btn btn-info"  ><i class="glyphicon glyphicon-check"></i> Input Nilai</a> 
                <a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/edit')!!}" class="btn btn-success"  ><i class="glyphicon glyphicon-pencil"></i> Edit Nilai</a> </div>
</h1>
         <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center" rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th>Kehadiran</th> 
                        <th>Nilai</th>               
                      
                        <th>Action</th>
                    </tr>
                    
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name ) ?></td><td>
                    {{-- */$p=0;/* --}}
                     @foreach($item->attendance as $att)
                     {{-- */$p++;/* --}}


                     
                    <!-- <td> -->

                    <!-- <input type="checkbox" name="absen[]" value="{{$att->id}}"  -->
                    @if($att->status_customer===0)
                    <a href="" class="btn btn-danger btn-xs disabled" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right" ><span aria-hidden="true"/>A</a> 
                    @elseif($att->status_customer===1) 
                    <!-- checked disabled> -->
                    <a href="" class="btn btn-primary btn-xs disabled" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a> 
                    @elseif($att->status_customer===null)
                    <a href="{{ url('admin/course/attendance/'.$item->id.'/setabsen')}}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a>
                    <a href="{{ url('admin/course/attendance/'.$item->id.'/setabsen')}}" class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>A</a>             
                    
                    
                    
{{$att->q2}}
      
                    
                    
                    @endif
              
                    
                    <!-- </td> -->
                    |
                       @endforeach
                   
                    </td><td><?php echo ucwords($item->nilai ) ?></td>
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