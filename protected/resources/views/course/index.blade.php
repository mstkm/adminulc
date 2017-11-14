@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Daftar Kelas Yang Dibuka </h4><hr>
         @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
            <div class="col-md-6">
            @if(Auth::user()->admin=='admin'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur')
                <a href="{!!url('admin/course/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Kelas</a>   @endif            
            </div>

            
            <div class="col-md-4 pull-right navbar-right">

            {!! Form::open(['method'=>'GET','url'=>'admin/course/periode','role'=>'search'])  !!}
            <div class="col-md-9">
            <select id="service" name="periode" class="form-control" >   
            <option value="0">------Pilih Periode--------</option>
            @foreach($periode as $item)
            <option value="{!!$item->id!!}" >{!!$item->year!!} Periode {!!$item->quarter!!}</option>
            @endforeach         
            </select>                                         
            </div>


            
            <button type="submit" class="fa-btn btn btn-primary"> Muat </button>
            
            {!! Form::close() !!} 
            
            </div>
            
        </div>
        <br>
       
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">No</th>
                        <th>Bahasa</th>
                        <th>Level</th> 
                        <th>Kelas</th>  
                        <th>Jadwal</th>
                        <th>Pengajar</th>
                        <th>Ruang</th>                          
                        <th class="text-center">Action</th> 
                    </tr>
            </thead>
            <tbody>
            {{-- */$lid='';/* --}}
                    {{-- */$kp='';/* --}}
            {{-- */$x=0;/* --}}
            @foreach($service as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name); ?></td><td><?php echo ucwords($item->level); ?><td><?php echo ucwords($item->kelas); ?></td><td><?php echo date('D, j M Y H : i  ',strtotime($item->start)); ?></td><td><?php echo ucwords($item->pengajar); ?></td><td><?php echo strtoupper($item->room); ?></td>
                    <td class="text-center">              
                            <a href="{{ url('admin/course/'.$item->lid.'/class/'.$item->kelas.'/schedule/'.$item->id) }}" class="btn btn-info btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-user" aria-hidden="true"/></a> 
                            @if(Auth::user()->admin=='admin'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur')
                            <a href="{{ url('admin/course/'.$item->lid.'/report/kelas/'.$item->kelas.'/periode/'.$item->periode_id) }}" class="btn btn-success btn-xs" title="Lihat Data Customer">
                            <span class="glyphicon glyphicon-book" aria-hidden="true"/></a>
                            
                             {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/course/delete', $item->lid,'class',$item->kelas],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
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