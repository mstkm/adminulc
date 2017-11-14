

@extends('layouts.app')
@section('content')



<div class="container">
    <div class="row">


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah pertanyaan</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/question/store') }}">      
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
                            <label for="name" class="col-md-4 control-label">Pertanyaan</label>
                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control" name="question" required> </textarea>                             
                            </div>
                        </div>
                        

                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Tipe Layanan</label>
                            <div class="col-md-6">                            
                                <select id="admin" name="service_type" class="form-control" required>   
                                    <option value="kursus">Kursus</option>                          
                                    <option value="test">Tes</option>
                                </select>                                
                            </div>
                        </div> 

                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Pertanyaan untuk</label>
                            <div class="col-md-6">                            
                                <select id="admin" name="question_for" class="form-control" required>   
                                    <option value="pengajar">Pengajar</option>                          
                                    <option value="peserta">Peserta</option>
                                </select>                                
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