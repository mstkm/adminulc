@extends('layouts.app')
@section('content')



<d<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Form Buka Kelas</div>
            <div class="panel-body">
                <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/course/store') }}">
                 <div class="row">  
                  @if (session('status'))
                  <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif   
            </div>
  
            

            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Pilih Layanan</label>
                <div class="col-md-6">
                    <select id="service" name="service" class="form-control" required>   
                            <option value="" disabled selected>---------Pilih Layanan----------------</option>
                        @foreach($service as $item)                             
                        <option value="{!!$item->id!!}"><?php echo ucwords($item->name); ?></option>
                        @endforeach                     
                    </select> 
                </div>
            </div>
      

            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                <div class="col-md-6">
                    <select id="level" name="level" class="form-control" required>   
                        <option value="" disabled selected>---------Pilih Level------------</option>            
                    </select> 
                </div>
            </div>



            <script type="text/javascript">
                $(document).ready(function(){
                    $('#level').on('change', function(e){
                    var id = e.target.value;
                    $.get('{{ url('customer')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);

                    $(document).ready(function() {
                        $('#customer').dataTable(
                            {
                                dom: 'Bfrtip',
                                buttons: [],
                                pageLength: 20
                            });
                    });


                    $.each(data, function(index, element)
                    {
                        if (element.bayar=='daftar') {
                            $('#customer').dataTable().fnAddData([element.name,element.phone1+'/'+element.phone2,'<input type="checkbox" name="customer[]" disabled value="'+element.id+'">daftar']); 
                        }
                        else
                        {
                           $('#customer').dataTable().fnAddData([element.name,element.phone1+'/'+element.phone2,'<input type="checkbox" name="customer[]" value="'+element.id+'">'+'lunas']);  
                        }

                                  
                                });

                            });
                        });
                    });
            </script>



            <div class="form-group">
            <label for="admin" class="col-md-4 control-label">Jadwal Yang direkomendasikan</label>
            <div class="col-md-6">
                  
                 <div class="col-sm-3">
                <div class="form-control">
                            wefwe
                </div>
                </div>
                
            </div>
            </div>

            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Pilih Customer</label>
                <div class="col-md-6">
                   <table  id="customer" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status Bayar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>






        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Masukkan Jadwal </label>                                 
 <div class="col-md-6">


 <div class="btn-group" role="group" aria-label="...">
    

  <div style="width: 40%"  class="btn-group btn-group-sm" role="group">

    <input name="jadwal[]" class="timepicker form-control" type="text">
  
  </div>

   <div style="width: 30%"  class="btn-group btn-group-sm">                        
               <select class="form-control"  name="pengajar[]">   
                <option value="" disabled selected>Pengajar</option>
                @foreach($user as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>
 
  <div style="width: 30%"  class="btn-group btn-group-sm">                        
               <select class="form-control" name="room[]">   
                <option value="" disabled selected>Ruang</option>
                @foreach($room as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>
</div>


        </div>
        </div>

        <div class="form-group" id="jadwal">
            <label for="name" class="col-md-4 control-label"></label>                                 
 <div class="col-md-6">


 <div class="btn-group" role="group" aria-label="...">
    

  <div style="width: 40%"  class="btn-group btn-group-sm" role="group">

    <input name="jadwal[]" class="timepicker form-control" type="text">
  
  </div>

   <div style="width: 30%"  class="btn-group btn-group-sm">                        
               <select class="form-control"  name="pengajar[]">   
                <option value="" disabled selected>Pengajar</option>
                @foreach($user as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>
 
  <div style="width: 30%"  class="btn-group btn-group-sm">                        
               <select class="form-control" name="room[]">   
                <option value="" disabled selected>Ruang</option>
                @foreach($room as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>
</div>


        </div></div>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>                   

      <script>
            $(document).ready(function(){
                $("#btnaddjadwal").click(function(){
                $("#jadwal").clone().appendTo("#clnjdwl"); 
                $('.timepicker').datetimepicker({

                    format: 'DD-MM-YYYY HH:mm'

                });                  
                });
            });
        </script>   
<script type="text/javascript">

    $('.timepicker').datetimepicker({

        format: 'DD-MM-YYYY HH:mm'

    }); 



</script> 
        
        <div id="clnjdwl"> 
        </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label"></label>                                 
            <div class="col-sm-2">  
                <button id="btnaddjadwal" class="btn add-more" type="button">+</button>

                <button id="btnminjadwal" class="btn btn-danger" type="button">-</button>
            </div>
        </div>



<div class="form-group">                        
    <label for="id" class="col-md-4 control-label">Jumlah Pertemuan</label>
    <div class="col-md-6">

        <input type="text" class="form-control" name="pertemuan" placeholder="14" required>                               

    </div>
</div>
<div class="form-group">                        
    <label for="id" class="col-md-4 control-label">Durasi Pertemuan</label>
    <div class="col-md-6">
<div class="input-group">
        <input type="text" class="form-control" name="durasi" placeholder="100" required  placeholder="Recipient's username" aria-describedby="basic-addon2">  
         <span class="input-group-addon" id="basic-addon2">Menit</span>                            
</div>
    </div>
</div>



<script type="text/javascript">
    $('.minutepicker').datetimepicker({

            format: 'mm'

        }); 
</script>
<div class="form-group" id="pengajar">
            <label for="name" class="col-md-4 control-label">Pilih Kelas</label>                                 
            <div class="col-sm-6">                        
               <select class="form-control " id="field1" name="kelas" >   
                <option value="" disabled selected>---------Pilih Kelas----------------</option>
                                            
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