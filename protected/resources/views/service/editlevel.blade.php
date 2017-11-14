

@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Toefl</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('admin/service/level/update') }}">  
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                            <input type="hidden" name="id" value="{{$tampiledit->id}}">
                                <input id="name" type="text" class="form-control" name="name" value="{{$tampiledit->name}}" value="{{ old('name') }}"  required>                             
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Harga Daftar  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control"  value="{{$tampiledit->harga_daftar}}"  value="{{ old('daftar') }}" name="daftar" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Harga Ubaya  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{$tampiledit->harga_ubaya}}" value="{{ old('ubaya') }}" name="ubaya"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Harga Umum  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{$tampiledit->harga_umum}}" value="{{ old('umum') }}"  name="umum"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Min Kelas dibuka  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{$tampiledit->minimal_customer}}" value="{{ old('min') }}"  name="min"  required>
                                </div>
                            </div>
                        


                        <input type="hidden" name="bayar" value="lunas">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                       
@endsection