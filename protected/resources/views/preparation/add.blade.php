

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Toefl</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/customer/store') }}">                    

                        <div class="form-group">                        
                            <label for="id" class="col-md-4 control-label">ID</label>
                            <div class="col-md-6">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="username" placeholder="12345678">
                                <span class="input-group-btn">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">load</button>
                                    </span>
                                 </span>
                             </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">                             
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
            

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Test</label>
                            <div class="col-md-6">
                            <select name="service_id" class="form-control" >   
                             @foreach($service as $item)                             
                                    <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                            @endforeach                     
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                            <div class="col-md-6">
                            <select name="level_id" class="form-control" >   
                             @foreach($level as $item)                             
                                    <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                            @endforeach                     
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Tanggal Test</label>
                            <div class="col-md-6">
                            <select name="schedule_id" class="form-control" >   
                             @foreach($date as $item)                             
                                    <option value="{!!$item->sid!!}">{!!$item->tgl!!} <span class="badge">{!!$item->capacity!!}</span></option>
                            @endforeach                     
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