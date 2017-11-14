@extends('layouts.app')
@section('content')
 
<div class="container">
      <div class=row>
        <h4><i class="fa fa-book"></i> Daftar Hadir <?php echo ucwords($level->name).' '.date('D m Y', strtotime($level->start)).' Kelas '.$level->kelas; ?> </h4><hr>
         @if(Auth::user()->admin!='dosen') 
       
             <div class="col-md-5 btn-group" role="group" aria-label="...">
    

  <div class="btn-group" role="group">

    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-download"></i>
     Unduh
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li> <a href="{{ url('admin/course/' . $level->level_id.'/class/'.$level->kelas.'/attendance/print') }}" target="_blank" > Unduh Absen</a></li>
         <li><a href="{!!url('admin/course/' . $level->level_id.'/class/'.$level->kelas.'/berita/print')!!}" target="_blank" >Unduh Berita Acara</a></li>
         <li><a href="{!!url('admin/course/' . $level->level_id.'/report/kelas/'.$level->kelas.'/periode/'.$periode->id.'/print')!!}" target="_blank" >Unduh Laporan</a></li>
    </ul>
  </div>             


</div>
@endif
</div>

<br>

<!-- Modal -->

@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num" rowspan="2">No</th>
                        <th rowspan="2" class="name">Nama</th>
                        <th>Kehadiran</th> 
                        <th>Keterangan</th> 
                        <th class="action">Action</th>
                    </tr>
                    
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($pengajar as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td ><?php echo ucwords($item->name ) ?></td><td>
              
                    @if($item->status_user=='1')                         
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"
                    @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')disabled
                    @else
                    @endif>Hadir</button>
                    @elseif($item->status_user=='2')    
                     <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen') disabled
                    @endif disabled>Menggantikan</button>
                    @elseif($item->status_user=='0')
                     <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')
                     disabled
                    @else 
                    @endif >Tidak Hadir</button>
                    @elseif($item->status_user==null)
                     <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal" @if(Auth::user()->admin=='dosen') disabled
                    @endif >Belum diset</button>
                    @endif
                    

                    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form name="frm"  role="form" method="POST" action="{{ url('admin/course/attendance/setabsen')}}">
          <input type="hidden" name="attendance_id" value="{{$item->id}}">
          <div class="form-group">
      
            <label for="message-text" class="control-label">Kehadiran:</label>
            
            <div><input type="radio" name="kehadiran" value="0" required>Tidak Hadir/Digantikan</div>
            <div><input type="radio" name="kehadiran" value="1" required>Hadir</div>
       </div>
          <div class="form-group">
      
            <label for="message-text" class="control-label">Diganti:</label>
            <div>
                <select id="pengganti" name="pengganti" class="form-control" >
                <option value="">Pilih Penganti</option>
            @foreach($user as $itemb)
        
                    <option value="{{$itemb->id}}"><?php echo ucwords($itemb->name); ?></option>
                    @endforeach
                </select>
            

                </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Keterangan</label>
           <textarea class="form-control" id="message-text" name="keterangan" required></textarea>
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


                    </td>
                    <td>{{$item->keterangan}}</td>
                    <td class="text-center"> 
                    
                  
                   @if(Auth::user()->admin=='admin'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur')
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
                                     @endif                      
                            
                           
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
<script type="text/javascript">
 $('#pengganti').attr('disabled', true);
   $('input:radio[name="kehadiran"]').change(function() {

    if ($(this).val()=='0') {
        $('#pengganti').attr('disabled', false);
    } 

    
    else{
        $('#pengganti').attr('disabled', true).val('');
    }
});
</script>
     <h1>
<div class="btn-group" role="group">@if(Auth::user()->admin=='admin'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur')
<a  href="{{ url('/admin/course/'.$lid.'/class/'.$kp.'/addcustomer') }}" 
                  class="btn btn-primary" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"> <span class="glyphicon glyphicon-plus"></span> Peserta
                    </a>@endif
 
                <a href="{!!url('/admin/course/'. $level->id.'/class/'.$level->kelas.'/grade/edit')!!}" class="btn btn-info"  ><i class="glyphicon glyphicon-pencil"></i>Tambah/Edit Nilai</a> </div>
</h1>
         <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num" rowspan="2">No</th>
                        <th rowspan="2" class="name">Nama</th>
                        <th>Kehadiran  <div class="btn-group" role="group" aria-label="...">
                       
  

  <div class="btn-group" role="group">
<a href="{{ url('/admin/course/attendance/setall/'.$sid.'/1') }}" 
                  class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right" 
                  @if(Auth::user()->admin=='dosen') disabled @endif
                  <?php if (sizeof($ischeck)>0) {
                    echo "disabled";
                  } ?> 
                   > Semua Hadir
                    </a>
                    <a href="{{ url('/admin/course/attendance/setall/'.$sid.'/0') }}" 
                  class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right" @if(Auth::user()->admin=='dosen') disabled @endif  <?php if (sizeof($ischeck)>0) {
                    echo "disabled";
                  } ?>  > Semua Tidak Hadir
                    </a></div></div></th> 
                     <th class="num">Status Buku</th>
                        <th class="num">Nilai</th>               
                        <th class="action">Action</th>
                    </tr>
                    
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name ) ?></td><td>
                
                  
                  @if($item->status_customer===1)
                  <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/0') }}" 
                  class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right" 
                  @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen') disabled @endif> Hadir 
                    </a>
                  @elseif($item->status_customer===0)
                  <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/1') }}" 
                  class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"
                   @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen') disabled @endif> 
                    Tidak Hadir</a>
                  @else
                  
                   <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/1') }}" 
                  class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"
           @if(Auth::user()->admin=='dosen') disabled @endif >Set Hadir  </a>
             <a href="{{ url('/admin/course/attendance/setabsencust/'.$item->aid.'/0') }}" 
                  class="btn btn-danger btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"
            @if(Auth::user()->admin=='dosen') disabled @endif >Set Tidak Hadir  </a>
                  @endif
                     
                    </td><td> 

                    
                    @if($item->book_status===0)
                    <a href="{{url('admin/nota/setbook/'.$item->id)}}" class="btn btn-danger btn-xs" @if(Auth::user()->admin=='dosen') disabled @endif>Belum diambil</a> 
                    @else
                    
                    <a href="{{url('admin/nota/setbook/'.$item->id)}}"  class="btn btn-primary btn-xs" @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')
                    disabled 
                    @endif >Sudah diambil</a>
                    @endif

                    </td><td><?php echo ucwords($item->nilai ) ?></td>
                    <td class="text-center"> 
                    <a href="{{ url('/admin/customer/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> 
                    @if(Auth::user()->admin=='admin'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur')
                   <a href="{{ url('/admin/report/customer/'. $item->id.'/add') }}" class="btn btn-success btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right">

                  
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"/>
                    </a> 
                   
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['admin/course/delete/customer/'.$item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Yakin Hapus Peserta ini?")'
                            ));!!}
                        {!! Form::close() !!}  
                           @endif
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
   
        </div>
      

@endsection