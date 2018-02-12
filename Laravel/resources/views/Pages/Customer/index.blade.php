@extends('Layouts.master')
@section('css')
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
    <link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('dist/css/skins/_all-skins.min.css') !!}">


    {{----------------------------- Data Table ---------------------------------}}

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('plugins/datatables/dataTables.bootstrap.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('dist/css/skins/_all-skins.min.css') !!}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <script src="{!! asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}"></script>
    <script src="{!! asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Customer List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body"  style="overflow-x: scroll">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Street Address</th>
                                    <th>Street Address 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip Code</th>
                                    <th>Country</th>
                                    <th>Phone Number</th>
                                    <th>Fax Number</th>
                                    <th>Mobile Number</th>
                                    <th>Email Address</th>
                                    <th>Web Address</th>
                                    <th>VAT ID</th>
                                    <th>Taxes Code</th>
                                    <th>CRM ID</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $key=>$customer)
                                    <tr>
                                        <td>{!! $customer->customerName !!}</td>
                                        <td>{!! $customer->streetAddress !!}</td>
                                        <td>{!! $customer->streetAddress2 !!}</td>
                                        <td>{!! $customer->city !!}</td>
                                        <td>{!! $customer->state !!}</td>
                                        <td>{!! $customer->zipCode !!}</td>
                                        <td>{!! $customer->country !!}</td>
                                        <td>{!! $customer->phoneNumber !!}</td>
                                        <td>{!! $customer->faxNumber !!}</td>
                                        <td>{!! $customer->mobileNumber !!}</td>
                                        <td>{!! $customer->emailAddress !!}</td>
                                        <td>{!! $customer->webAddress !!}</td>
                                        <td>{!! $customer->vatId !!}</td>
                                        <td>{!! $customer->taxesCode !!}</td>
                                        <td>{!! $customer->crmId !!}</td>
                                        <td style="min-width: 120px">
                                            <div style="float: left">
                                            <a href="{{url('customer/'.$customer->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                            </div>
                                            <div style="float: left">
                                            {!! Form::open(array('method'=>'DELETE', 'route'=>array('customer.destroy',$customer->id)))!!}
                                            {!! Form::submit('Delete', array('class'=>'btn btn-danger btn-sm','onclick' => 'return confirm("Are you sure want to Delete?");'))!!}
                                            {!! Form::close()!!}
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <!-- jQuery 2.2.3 -->
    {{--<script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>--}}
    <!-- Bootstrap 3.3.6 -->
    <script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('plugins/fastclick/fastclick.js') !!}"></script>
    <!-- AdminLTE App -->
    <script src="{!! asset('dist/js/app.min.js') !!}"></script>
    {{-- Sparkline--}}
    <script src="{!! asset('plugins/sparkline/jquery.sparkline.min.js') !!}"></script>
    <!-- jvectormap -->
    <script src="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
    <script src="{!! asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{!! asset('plugins/chartjs/Chart.min.js') !!}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{!! asset('dist/js/demo.js') !!}"></script>


    {{----------------------------------- Data Table ---------------------------------------}}
    <!-- jQuery 2.2.3 -->
    {{--    <script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>--}}
    <script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
    <!-- DataTables -->
    <script src="{!! asset('plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
    <!-- SlimScroll -->
    <script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('plugins/fastclick/fastclick.js') !!}"></script>
    <!-- AdminLTE App -->
    <script src="{!! asset('dist/js/app.min.js') !!}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{!! asset('dist/js/demo.js') !!}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection