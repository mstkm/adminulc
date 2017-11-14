@extends('layouts.app')
@section('content')



<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
           @if (session('status'))
                  <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif   
       
            <div class="panel-heading">Form Tambah Peserta Kelas {{$kp}}</div>
            <div class="panel-body">
                <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/course/updatecustomer') }}">
                <div class="col-md-9">
               

            <div class="form-group">
                <label for="admin" class="col-md-6 control-label">Layanan</label>
                <div class="col-md-6">
                    <input type="" name="" class="form-control" value="{{$service->sname}}" readonly>
                </div>
            </div>
        

            <div class="form-group">
                <label for="admin" class="col-md-6 control-label">Pilih Level</label>
                <div class="col-md-6">
                    <input type="" name="" class="form-control" value="{{$service->lname}}" readonly>
                </div>
            </div>
            <input type="hidden" name="level_id" value="{{$service->id}}">

           

            <div class="form-group">
                <label for="admin" class="col-md-6 control-label">Daftar Peserta</label>
                <div class="col-md-6">
                   <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="customer">
@foreach($existcustomer as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td> {!! Form::open([
                            'method'=>'POST',
                            'url' => ['admin/course/delete/'.$item->lid.'/kelas/'.$item->kelas.'/customer/'.$item->nid],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Post" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="form-group">
                <label for="admin" class="col-md-6 control-label">Daftar Pesera</label>
                <div class="col-md-6">

                    <select id="selcust" class="form-control js-example-basic-multiple" multiple="multiple" required>
                    @foreach($newcustomer as $item)
                    <option value="{{$item->id}}" @if($item->bayar==='daftar') disabled @endif ><?php echo ucwords($item->name);?></option>
                    @endforeach
                    </select>
                </div>
            </div>
              
            <script type="text/javascript">
                $(".js-example-basic-multiple").select2(
                    {
                        placeholder: "Pilih Peserta!!"
                    });

            </script>
        <div class="form-group">
                <label for="admin" class="col-md-6 control-label"></label>
                <div class="col-md-6">
                   <table   class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="customer">
@foreach($newcustomer as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td> {{$item->phone1}}/{{$item->phone2}} </td>
                            <td> {{$item->bayar}} </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        <input type="hidden" name="level_id" value="{{$id}}">
        <input type="hidden" name="kp" value="{{$kp}}">

<div class="form-group">
    <div class="col-md- col-md-offset-6">
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