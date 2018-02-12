@extends('Layouts.master')
@section('css')
    <!-- Bootstrap 3.3.6 -->
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
    {{--------------------------- Invoice--------------------------}}
    <link rel="stylesheet" href="{!! asset('//demo.itsolutionstuff.com/plugin/bootstrap-3.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{!! asset('plugins/datepicker/datepicker3.css') !!}">
    <link href="{!! asset('//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('//cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js') !!}"></script>
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
        {!! Form::open(['route' => 'products.store', 'files'=> true, 'enctype' => 'multipart/form-data']) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Product Form</h3>
            {!! Form::submit('Save', array('class'=>'btn btn-primary pull-right')) !!}
            <div class="input-group pull-right" id="profitDiv">
                <span class="input-group-addon" id="basic-addon1">Profit</span>
                {!! Form::text('profit', null, ['class' => 'form-control','id' => 'profit','aria-describedby' => 'basic-addon1','disabled']) !!}
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

            <div class="box-body row" style="margin-left: 1%;margin-right: 1%">
                <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('productId', 'Product ID') !!}
                    {!! Form::text('productId', null, ['class' => 'form-control','required','autofocus','placeholder' => 'Product ID']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('productName', 'Product Name') !!}
                    {!! Form::text('productName', null, ['class' => 'form-control','required','autofocus','placeholder' => 'Product Name']) !!}
                 </div>
                <!-- select -->
                <div class="form-group">
                    {!! Form::label('productCategory', 'Product Category') !!}
                    {!! Form::select('productCategory',['Consulting', 'Shipping'], null, ['class' => 'form-control','required','autofocus']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('quantity', 'Quantity') !!}
                    {!! Form::number('quantity', '0', ['class' => 'form-control','autofocus']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', 0, ['class' => 'form-control','required','autofocus','placeholder' => '00.00','id' => 'price','oninput' => 'calculateProfit()','onpropertychange' => 'calculateProfit()']) !!}
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('priceTax', 'yes',null,['id' => 'priceTax','onclick'=>'calculateProfit()']) !!}
                            Including GST(TAX)?
                        </label>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                        {!! Form::label('supplier', 'Supplier') !!}
                        {!! Form::text('supplier', null, ['class' => 'form-control','autofocus','placeholder' => 'Supplier']) !!}
                 </div>
                <div class="form-group">
                    {!! Form::label('expenseType', 'Expense Type') !!}
                    {!! Form::text('expenseType', null, ['class' => 'form-control','autofocus','placeholder' => 'Expense Type']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('amount', 'Amount') !!}
                    {!! Form::text('amount', 0, ['class' => 'form-control','autofocus','placeholder' => '00.00','id' => 'amount','oninput' => 'calculateProfit()','onpropertychange' => 'calculateProfit()']) !!}
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('amountTax', 'yes',null,['id' => 'amountTax','onclick'=>'calculateProfit()']) !!}
                            Including GST(TAX)?
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status',['Active', 'Published','Inactive'], null, ['class' => 'form-control','autofocus']) !!}
                </div>
                <div class="form-group">
                    <div class="checkbox">
                    <label>
                    {!! Form::checkbox('recProduct', 'yes') !!}
                    Recurring Product?
                    </label>
                    </div>
                </div>

                {!! Form::hidden('images', null, ['class' => 'form-control','autofocus','id' => 'images']) !!}
            <!-- /.box-body -->
                {!! Form::close() !!}

                </div>
            </div>
        <div class="box-footer"  style="background-color:white;margin: 1%">
            <div id="drag-drop-upload">
                {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
                <div>
                    <h5 style="text-align: center;">Drag and Drop or Click to Upload Product Images</h5>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
            </div>
         {{--<div class="col-md-1"></div>--}}
     </div>
    </section>


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

    {{-------------------------------  This js ------------------}}
    <script type="text/javascript">
        var jsarray = [];
        Dropzone.options.imageUpload = {
            maxFilesize         :       8,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",

            success: function(file, response){
                jsarray.push(response.success);
//                $('#images').val()=response.success;
                $('#images').val(jsarray);
            }

        };

        //        ------------------------ Calculate Profit ----------------------------------
        function calculateProfit(){
            console.log('ok');
            var price = $('#price').val();
            var priceTax = document.getElementById('priceTax').checked;
            var amount = $('#amount').val();
            var amountTax = document.getElementById('amountTax').checked;
//            if(amount>price){
//                $('#message').text('Your cost is greater than price.');
//            } else {
//                $('#message').text(' ');
//            }
            if(priceTax==true && amountTax==true){
                var finalPrice = price-(price/11);
                var finalAmount = amount-(amount/11);
                var profit = finalPrice-finalAmount;
                var result = Math.round(profit * 100) / 100
                $('#profit').val(result);
            } else if(priceTax==true && amountTax==false)
            {
                var finalPrice = price-(price/11);
                var profit = finalPrice-amount;
                var result = Math.round(profit * 100) / 100
                $('#profit').val(result);
            } else if(priceTax==false && amountTax==true)
            {
                var finalAmount = amount-(amount/11);
                var profit = price-finalAmount;
                var result = Math.round(profit * 100) / 100
                $('#profit').val(result);
            } else if(priceTax==false && amountTax==false)
            {
                var profit = price-amount;
                var result = Math.round(profit * 100) / 100
                $('#profit').val(result);
            }

        }

        //        function checkPrice() {
        //            var price = $('#price').val();
        //            var amount = $('#amount').val();
        //            if(amount>price){
        //                $('#message').text('Your cost is greater than price.');
        //            } else {
        //                $('#message').text('');
        //            }
        //        }
    </script>
    @endsection