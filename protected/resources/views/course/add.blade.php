@extends('layouts.app')
@section('content')



<div class="container">
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



            



           
            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Pilih Customer</label>
                <div class="col-md-6">
                    <select id="selcust" class="form-control js-example-basic-multiple" multiple="multiple" name="customer[]" required>
              
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
                    $('#customer').empty();
                    $('#selcust').empty();
                    $.each(data, function(index, element)
                    {
                        $('#customer').append("<tr><td>"+element.name.toUpperCase()+"</td><td>"+element.phone1+"/"+element.phone2+"</td><td>"+element.bayar+"</td>");


                        
                        if (element.bayar=='daftar') {
                            $('#selcust').append("<option disabled value="+element.id+" >"+element.name.toUpperCase()+" Belum Lunas</option>");
                        }
                        else
                        {
                            $('#selcust').append("<option value="+element.id+" >"+element.name.toUpperCase()+"</option>");

                        }

                                  
                                });
                            });
                        });
                    });
            </script>


            <script type="text/javascript">
                $(".js-example-basic-multiple").select2(
                    {
                        placeholder: "Pilih Peserta!!"
                    });

            </script>
        <div class="form-group">
                <label for="admin" class="col-md-4 control-label"></label>
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


                    </tbody>
                </table>
            </div>
        </div>



 <div class="form-group">
            <label for="admin" class="col-md-4 control-label">Jadwal Yang direkomendasikan</label>
            <div class="col-md-6">
                  
       <!-- @foreach($schedule as $item) 
                <div class="panel panel-default col-sm-4" id="recomend">
            <div class="panel-heading">
                        {{$item->day}} - <?php echo date('H:i',strtotime($item->start)); ?>
                
                </div>
                </div>
                
                @endforeach -->
<div id="recomend" ></div>
               
                
            </div>
            </div>


             <script type="text/javascript">


                $(document).ready(function(){
                    $('#level').on('change', function(e){
                    var id = e.target.value;
                    $.get('{{ url('pick')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#recomend').empty();
                    $.each(data, function(index, element)
                    {
                        var time=new Date(Date.parse(element.start));
                        var h= time.getHours();
                        var m=time.getMinutes()

                        if(h<10)h='0'+h;
                        if(m<10)m='0'+m;

                        var tm=h+':'+m;

                        $('#recomend').append('<div class="btn btn-primary col-sm-4" style="font-size=8pt;"><span class="badge">'+element.day+' - '+tm+' '+element.tot+'</span></div>');
                                });

                            });
                        });
                    });
            </script>



        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Masukkan Jadwal Minggu Pertama </label>                                 
 <div class="col-md-6">


 <div class="btn-group" role="group" aria-label="...">
    

  <div style="width: 40%"  class="btn-group btn-group-sm" role="group">

    <input name="jadwal[]" class="timepicker form-control" type="text" required>
  
  </div>

   <div style="width: 30%"  class="num btn-group btn-group-sm">                        
               <select class="form-control"  name="pengajar[]" required="">   
                <option value="" disabled selected>Pengajar</option>
                @foreach($user as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>
 
  <div style="width: 30%"  class="num btn-group btn-group-sm">                        
               <select class="form-control" name="room[]" required>   
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

    <input name="jadwal[]" class="timepicker form-control" type="text" required>
  
  </div>

   <div style="width: 30%"  class="num btn-group btn-group-sm">                        
               <select class="form-control"  name="pengajar[]">   
                <option value="" disabled selected>Pengajar</option>
                @foreach($user as $item)                             
                <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                @endforeach                     
            </select>
        </div>
 
  <div style="width: 30%"  class="num btn-group btn-group-sm">                        
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