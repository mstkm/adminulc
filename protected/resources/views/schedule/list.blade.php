@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">

      <div class=row>
        <h4><i class="fa fa-book"></i> Daftar Jadwal Pilihan </h4><hr>


        <div class="col-md-6 btn-group" role="group" aria-label="...">
    

  <div class="btn-group" role="group">

    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span>
      Customer
      
    </button>
    <ul class="dropdown-menu">
        <li><a href="{!!url('admin/customer/course/add')!!}" > Kursus</a></li>
         <li><a href="{!!url('admin/customer/test/add')!!}" >Test</a></li>
    </ul>

  </div>    
    <a href="{!!url('admin/schedule/pick/add')!!}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Jadwal Pilihan</a>
</div>

 </div>       <br>

  <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="num text-center">No</th>
                        <th>Hari</th>                        
                        <th>Jam Mulai</th>                          
                        <th>Selesai</th>
                        <th class="action">Action</th>                        
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($schedule as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td>{{ $item->day }}</td><td><?php echo date('H:i',strtotime($item->start)); ?></td><td>
                   <?php echo date('H:i',strtotime($item->end)); ?><td>  <!-- <a href="{{ url('admin/service/test/schedule/edit/'.$item->sid) }}" class="btn btn-success btn-xs" title="Print Absensi"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> -->
                            {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/schedule/pick/delete/'. $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!} </td>
                  
                    
                  
                </tr>
            @endforeach
            
            </tbody>
        </table> 

    </div>
   
        </div>
      

@endsection