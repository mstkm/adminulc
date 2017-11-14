@extends('layouts.app')
@section('content')

<div class="section">
       
        <h1>Product <a href="{{ url('/admin/product/add') }}" class="btn btn-primary btn-xs" title="Add New product">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
        <table class="table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th>No</th><th> Nama Kursus </th><th> Keterangan </th><th> Diperbarui Oleh </th><th> Action </th>
                  </tr>
              </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($datas as $data)
                {{-- */$x++;/* --}}
                <tr>
                    <td style="text-align:center;">{{ $x }}</td><td>{!!substr($data->nama,0,36)!!}..</td><td>{!!substr($data->keterangan,0,80)!!}..</td><td style="text-align:center;">{!!$data->name!!}</td>
                    <td style="text-align:center;">
                        <a href="{{ url('/services/' . $data->slug_nama) }}" class="btn btn-success btn-xs" title="View product" target="_blank">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/product/edit/' . $data->id) }}" class="btn btn-primary btn-xs" title="Edit product"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>                        
                        {!! Form::open([
                            'method'=>'product',
                            'url' => ['admin/product/delete', $data->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete product" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete product',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                     

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <div class="pagination-wrapper">  </div>
    </div>
  </div>

</div>






@endsection