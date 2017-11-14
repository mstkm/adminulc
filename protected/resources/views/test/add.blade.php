

@extends('layouts.app')
@section('content')



<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Form Registrasi Kursus</div>
            <div class="panel-body">
                <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/service/test/schedule/store') }}">                    


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
                        <label for="admin" class="col-md-4 control-label">Pilih Layanan</label>
                        <div class="col-md-6" id="pilkursus" >
                           <select id="service" name="service_id" class="form-control" >   
                               <option value="" selected disabled>---------Pilih Test----------------</option>
                               @foreach($service as $item)
                               <option value="{!!$item->id!!}"> <?php echo strtoupper($item->name); ?> </option>
                               @endforeach                     
                           </select>                           
                       </div>
                   </div>



                   <div class="form-group">
                    <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                    <div class="col-md-6">                            
                       <select id="level" name="level_id" class="form-control" >   
                        <option value="" selected disabled>---------Pilih Level------------</option>                                        
                    </select>  


                </div>
            </div>





            <div class="form-group">
                <label for="admin" class="col-md-4 control-label">Pilih Ruang</label>
                <div class="col-md-6">
                   <select id="admin" name="room_id" class="form-control" >   
                    <option value="" selected disabled>---------Pilih Ruang------------</option>
                    @foreach($room as $item)                             
                    <option value="{!!$item->id!!}"><?php echo strtoupper($item->name); ?></option>
                    @endforeach                     
                </select>
                </div>
        </div>


        <div class="form-group">                        
            <label for="id" class="col-md-4 control-label"> Masukkan Jadwal</label>
            <div class="col-md-6">
                <input name="jadwal" class="timepicker form-control" type="text">

            </div>
        </div> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>                      
        <script type="text/javascript">

            $('.timepicker').datetimepicker({

                format: 'DD-MM-YYYY HH:mm:ss'

            }); 



        </script>
        <div class="form-group">                        
        <label for="id" class="col-md-4 control-label">Durasi</label>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="durasi" placeholder="100" required  placeholder="Recipient's username" aria-describedby="basic-addon2">  
                    <span class="input-group-addon" id="basic-addon2">Menit</span>                            
                </div>
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