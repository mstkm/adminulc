@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Test</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/customer/store') }}">      
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
<div id="cust-status"></div>
                        <div class="form-group">                        
                            <label for="id" class="col-md-4 control-label">ID/NRP</label>
                                <div class="col-md-6">
                                 <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="username" id="username" placeholder="12345678" value="{{ old('username') }}">
                                <span class="input-group-btn">
                                    <span class="input-group-btn">
                                        <span id="btnload" class="btn btn-primary">load</span>
                                    </span>
                                 </span>
                             </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>                             
                            </div>
                        </div>
                        

                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Asal</label>
                            <div class="col-md-6">                            
                                <select id="admin" name="asal" class="form-control" >   
                                    <option value="ubaya">UBAYA</option>                          
                                    <option value="umum">UMUM</option>
                                </select>                                
                            </div>
                        </div>                  
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Test</label>
                            <div class="col-md-6">
                            <select id="service" name="service_id" class="form-control" >   
                            <option value="0">---------Pilih Test----------------</option>
                             @foreach($service as $item)                             
                                    <option value="{!!$item->id!!}"><?php echo ucwords($item->name); ?></option>
                            @endforeach                     
                                </select> 
                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                            <div class="col-md-6">
                            <select id="level" name="level" class="form-control" >   
                            <option value="0">---------Pilih Level------------</option>
                                              
                                </select> 
                            </div>
                        </div>

                          <script type="text/javascript">
                            $(document).ready(function(){
                                $('#level').on('change', function(e){
                                    var id = e.target.value;
                                    $.get('{{ url('date')}}/'+id, function(data){
                                        console.log(id);
                                        console.log(data);
                                        //$('#schedule').empty();
                                        $.each(data, function(index, element){
                                            $('#schedule').append("<option value="+element.id+" >"+element.start+" sisa "+ element.capacity +" Kursi</option>");
                                        });
                                    });
                                });
                            });
                        </script>
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Tanggal Test</label>
                            <div class="col-md-6">
                            <select id="schedule" name="schedule" class="form-control" >   
                                <option value="0">---------Pilih Tanggal----------------</option>

                                             
                                </select> 
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