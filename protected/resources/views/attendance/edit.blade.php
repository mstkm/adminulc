@extends('layouts.app')
@section('content')



<d<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Form Buka Kelas</div>
            <div class="panel-body">
                <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/course/store') }}">
                 <div class="row">  <div class="col-md-9">
                  @if (session('status'))
                  <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif   
                <h4><i class="glyphicon glyphicon-exclamation-sign"></i> Daftar Kelas yang Direkomendasikan!! </h4></div>
            </div><br>
            <div class="form-group">
                @foreach($suggest as $item)   
                <div class="col-md-2">
                    <div class="col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{$item->day}}</div>
                            <div class="panel-body">{{$item->start}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Layanan</label>
                <div class="col-md-6">
                    <input type="" name="" class="form-control" value="{{$service->sname}}" readonly>
                </div>
            </div>
        

            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                <div class="col-md-6">
                    <input type="" name="" class="form-control" value="{{$service->lname}}" readonly>
                </div>
            </div>
            <input type="hidden" name="level_id" value="{{$service->id}}">

           

            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Daftar Peserta</label>
                <div class="col-md-6">
                   <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="customer">
@foreach($customer as $item)
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


        <script>
            $(document).ready(function(){
                $("#btnaddjadwal").click(function(){
                    $("#jadwal").clone().appendTo("#clnjdwl");
                });
            });
        </script>

        <div class="form-group" id="jadwal">
            <label for="name" class="col-md-4 control-label">Masukkan Jadwal </label>                                 
            <div class="col-sm-2">                        
                <select name="day[]" class="form-control" required>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="time" class="form-control" name="start[]">
            </div>
            <div class="col-sm-2">
                <input type="time" class="form-control" name="end[]" >
            </div>                       

        </div>
        <div id="clnjdwl"> </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label"></label>                                 
            <div class="col-sm-2">  
                <button id="btnaddjadwal" class="btn add-more" type="button">+</button>

                <button id="btnmin" class="btn btn-danger" type="button">-</button>
            </div>
        </div>


        <script>
            $(document).ready(function(){
                $("#btnaddpengajar").click(function(){
                    $("#pengajar").clone().appendTo("#clnpengajar");
                });
            });
        </script>

        <div class="form-group" id="pengajar">
            <label for="name" class="col-md-4 control-label">Pilih Pengajar </label>                                 
            <div class="col-sm-6">                        
               <select class="form-control " id="field1" name="pengajar[]" required>   
                <option value="0">---------Pilih Pengajar----------------</option>
                @foreach($user as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>                       

    </div>
    <div id="clnpengajar"> </div>
    <div class="form-group">
        <label for="name" class="col-md-4 control-label"></label>                                 
        <div class="col-sm-2">  
            <button id="btnaddpengajar" class="btn add-more" type="button">+</button>

            <button id="btnminpengajar" class="btn btn-danger" type="button">-</button>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#btnaddroom").click(function(){
                $("#room").clone().appendTo("#clnroom");
            });
        });
    </script>

    <div class="form-group" id="room">
        <label for="name" class="col-md-4 control-label">Pilih Pengajar </label>                                 
        <div class="col-sm-6">                        
           <select class="form-control " id="field1" name="room[]" >   
            <option value="0">---------Pilih Ruang----------------</option>
            @foreach($room as $item)                             
            <option value="{!!$item->id!!}">{!!$item->name!!}</option>
            @endforeach                     
        </select>
    </div>                       

</div>
<div id="clnroom"> </div>
<div class="form-group">
    <label for="name" class="col-md-4 control-label"></label>                                 
    <div class="col-sm-2">  
        <button id="btnaddroom" class="btn add-more" type="button">+</button>

        <button id="btnminroom" class="btn btn-danger" type="button">-</button>
    </div>
</div>

<div class="form-group">                        
    <label for="id" class="col-md-4 control-label">Jumlah Pertemuan</label>
    <div class="col-md-6">

        <input type="text" class="form-control" name="pertemuan" required>                               

    </div>
</div>
<div class="form-group" id="pengajar">
            <label for="name" class="col-md-4 control-label">Pilih Pengajar </label>                                 
            <div class="col-sm-6">                        
               <select class="form-control " id="field1" name="kelas" >   
                <option value="0">---------Pilih Kelas----------------</option>
                                            
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
                <option value="K">K</option>
                <option value="L">L</option>
                <option value="M">M</option>
                <option value="N">N</option>
                <option value="O">O</option>
                <option value="P">P</option>
                <option value="Q">Q</option>
                <option value="R">R</option>
                <option value="S">S</option>
                <option value="T">T</option>
                <option value="U">U</option>
                <option value="V">V</option>
                <option value="W">W</option>
                <option value="X">X</option>
                <option value="Y">Y</option>
                <option value="Z">Z</option>
            </select>
        </div>                       
        
    </div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary" >
            Save</button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>


@endsection