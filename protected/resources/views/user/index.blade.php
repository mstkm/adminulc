@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
</script> 
<div class="container">
    <div class="row">     

       <div class=" col-md-offset-1">        
       <h1>Staff <a href="{{ url('/admin/user/add') }}" class="btn btn-primary btn-xs" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="num">S.No</th><th> Nama </th><th> Birthdate </th><th> Jabatan </th><th> Email </th><th> Status </th><th> Delete </th>
                </tr>
            </thead>
            <tbody>
                {{-- */$x=0;/* --}}
     
                @foreach($user as $item)

                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{ $item->name }}</td><td>{{ $item->birthdate }}</td><td>{{ $item->admin }}</td><td>{{ $item->email }}</td><td style="text-align:center;">                       
                    @if($item->status=='blocked')                         
                    <a href="user/{{$item->id}}/status" class="btn btn-danger btn-xs"  title="aktivkan">Tidak Aktif</a> 
                    @else
                    <a href="user/{{$item->id}}/status" class="btn btn-primary btn-xs" title="nonaktivkan">Aktif</a> 
                    @endif

                </td>
                <td style="text-align:center;">
                <a href="{{ url('/admin/user/' . $item->username.'/profile') }}" class="btn btn-primary btn-xs" title="Lihat Data Customer" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a> 
                    <a href="{{ url('/admin/user/edit/' . $item->id) }}" class="btn btn-info btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>                        
                    {!! Form::open([
                    'method'=>'POST',
                    'url' => ['/admin/user/delete', $item->id],
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