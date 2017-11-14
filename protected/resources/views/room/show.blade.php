@extends('layouts.app')
@section('content')

<div class="section">
       

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Ruang {{$name->name}}</h4><hr>
           <div class="col-md-6 btn-group" role="group" aria-label="...">
    

  <div class="btn-group" role="group">

    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Tambah Customer
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="{!!url('admin/customer/course/add')!!}" > Kursus</a></li>
         <li><a href="{!!url('admin/customer/test/add')!!}" >Test</a></li>
    </ul>
  </div> 
<a href="{!!url('admin/room/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ruang</a>
</div>
        </div>
        <br>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
        
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        
                        <th> Nama Kegiatan </th>
                        <th> Jadwal Mulai</th>                       
                        <th> Jadwal Selesai</th>                       
                        
                        
                        
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($room as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->sname); ?></td><td><?php echo date("D j M Y H:i", strtotime($item->start)); ?></td><td><?php echo date("D j M Y H:i", strtotime($item->end)) ?></td>
                  
                   
                </tr>
            @endforeach
            
            </tbody>
        </table>

    </div>
  </div>

</div>






@endsection