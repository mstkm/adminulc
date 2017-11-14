@extends('layouts.app')
@section('content')



<d<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Layanan</div>
                <div class="panel-body">
                    <form name="frm" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/service/level/store') }}">

                    @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                    @endif

                        
                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Tipe</label>
                            <div class="col-md-6">
                            <select name="type" id="type" class="form-control" > 
                            <option value="0">----------Pilih Tipe----------</option>  
                             @foreach($service as $item)                             
                                    <option value="{!!$item->type!!}"><?php echo ucwords($item->type); ?></option>
                            @endforeach                     
                                </select> 
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#type').on('change', function(e){
                                    var id = e.target.value;
                                    $.get('{{ url('service')}}/'+id, function(data){
                                        console.log(id);
                                        console.log(data);
                                        $('#service').empty();
                                        $.each(data, function(index, element){
                                            $('#service').append("<option value="+element.id+" >"+element.name.toUpperCase()+"</option>");
                                        });
                                    });
                                });
                            });
                        </script>


                        <div class="form-group">
                            <label for="admin" class="col-md-4 control-label">Pilih Layanan</label>
                            <div class="col-md-6">
                            <select name="service_id" id="service" class="form-control" >   
                                                       
                                    <option value="0">----------Pilih Layanan----------</option>
                                               
                                </select> 
                            </div>
                        </div>


                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nama Level</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" required>                             
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Harga Daftar  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{ old('daftar') }}" name="daftar" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Harga Ubaya  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{ old('ubaya') }}" name="ubaya" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Harga Umum  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{ old('umum') }}" name="umum" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Min Kelas dibuka  </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{ old('min') }}" name="min" required>
                                </div>
                            </div>
                          
                        
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection