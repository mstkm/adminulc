

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" 
                    action="{{ url('/admin/question/$id/edit') }}">


                     
                            
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
                                <textarea id="name" type="text" class="form-control" name="question" required>{{$tampiledit->question}} </textarea>                             
                            </div>
                        </div>
                        

                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Tipe Layanan</label>
                            <div class="col-md-6">                            
                                <input type="text" name="" class="form-control" value="{{$tampiledit->type}}" readonly>                              
                            </div>
                        </div> 

                        <div class="form-group">
                        <label for="admin" class="col-md-4 control-label">Pertanyaan untuk</label>
                            <div class="col-md-6">                            
                                <input type="text" name="" class="form-control" value="{{$tampiledit->question_for}}" readonly>    
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection