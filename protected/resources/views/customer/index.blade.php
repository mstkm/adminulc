@extends('layouts.app')
@section('content')
 
<div class="container">
      <div class=row>
        <h4><i class="fa fa-book"></i> Data PENDAFTAR </h4><hr>
    <div class=row>
       
            <div class="col-md-6">
                <a href="{!!url('/admin/customer/kursus/add')!!}" class="btn btn-primary"><i class="fa fa-btn fa-plus-circle"></i> Daftar Kursus</a>
                <a href="{!!url('/admin/customer/test/add')!!}" class="btn btn-primary"><i class="fa fa-btn fa-plus-circle"></i> Daftar Test</a>
                
            </div>
            <div class="col-md-2">
            </div>
            <!-- Form Pencarian -->
         
        </div><br>
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center num">No</th>
                        <th>ID</th>
                        <th class="name">Nama</th>
                        <th>Phone</th>                          
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        
                        <th class="action">Action</th>
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td>{{ $item->username }}</td><td><?php echo ucwords($item->name ) ?></td><td>{{ $item->phone1 }}/{{ $item->phone2 }}</td><td>
                    
                    {{ $item->email }}
                    
                    </td><td>{{$item->birthdate }}</td>
                    
                    
                    <td class="text-center"> 
                    
                            <a href="{{ url('/admin/customer/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>   <a href="{{ url('/admin/customer/edit/'.$item->id) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span></a>                         
             
                     
                        @if(Auth::user()->admin=='admin'||Auth::user()->admin=='direktur'||Auth::user()->admin=='kepala')
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/customer/nota/delete', $item->idn],
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