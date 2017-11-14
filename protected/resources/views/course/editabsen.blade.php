@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Daftar Kelas Yang Dibuka </h4><hr>
            <div class="col-md-6">
            
                <a href="{!!url('admin/course/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Kelas</a>               
            
            </div>
            
        </div>
        <br>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th>Bahasa</th>
                        <th>Level</th>  
                        <th>Jadwal</th>
                        <th>Pengajar</th>
                        <th>Ruang</th>                          
                        <th class="text-center">Action</th> 
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($service as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name); ?></td><td><?php echo ucwords($item->level); ?></td><td><?php echo ucwords($item->day); ?>, {{$item->start}}</td><td><?php echo ucwords($item->pengajar); ?></td><td><?php echo strtoupper($item->room); ?></td>

                    <td class="text-center">                        
                            <a href="{{ url('admin/course/'.$item->id.'/customer') }}" class="btn btn-info btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-user" aria-hidden="true"/></a> 
                            <a href="{{ url('admin/course/'.$item->lid.'/report') }}" class="btn btn-success btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-book" aria-hidden="true"/></a>                             
                            <a href="{{ url('admin/course/' . $item->id.'/print') }}" class="btn btn-warning btn-xs" title="Print Berita Acara dan Absensi"><span class="glyphicon glyphicon-print" aria-hidden="true"/></a>    
                             {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/course/delete', $item->id],
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