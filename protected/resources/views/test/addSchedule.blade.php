

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Kursus</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/service/test/schedule/store') }}">                    

                                       
            

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Layanan</label>
                            <div class="col-md-6" id="pilkursus" >
                             <select id="service" name="service_id" class="form-control" >   
                             <option value="0"></option>
                             @foreach($service as $item)
                             <option value="{!!$item->id!!}"> {!!$item->name!!} </option>
                            @endforeach                     
                            </select>                           
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#service').on('change', function(e){
                                    var id = e.target.value;
                                    $.get('{{ url('level')}}/'+id, function(data){
                                        console.log(id);
                                        console.log(data);
                                        $('#level').empty();
                                        $.each(data, function(index, element){
                                            $('#level').append("<option value="+element.id+" >"+element.name+"</option>");
                                        });
                                    });
                                });
                            });
                        </script>


                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                            <div class="col-md-6">
                            <input type="hidden" name="tipe" value="test">
                             <select id="level" name="level_id" class="form-control" >   
                             <option value="">              </option>

                                         
                                </select>  

                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Ruang</label>
                            <div class="col-md-6">
                            <input type="hidden" name="tipe" value="test">
                             <select id="admin" name="level_id" class="form-control" >   

                             @foreach($room as $item)                             
                                    <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                            @endforeach                     
                                </select>  

                            
                            </div>
                        </div>
                     
                         <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Tgl Test</label>
                            <div class="col-md-6">                            
                               <input  type="date" class="form-control" name="date" required></div>
                        </div> 
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Jam  </label>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="start" >                             
                                
                            </div>
                            <div class="col-md-2">
                            <input type="time" class="form-control" name="end" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label"> Kapasitas  </label>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="capacity" >                                
                            </div>                           
                        </div>
                        
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