@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> JADWAL TEST </h4><hr>
           

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
  <a href="{!!url('admin/service/test/schedule/add')!!}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Jadwal Test</a>            
  <a href="{!!url('admin/service/test/'.$id.'/schedule/all')!!}" class="btn btn-danger"><i class="glyphicon glyphicon-th-list"></i> Semua Jadwal</a>
</div>


            <div class="col-md-2">
            </div>
            <!-- Form Pencarian -->
          <!--   <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'caribuku','role'=>'search'])  !!}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
                         </span>
                     </span>
                 </div>
                 {!! Form::close() !!}
            </div> -->
        </div>
        <br>
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="num text-center">No</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Tanggal</th>
                        <th>Sisa Kursis</th>
                        <th>Jam Mulai</th>                          
                        <th>Jam Selesai</th>
                        
                        <th>Action</th>
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($schedule as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td><?php echo ucwords($item->name);?></td><td><?php echo ucwords($item->level);?></td><td><?php echo date("D j M Y", strtotime($item->start)); ?></td><td>{{ $item->capacity }}</td><td><?php echo date("H:i", strtotime($item->start)); ?></td><td><?php echo date("H:i", strtotime($item->end)); ?></td>

                    <td class="text-center">                        
                            <a href="{{ url('admin/service/test/'.$item->lid.'/schedule/'.$item->sid.'/customer') }}" class="btn btn-info btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-user" aria-hidden="true"/></a>                            
                            
                            <a href="{{ url('admin/service/test/schedule/edit/'.$item->sid) }}" class="btn btn-success btn-xs" title="Print Absensi"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/customer/nota/delete', $item->lid],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
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