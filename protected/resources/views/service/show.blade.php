@extends('layouts.app')
@section('content')

<div class="section">
       
        <h1>Layanan <a href="{{ url('/admin/service/add') }}" class="btn btn-primary btn-xs" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
        <table class="table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th>No</th><th> Layanan </th><th> Level </th><th style="text-align: center;"> Action </th>
                  </tr>
              </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($datas as $data)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{$data->nama}}</td><td>{{$data->level}}</td>
                    <td style="text-align: center;">
                    <a href="{{ url('/admin/post/edit/' . $data->id) }}" class="btn btn-primary btn-xs" title="Tambah Level"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>                        
                    <a href="{{ url('/admin/post/edit/' . $data->id) }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>                        
                        {!! Form::open([
                            'method'=>'POST',
                            'url' => ['admin/post/delete', $data->id],
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

</div>






@endsection