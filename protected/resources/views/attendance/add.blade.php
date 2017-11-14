@extends('layouts.app')
@section('content')
 
<div class="container">
      <div class=row>
        <h4><i class="fa fa-book"></i> PENDAFTAR </h4><hr>
    
        </div><br>
        <form name="frm" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/course/attendance/store') }}">
                
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        {{-- */$x=0;/* --}}
                         @foreach($customer as $item)
                {{-- */$x++;/* --}}
                    <?php $uk=sizeof($item->attendance);
                    ?>
                    @for($i=1;$i<=$uk[0];$i++)
                    <th>
                    {{$i}}
                    </th>
                    @endfor 
                @endforeach
                        
                    </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($customer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td class="text-center">{{ $x }}</td><td><?php echo ucwords($item->name ) ?></td>
                    @foreach($item->attendance as $att)
                    <td>

                    <!-- <input type="checkbox" name="absen[]" value="{{$att->id}}"  -->
                    @if($att->status_customer===0)
                    <a href="" class="btn btn-danger btn-xs disabled" title="Set Customer Tidak Hadir" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>A</a> 
                    @elseif($att->status_customer===1) 
                    <!-- checked disabled> -->
                    <a href="" class="btn btn-primary btn-xs disabled" title="Set Customer Hadir" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a> 
                    @elseif($att->status_customer===null)
                    <a href="{{ url('admin/course/attendance/'.$att->id.'/set/1')}}" class="btn btn-primary btn-xs" title="Set Customer Tidak Hadir" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>H</a>
                    <a href="{{ url('admin/course/attendance/'.$att->id.'/set/0')}}" class="btn btn-danger btn-xs" title="Set Customer Tidak Hadir" data-toggle="tooltip" data-placement="right"><span aria-hidden="true"/>A</a> 


                 
                    
                    
                    

      
                    
                    
                    @endif
                    
                    </td>
                    
                       @endforeach
                </tr>
            @endforeach
            
            </tbody>
        </table>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label"></label>                                 
            <div class="col-sm-2">  
                <button  class="btn btn-primary">Save</button>

            </div>
        </div>
        </form>
    </div>
   
        </div>
      

@endsection