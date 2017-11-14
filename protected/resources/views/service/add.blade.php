@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Layanan</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/service/store') }}">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif
                        <div class="form-group">   

                                    <input id="name" type="hidden" class="form-control" name="user_id" value=" {{Auth::user()->id}}">                             
                            
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nama Bahasa/Preparation/Test</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Keterangan  </label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="description" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Jenis Service</label>
                            <div class="col-md-6">
                                <select id="admin" name="type" class="form-control" > 
                                    <option value="language">Kursus Bahasa</option>
                                    <option value="preparation">Preparation</option>
                                    <option value="test">Test</option>
                                    </select>
                            </div>
                        </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection