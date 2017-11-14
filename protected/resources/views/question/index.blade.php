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
                <a href="{!!url('admin/question/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Pertanyaan</a>
                @endif
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
                        <th >Pertanyaan</th>
                        <th>Tipe Layanan</th>
                        <th>Pertanyaan Untuk</th>
                        <th>Jenis Pertanyaan</th>
                        <!-- <th>Pendaftar</th>
                        <th>Daftars</th>
                        <th>Lunas</th>-->                                                
                        <th class="action text-center">Action</th> 
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($daftar as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td> <?php echo ucwords( $item->question ); ?></td><td>
                  
                    <?php echo ucwords($item->service_type ); ?>
                        
                    </td>
                    <td>
                  
                    <?php echo ucwords($item->question_for ); ?>
                        
                    </td>

                    <td>
                  
                    <?php echo ucwords($item->question_type ); ?>
                        
                    </td>

                    <td class="text-center">                        
                            <a href="{{ url('admin/question/'.$item->id.'/edit' ) }}" class="btn btn-info btn-xs" title="Lihat Data Pendaftar"><span class="glyphicon glyphicon-edit" aria-hidden="true"/></a>
                            
                   

                             {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/periode', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        <input type="hidden" name="daftar" value="{{$item->name}}">
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Level" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Yakin Hapus Level ini?")'
                            ));!!}
                        {!! Form::close() !!}
          
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
   
        </div>
      

@endsection