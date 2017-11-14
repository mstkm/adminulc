@extends('layouts.app')
@section('content')

<div class="section">
       

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Ruang </h4><hr>


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
                        <th class="num text-center">No</th>
                        
                        <th class="name">Nama Ruang</th>
                        <th>Kapasitas Ruang</th>                       
                        
                        
                        <th class="action text-center">Action</th>
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($room as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name) ?></td><td>{{ $item->capacity }}</td>
                  
                    <td class="text-center">                        
                            <a href="{{ url('/admin/room/schedule/' . $item->id) }}" class="btn btn-primary btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-time" aria-hidden="true"/></a> 

                            @if(Auth::user()->admin=='staff'||Auth::user()->admin=='dosen')                     
                            @else
                            <a href="{{ url('admin/room/'.$item->id.'/edit' ) }}" class="btn btn-warning btn-xs" title="Lihat Data Pendaftar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                            {!! Form::open([
                            'method'=>'POST',
                            'url' => ['admin/room/delete', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Kelas',
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

</div>






@endsection