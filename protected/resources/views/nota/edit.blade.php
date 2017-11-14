

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Registrasi Toefl</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('admin/customer/nota/schedule/update',$tampiledit->nid) }}">                    

                        <div class="form-group" >
                            <label for="id" class="col-md-4 control-label">ID</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" value="{{$tampiledit->username}}" readonly>
                                
                            </div>
 
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control"  value="{{$tampiledit->nama}}" readonly>
                            </div>
                        </div>
                        

                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Asal</label>
                            <div class="col-md-6">                            
                                <input id="id" type="text" class="form-control" value="{{$tampiledit->asal}}" readonly>
                                </select>                                
                            </div>
                        </div>                  
            

                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Test</label>
                            <div class="col-md-6">
                            <input id="id" type="text" class="form-control" value="{{$tampiledit->service}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Level</label>
                            <div class="col-md-6">
                            <input id="id" type="text" class="form-control"  value="{{$tampiledit->level}}" readonly> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Tanggal Sebelumnya</label>
                            <div class="col-md-6">
                            
                            <input id="id" type="hidden" name="oldid" class="form-control"  value="{{$tampiledit->sid}}" readonly> 
                            <input id="id" type="text"  class="form-control"  value="<?php echo date('j M Y, H : i  ',strtotime($tampiledit->tgltest));?>" readonly> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Tanggal Test</label>
                            <div class="col-md-6">
                            <select name="newid" class="form-control" >   
                             @foreach($date as $item)                             
                                    <option value="{!!$item->sid!!}"><?php echo date('j M Y, H : i  ',strtotime($item->tgl)).' sisa '.$item->capacity.' kursi'; ?></option>
                            @endforeach                     
                                </select> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                       
@endsection