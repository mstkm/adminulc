@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Data Pendaftar Kursus Bahasa </h4><hr>
            <div class="col-md-6">

                <a href="{!!url('admin/periode/add')!!}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Periode</a>
               
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
                        <th class="name">Tahun</th>
                        <th>Triwulan</th>
                         <th>Status</th>  
                        <th class="text-center action">Action</th> 
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($all as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td> <?php echo ucwords( $item->year ); ?></td><td><?php echo ucwords( $item->quarter ); ?></td>
                    </td><td style="width: 10px;" class="text-center">                       
                    @if($item->status=='0')                         
                    <a href="{{url('admin/periode/'.$item->id.'/activation')}}" class="btn btn-danger btn-xs"  title="aktivkan">Tidak Aktif</a> 
                    @else
                    <a href="{{url('admin/periode/'.$item->id.'/activation')}}" class="btn btn-primary btn-xs" title="nonaktivkan">Aktif</a> 
                    @endif

                </td>

                    <td class="text-center">                        
                            <a href="{{ url('admin/periode/'.$item->id.'/edit' ) }}" class="btn btn-info btn-xs" title="Lihat Laporan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>


                          

                             {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/periode/delete', $item->id],
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
                       
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
   
        </div>
      

@endsection