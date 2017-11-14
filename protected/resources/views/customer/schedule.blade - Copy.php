

@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Jadwal Customer</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/schedule/store') }}">                    

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                    <script type="text/javascript">
                    $(document).ready(function(){
                        var next = 1;
                        $(".add-more").click(function(e){
                            e.preventDefault();
                            var addto = "#field" + next;
                            var addRemove = "#field" + (next);
                            next = next + 1;
                            var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
                            var newInput = $(newIn);
                            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
                            var removeButton = $(removeBtn);
                            $(addto).after(newInput);
                            $(addRemove).after(removeButton);
                            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                            $("#count").val(next);          
                                $('.remove-me').click(function(e){
                                    e.preventDefault();
                                    var fieldNum = this.id.charAt(this.id.length-1);
                                    var fieldID = "#field" + fieldNum;
                                    $(this).remove();
                                    $(fieldID).remove();
                                });
                        });
                    });
                    </script>
                    <style type="text/css">
                      * {
                      .border-radius(0) !important;
                    }

                    #field {
                        margin-bottom:20px;
                    }
                    </style>

                    <div class="form-group" id="fields">
                        <label class="col-md-4 control-label" for="field1">Nice Multiple Form Fields</label>
                        <div class="col-md-5" id="profs"> 
                            <form class="input-append">
                                <div id="field"><input autocomplete="off" class="form-control" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                            </form>        
                        </div>
                    </div>

                        <div class="form-group" >
                            <label for="id" class="col-md-4 control-label">ID</label>
                            <div class="col-md-5">
                                <input id="id" type="text" class="form-control" name="username">                             
                                <input id="id" type="hidden" class="form-control" name="user_id" value="{{$customer->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">load</button>                                                   
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Hari </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="day" value="senin">                             
                                </div>
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end" >                             
                            </div>


                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Hari </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="day" value="senin">                             
                              </div>
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Hari </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="day" value="senin">                             
                                 </div>
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Hari </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="day" value="senin">                             
                                </div>
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end" >                             
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Hari </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="day" value="senin">                             
                               </div>
                            <div class="col-md-2">
                            
                                <input type="time" class="form-control" name="start" >                             
                            </div>
                            <div class="col-md-2">
                                <input type="time" class="form-control" name="end" >                             
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