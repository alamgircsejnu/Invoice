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
    <section class="content-wrapper">

        <div class="row">

            <!-- left column -->
            {{--<div class="col-md-1"></div>--}}
            <div style="margin: 5%">
                <div class="text-center">
                    <h4 style="margin: auto;color: red" id="message"></h4>
                </div>
                <div class="box box-primary" id="product-create-form">
                    {!! Form::model($editCustomer, ['method' => 'PATCH', 'route' => ['customer.update', $editCustomer->id], 'files' => true]) !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Update Form</h3>
                        {!! Form::submit('Update', array('class'=>'btn btn-primary pull-right')) !!}
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body row" style="margin-left: 1%;margin-right: 1%">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('customerName', 'Customer Name') !!}
                                {!! Form::text('customerName', null, ['class' => 'form-control','required','autofocus','placeholder' => 'Customer Name','id' => 'customerName']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('streetAddress', 'Street Address') !!}
                                {!! Form::text('streetAddress', null, ['class' => 'form-control','required','autofocus','placeholder' => 'Street Address','id' => 'streetAddress']) !!}
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                {!! Form::label('streetAddress2', 'Street Address 2') !!}
                                {!! Form::text('streetAddress2', null, ['class' => 'form-control','required','autofocus','placeholder' => 'Street Address 2','id' => 'streetAddress2']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control','autofocus','placeholder' => 'City','id' => 'city']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('state', 'State') !!}
                                {!! Form::text('state', null, ['class' => 'form-control','autofocus','placeholder' => 'State','id' => 'state']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('zipCode', 'Zip Code') !!}
                                {!! Form::text('zipCode', null, ['class' => 'form-control','autofocus','placeholder' => 'Zip Code','id' => 'zipCode']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::select('country',['United States', 'United Kingdom','Bangladesh'], null, ['class' => 'form-control','autofocus','placeholder'=>'Country']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('phoneNumber', 'Phone Number') !!}
                                {!! Form::text('phoneNumber', null, ['class' => 'form-control','autofocus','placeholder' => 'Phone Number']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('faxNumber', 'Fax Number') !!}
                                {!! Form::text('faxNumber', null, ['class' => 'form-control','autofocus','placeholder' => 'Fax Number']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('mobileNumber', 'Mobile Number') !!}
                                {!! Form::text('mobileNumber', null, ['class' => 'form-control','autofocus','placeholder' => 'Mobile Number','id' => 'mobileNumber']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('emailAddress', 'Email Address') !!}
                                {!! Form::email('emailAddress', null, ['class' => 'form-control','autofocus','required','placeholder' => 'Email Address','id' => 'emailAddress']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('webAddress', 'Web Address') !!}
                                {!! Form::text('webAddress', null, ['class' => 'form-control','autofocus','placeholder' => 'Web Address','id' => 'webAddress']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('vatId', 'VAT ID') !!}
                                {!! Form::text('vatId', null, ['class' => 'form-control','autofocus','placeholder' => 'VAT ID','id' => 'vatId']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('taxesCode', 'Taxes Code') !!}
                                {!! Form::text('taxesCode', null, ['class' => 'form-control','autofocus','placeholder' => 'Taxes Code','id' => 'taxesCode']) !!}
                            </div>

                        </div>
                        <div class="form-group" id="crmIdDiv" style="margin-left: 2%;margin-right: 2%">
                            {!! Form::label('crmId', 'CRM ID') !!}
                            {!! Form::text('crmId', null, ['class' => 'form-control','autofocus','placeholder' => 'CRM ID','id' => 'crmId']) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}



                    <div class="box-footer"  style="background-color:white;margin: 1%">

                    </div>
                </div>
            </div>
            {{--<div class="col-md-1"></div>--}}
        </div>
    </section>

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