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
                            <h3 class="box-title">Product List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body"  style="overflow-x: scroll">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Price GST(TAX)</th>
                                    <th>Supplier</th>
                                    <th>Expense Type</th>
                                    <th>Expense Amount</th>
                                    <th>Expense GST(TAX)</th>
                                    <th>Profit</th>
                                    <th>GST Payable</th>
                                    <th>Recurrent Product</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key=>$product)
                                    <tr>
                                        <td>{!! $product->productId !!}</td>
                                        <td>{!! $product->productName !!}</td>
                                        <td>{!! $product->productCategory !!}</td>
                                        <td>{!! $product->quantity !!}</td>
                                        <td>{!! $product->price !!}</td>
                                        <td>{!! $product->gst_price !!}</td>
                                        <td>{!! $product->supplier !!}</td>
                                        <td>{!! $product->expenseType !!}</td>
                                        <td>{!! $product->amount !!}</td>
                                        <td>{!! $product->gst_exp !!}</td>
                                        <td>{!! $product->profit !!}</td>
                                        <td>{!! $product->gst_payable !!}</td>
                                        <td>{!! $product->recProduct !!}</td>
                                        <td style="min-width: 120px">
                                            <div style="float: left">
                                            <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                            </div>
                                            <div style="float: left">
                                            {!! Form::open(array('method'=>'DELETE', 'route'=>array('products.destroy',$product->id)))!!}
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
    <script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
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