@extends('layouts.app')

@section('content')

<script type="text/javascript"> 
    $(":file").filestyle({input: false});
    
    </script> 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">
                
                @if(Auth::user()->admin=='dosen')
                <div class="panel-heading">Profil Dosen
                  @else                   
                <div class="panel-heading">Profil Admin/Tutor
                  @endif
                                            <a href="{{ url('/admin/edit', Auth::user()->id) }}" class="fa-btn navbar-right">Edit Profile</a>          
                    <div class="panel-body ">
                        <strong>
                            <img src="{{ asset('images/users/'.Auth::user()->photo) }}" class="img-circle center-block" alt="Cinque Terre" width="154" height="154"></br>                            
                    <p style="text-align:center;">{{Auth::user()->name}}</p>
                    <p style="text-align:center;">{{Auth::user()->username}}</p>
                    <p style="text-align:center;">{{Auth::user()->email}}</p>
                    </div> 
                    </div>
                </div>
            </div>
            </div> 
        
         @if(Auth::user()->admin!='staff') 

    <div class="col-md-10 col-md-offset-1">        
        <h1>Admin/Tutor <a href="{{ url('/admin/add') }}" class="btn btn-primary btn-xs" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nama </th><th> Username </th><th> Jabatan </th><th> Email </th><th> Delete </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @if(Auth::user()->admin=='dosen') 
            @foreach($staff as $item)
            
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{ $item->name }}</td><td>{{ $item->username }}</td><td>{{ $item->admin }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/admin/edit/' . $item->id) }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>                        
                         {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/delete', $item->id],
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
            @elseif(Auth::user()->admin=='direktur'||Auth::user()->admin=='kepala') 
            @foreach($dosen as $item)
            
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{ $item->name }}</td><td>{{ $item->username }}</td><td>{{ $item->admin }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/admin/edit/' . $item->id) }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>                        
                         {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/delete', $item->id],
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
            @else
            @foreach($all as $item)
            
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{ $item->name }}</td><td>{{ $item->username }}</td><td>{{ $item->admin }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/admin/edit/' . $item->id) }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>                        
                         {!! Form::open([
                            'method'=>'POST',
                            'url' => ['/admin/delete', $item->id],
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
           
            @endif
            </tbody>
        </table>

    </div>
    @endif
        </div>
      

@endsection