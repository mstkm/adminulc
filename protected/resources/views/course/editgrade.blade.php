@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Input Nilai Kelas {{$kp}}</div>
                <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/admin/course/grade/store') }}">
                    <input type="hidden" name="kp" value="{{$kp}}">
                    <input type="hidden" name="id" value="{{$id}}">

                     @foreach($customer as $item)

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label"> <?php echo ucwords($item->name);?></label>
                            <div class="col-md-6">                           
                            <input type="hidden" name="notaid[]" value="{{$item->id}}">
                                <input id="name" type="text" class="form-control"  name="nilai[]" value="{{$item->grade}}" 
                             

                                
                          >
                          
                        </div>
                        </div>
                    @endforeach
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Simpan</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-danger" data-toggle="tooltip" data-placement="left"><span aria-hidden="true"/>Batal</a> 
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
