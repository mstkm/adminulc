@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Pendaftar Kursus Bahasa </h4><hr>
            
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
 @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')                     @else
                <a href="{!!url('admin/service/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Layanan</a>
                <a href="{!!url('admin/service/level/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Level</a>
                @endif                     
</div>


<div class="pull-right navbar-right col-md-4">
            <div class=" btn-group " role="group" aria-label="...">
    

  <div class="btn-group" role="group">

 
 <a href="{!!url('admin/service/level/add')!!}" class="btn btn-success"><span class="fa fa-btn badge">{{$daftar}}</span>Daftar</a>
                <a href="{!!url('admin/service/level/add')!!}" class="btn btn-info"><span class="fa fa-btn badge">{{$lunas}}</span>Kursus/Lunas</a>
                <a href="{!!url('admin/service/level/add')!!}" class="btn btn-danger"><span class="fa fa-btn badge">{{$retur}}</span>Retur</a>                    
</div>


</div>
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
                        <th class="text-center num">No</th>
                        <th class="name">Bahasa</th>
                        <th>Level</th>
                        <!-- <th>Pendaftar</th>
                        <th>Daftars</th>
                        <th>Lunas</th>-->                                                
                        <th class="action text-center">Action</th> 
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($service as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td> <?php echo ucwords( $item->sname ); ?></td><td>
                  
                    <?php echo ucwords($item->lname ); ?>
                        
                    </td>

                    <td class="text-center">                        
                            <a href="{{ url('admin/service/level/'.$item->lid.'/customer/' ) }}" class="btn btn-info btn-xs" title="Lihat Data Pendaftar"><span class="glyphicon glyphicon-user" aria-hidden="true"/></a>
                            
                            @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')                     
                            @else                                          
                            
 <a href="{{ url('admin/service/level/'.$item->lid.'/edit' ) }}" class="btn btn-warning btn-xs" title="Lihat Data Pendaftar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                            @if($item->lid==null)
                            {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/service/delete', $item->sid],
                            'style' => 'display:inline'
                        ]) !!}
                        <input type="hidden" name="service" value="{{$item->name}}">
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Level" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Yakin Hapus Bahasa ini?")'
                            ));!!}
                        {!! Form::close() !!}
                            @else

                             {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/service/level/delete', $item->lid],
                            'style' => 'display:inline'
                        ]) !!}
                        <input type="hidden" name="service" value="{{$item->name}}">
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Level" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Yakin Hapus Level ini?")'
                            ));!!}
                        {!! Form::close() !!}
                        @endif
                    @endif
                       
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
   
        </div>
      

@endsection