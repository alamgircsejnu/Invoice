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
                            <h3 class="box-title">Invoice List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                    <th>Created</th>
                                    <th>Due Date</th>
                                    <th>Client Name</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $countCustomer = 0; ?>
                                @foreach($invoices as $key=>$invoice)
                                    <tr>
                                        @if($invoice->status == 0)
                                            <td><p style="background-color: #B3B3B3">Draft</p></td>
                                        @elseif($invoice->status == 1)
                                            <td><p  style="background-color: #54A0C6">Sent</p></td>
                                        @elseif($invoice->status == 2)
                                            <td><p  style="background-color: #FAA937">Viewed</p></td>
                                        @elseif($invoice->status == 3)
                                            <td><p  style="background-color: #58A959">Paid</p></td>
                                        @endif

                                        @if(isset($invoice->invoiceNo) && !empty($invoice->invoiceNo))
                                        <td>{!! $invoice->invoiceNo !!}</td>
                                        @else
                                            <td>{!! $invoice->id !!}</td>
                                        @endif
                                        <td>{!! $invoice->date !!}</td>
                                        <td>{!! $invoice->dueDate !!}</td>
                                        <td>{!! $customers[$countCustomer] !!}</td>
                                        <?php
                                        $amount=0;
                                        foreach($invoice->items as $item){
                                            $amount = $amount + $item->price;
                                        }
                                        ?>
                                        <td>${!! $amount !!}</td>
                                        <td>$0</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="glyphicon glyphicon-cog"></i> Options
                                                </button>
                                                <ul class="dropdown-menu" style="right: 0;left: auto">
                                                    <li><a href="{{url('invoice/'.$invoice->id.'/edit')}}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                                    <li><a href="{{url('invoice/pdf/'.$invoice->id)}}" target="_blank"><i class="fa fa-print fa-margin"></i>Download as PDF</a></li>
                                                    <div style="float: left">
                                                        {!! Form::open(array('method'=>'DELETE', 'route'=>array('invoice.destroy',$invoice->id),'id'=>'deleteData'.$invoice->id,'onsubmit'=>'return confirm("Are you sure want to Delete?");'))!!}
                                                        {!! Form::close()!!}
                                                    </div>
                                                    <li><a onclick="deleteFunction({{ $invoice->id }})" href="#"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php $countCustomer++; ?>
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
    <script>
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown()
        });
    </script>
    <script>
        function deleteFunction(id) {
            if(confirm("Do you really want to delete this?"))
                document.getElementById("deleteData"+id).submit();
            else
                return false;
        }
    </script>
@endsection