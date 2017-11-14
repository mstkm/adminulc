<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <title>ULC | Admin Page</title>
    <link rel="icon" href="{{{ asset('images/logo.png')}}}" type="image/x-icon">
    <script type="text/javascript" src="{{asset( 'js/bootstrap-filestyle.min.js')}}"> </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/bootstrap.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click(function(){
                $("#jadwal").clone().appendTo("#tampiljadwal");
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example1').dataTable(
                {
                    dom: 'Bfrtip',
                    buttons: ['excel', 'pdf', 'print']
                });
        });
    </script>

    <script type="text/javascript"> 
        $(document).ready(function() {
          $("#password-confirm").keyup(validate);});

        function validate() {
            $('#btnsave').prop('disabled' , false);
            var password1 = $("#password").val();
            var password2 = $("#password-confirm").val();
            if(password1.length>=6&&password2.length>=6){ 
                if(password1 == password2) {
                 $("#validate-status").text("").prop('class','');        
             }
             else {

                $("#validate-status").text("password tidak sama!!").prop('class','alert alert-danger');
                $('#btnsave').prop('disabled' , true);  
            }    
        }
        else
        {
            $("#validate-status").text("password kurang dari 6 karakter!!").prop('class','alert alert-danger');
            $('#btnsave').prop('disabled' , true); 
        }

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnload").click(function(){
            var id = $('#username').val();
            $.get('{{ url('mahasiswa')}}/'+id, function(data, status){
                if(data=='')
                {
                    $("#cust-status").text("ID tidak terdaftar!!").prop('class','alert alert-danger');
                }
                else
                {
                    $('#name').val(data['nama']).prop('readonly',true);                                                                
                    if(data['status']=='active')
                    {                                    
                        $("#cust-status").text("NRP masih aktiv!!").prop('class','alert alert-success');
                        $('#asal').val('ubaya');
                    }
                    else
                    {                                    
                        $("#cust-status").text("NRP sudah lulus atau UMUM!!").prop('class','alert alert-danger');
                        $('#asal').val('umum');
                    }  
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#service').on('change', function(e){
            var id = e.target.value;
            $.get('{{ url('level')}}/'+id, function(data){
                console.log(id);
                console.log(data);
                $('#level').empty();
                $('#level').append("<option disabled selected value="+''+">---------Pilih Level--------------------</option>");
                $.each(data, function(index, element){
                 $('#level').append("<option value="+element.id+" >"+element.name.toUpperCase()+"</option>");
                });
            });
        });
    });
</script>

<style type="text/css">
    .num
    {
        width:50px;
    }
    .name
    {
        width:200px;
    }

    .action
    {
        width:100px;
    }
   
    .quest
    {
        width:400px;   
    }
</style> 

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
<style>
    * {
        font-family: 'Lato';
    }

    .fa-btn {
        margin-right: 6px;
    }
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }
</style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->                
                
                <!-- Authentication Links -->
                @if(Auth::guest())
                <ul class="nav navbar-nav">                    
                </ul>
                <ul class="nav navbar-nav navbar-right">                       

                    @else
                    <div class="nav navbar-nav">
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-btn "></i>Home</a></li>
                        @if(Auth::user()->admin=='dosen')
                        @else
                        @if(Auth::user()->admin=='staff'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur'||Auth::user()->admin=='admin')                   
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Data <span class="caret"></span>
                           </a>
                           <ul class="dropdown-menu" role="menu">
                      
                            <li class="dropdown-submenu"><a href="#"  tabindex="-1" ><i class="fa fa-btn "></i>Layanan</a>
                            <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/service/language') }}" tabindex="-1" ><i class="fa fa-btn "></i>Bahasa</a>                              
                            </li>
                            <li><a href="{{ url('admin/service/preparation') }}"><i class="fa fa-btn "></i>Preparation</a></li>
                            <li><a href="{{ url('admin/service/test') }}"><i class="fa fa-btn "></i>Test</a></li></ul>
                            </li>
                            <li><a href="{{ url('admin/course/') }}"><i class="fa fa-btn "></i>Kursus</a></li>
                            <li><a href="{{ url('admin/customer/') }}"><i class="fa fa-btn "></i>Customer</a></li>
                            <li><a href="{{ url('admin/room') }}"><i class="fa fa-btn "></i>Ruang</a></li>
                            @if(Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur'||Auth::user()->admin=='admin')
                         <li><a href="{{ url('admin/periode') }}"><i class="fa fa-btn "></i>Periode</a></li>
                         @endif
                        </ul>
                    </li>  
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           Jadwal<span class="caret"></span>
                       </a>
                       <ul class="dropdown-menu" role="menu">
                         <li><a href="{{ url('admin/schedule/course') }}" tabindex="-1" ><i class="fa fa-btn "></i>Kursus</a>
                         </li>
                         <li><a href="{{ url('admin/schedule/test') }}" tabindex="-1" ><i class="fa fa-btn "></i>Test</a>
                         </li>
                         <li><a href="{{ url('admin/schedule/all') }}"><i class="fa fa-btn "></i>Semua</a></li>
                         
                     </ul>
                 </li>  
                  
                 <li ><a href="{{ url('admin/post') }}"><i class="fa fa-btn "></i>Berita</a>
                                </li> 
                 @if(Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur'||Auth::user()->admin=='admin')
                 <li ><a href="{{ url('admin/report/finance') }}"><i class="fa fa-btn "></i>Keuangan</a>
                                </li> 
            @endif

            @endif    
        </div>      

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown nav navbar-nav navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   {{Auth::user()->name}} <span class="caret"></span>
               </a>
               <ul class="dropdown-menu" role="menu">

                <li><a href="{{ url('admin/user/profile') }}"><i class=" fa fa-btn fa-user "></i>Profile</a></li>
                @if(Auth::user()->admin=='admin'||Auth::user()->admin=='kepala'||Auth::user()->admin=='direktur')
                <li><a href="{{ url('admin/user') }}"><i class=" fa fa-btn fa-list "></i>Daftar User</a></li>
                @endif
                <li><a href="{{ url('/logout') }}"><i class=" fa fa-btn fa-sign-out "></i>Logout</a></li>


            </ul>
        </li>

        @endif
    </ul>

</div>
</div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- JavaScripts -->

</body>
</html>

