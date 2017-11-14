

@extends('layouts.app')
@section('content')



<div class="section">
  <form name="frm" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('/admin/post/update/'.$tampiledit->id) }}">
                        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>
                <div class="panel-body">
    <div class="form-group">
      <div class="row">
          <div class="col-sm-3 control-label">
            <label for="title">Penulis</label>
          </div>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="penulis" value="{{Auth::user()->name}}" readonly>            
          </div>
    </div>
</div>
     <div class="form-group">
    <div class="row">
          <div class="col-sm-3 control-label">
            <label for="title">Judul</label>
            </div>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="judul" value="{{ $tampiledit->judul }}" required>
          </div>            
          </div>  
     </div>
     <div class="form-group">
      <div class="row">
        <div class="col-md-3 control-label">
          <label for="textarea1">Isi</label>
          </div>
            <div class="col-sm-6">
          <textarea id="textarea1" class="form-control" name="isi" rows="8" required>{{ $tampiledit->isi }}</textarea>          
        </div>
      </div>
</div>
     <div class="form-group">
      <div class="row">
        <div class="col-md-3 control-label">
          <label>Image</label>
          </div>
        <div class="col-sm-6">
            <img src="{{ asset('./images/post/'.$tampiledit->gambar) }}" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div>
    </div>
  </div>
    <div class="form-group">
    <div class="row">
       <div class="col-md-3 control-label">
          <label></label>
          </div>
        <div class="col-sm-6">
          <input type="file" id="inputgambar" name="gambar" class="validate"/ >
           <script type="text/javascript">
                                   function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#showgambar').attr('src', e.target.result);
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    $("#inputgambar").change(function () {
                                        readURL(this);
                                    });
                                    </script>
        </div>
        <br/>
        
      </div>
    </div>

    </div>

      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 ">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Update</button>
                            </div>
                        </div>
     
  </form>
</div>
</div>
</div>
</div>
</div>




@endsection