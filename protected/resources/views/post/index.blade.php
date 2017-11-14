@extends('layouts.app')
@section('content')

<div class="section">
       
        <h1>Post <a href="{{ url('/admin/post/add') }}" class="btn btn-primary btn-xs" title="Add New Post"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
        <table class="table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th>No</th><th> Judul </th><th> Isi </th><th> Penulis </th><th> Action </th>
                  </tr>
              </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($datas as $data)
                {{-- */$x++;/* --}}
                <tr>
                    <td style="text-align:center;">{{ $x }}</td><td>{!!substr($data->judul,0,46)!!}..</td><td>{!!substr($data->isi,0,80)!!}..</td><td style="text-align:center;">{!!($data->name)!!}</td>
                    <td style="text-align:center;">
                        <a href="{{ url('/news/' . $data->slug_judul) }}" class="btn btn-success btn-xs" title="View Post" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        
                                 @if(Auth::user()->name==$data->name||Auth::user()->admin=='dosen')   
                                 
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
                     
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <div class="pagination-wrapper"> {!! $datas->render() !!} </div>
    </div>
  </div>

</div>






@endsection