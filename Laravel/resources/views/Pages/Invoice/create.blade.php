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

    <script src="{!! asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}"></script>
    <script src="{!! asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}"></script>
    {{--------------------------- Invoice--------------------------}}
    <link rel="stylesheet" href="{!! asset('css/custom.css') !!}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{!! asset('plugins/datepicker/datepicker3.css') !!}">
    <link href="{!! asset('//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('//cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js') !!}"></script>
    @endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <section class="content-wrapper">

     <div class="row">

            <!-- left column -->
         {{--<div class="col-md-1"></div>--}}
    <div style="margin: 5%">
        <div class="text-center">
            <h4 style="margin: auto;color: red" id="message"></h4>
        </div>
    <div class="box box-primary" id="product-create-form">
        {!! Form::open(['route' => 'invoice.store', 'files'=> true, 'enctype' => 'multipart/form-data']) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Invoice Form</h3>
            {!! Form::submit('Save', array('class'=>'btn btn-primary pull-right')) !!}
        </div>
        <!-- /.box-header -->
        <!-- form start -->

            <div class="box-body row" style="margin-left: 1%;margin-right: 1%">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('customer', 'Customer') !!}
                        {!! Form::select('customer',$customers, null, ['class' => 'form-control','required','autofocus','placeholder' => 'Select Customer','id' => 'customerName','onchange' => 'customerDetails()']) !!}
                    </div>
                <!-- select -->
                <div class="form-group">
                    <div id="customerInfo">
                        <br>
                        <h3 id="customerNameInfo"></h3>
                        <p id="streetAddressInfo"></p><br>
                        <p><b>Phone&nbsp;  :</b> &nbsp; <span id="phoneNumberInfo"></span></p>
                        <p><b>Email&nbsp; :</b>&nbsp;&nbsp;&nbsp;<span id="emailAddressInfo"></span></p>
                    </div>
                </div>

                </div>
                <div class="col-md-6">
                 <div class="form-group">
                        {!! Form::label('invoiceNo', 'Invoice#') !!}
                        {!! Form::text('invoiceNo', null, ['class' => 'form-control','autofocus','placeholder' => 'Not set yet']) !!}
                 </div>
                <div class="form-group date">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control','autofocus','placeholder' => 'Click to select date','id' => 'datepicker']) !!}
                </div>
                    <div class="form-group date">
                        {!! Form::label('dueDate', 'Due Date') !!}
                        {!! Form::text('dueDate', date('Y-m-d'), ['class' => 'form-control','autofocus','placeholder' => 'Click to select due date','id' => 'datepicker2']) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status',['Draft', 'Sent','Viewed','Paid'], null, ['class' => 'form-control','autofocus']) !!}
                </div>
                    <div class="form-group">
                        {!! Form::label('paymentMethod', 'PaymentMethod') !!}
                        {!! Form::select('paymentMethod',['Bank Transfer', 'Credit Card','Paypal'], null, ['class' => 'form-control','autofocus','placeholder' => 'Select Payment Method']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('pdfPassword', 'PDF Password (Optional)') !!}
                        {!! Form::password('pdfPassword', ['class' => 'form-control','autofocus']) !!}
                    </div>
                </div>
            </div>
                    <div class="box-footer">
                        <div class="invoice-item" id="clone-this-div0">
                            <div id="product-section" class="col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group col-sm-2 col-xs-12" id="product-item">
                                    <span class="input-group-addon" id="basic-addon-item" style="background-color: #EEEEEE">Item</span>
                                    {!! Form::text('item[]', null, ['class' => 'form-control','aria-describedby' => 'basic-addon-item','id' => 'cloning-item0','required']) !!}
                                </div>
                                <div class="input-group col-sm-2 col-xs-6" id="product-quantity">
                                    <span class="input-group-addon" id="basic-addon-quantity" style="background-color: #EEEEEE;width: 20px;">Quantity</span>
                                    {!! Form::text('quantity[]', null, ['class' => 'form-control','aria-describedby' => 'basic-addon-quantity','id' => 'cloning-quantity0']) !!}
                                </div>
                                <div class="input-group col-sm-2 col-xs-6" id="product-price">
                                    <span class="input-group-addon" id="basic-addon-price" style="background-color: #EEEEEE">Price</span>
                                    {!! Form::text('price[]', null, ['class' => 'form-control','aria-describedby' => 'basic-addon-price','id' => 'cloning-price0']) !!}
                                </div>
                                <div class="input-group col-sm-2 col-xs-6" id="product-discount">
                                    <span class="input-group-addon" id="basic-addon-discount" style="background-color: #EEEEEE">Discount</span>
                                    {!! Form::text('discount[]', null, ['class' => 'form-control','aria-describedby' => 'basic-addon-discount','id' => 'cloning-discount0']) !!}
                                </div>
                                <div class="input-group col-sm-2 col-xs-6" id="product-taxRate">
                                    <span class="input-group-addon" id="basic-addon-taxRate" style="background-color: #EEEEEE">TAX Rate</span>
                                    {!! Form::select('taxRate[]',['None', '10% - GST'], 0, ['class' => 'form-control','aria-describedby' => 'basic-addon-taxRate','id' => 'cloning-taxRate0']) !!}
                                </div>
                                <div class="input-group col-sm-2 col-xs-6" id="product-quantity">
                                    <span class="input-group-addon" id="basic-addon-expense" style="background-color: #EEEEEE;width: 20px;">Expense</span>
                                    {!! Form::text('expense[]', null, ['class' => 'form-control','aria-describedby' => 'basic-addon-expense','id' => 'cloning-expense0']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group col-md-4 col-xs-12" id="product-description" style="float:left; display: inline-table">
                                    <span class="input-group-addon" id="basic-addon-description" style="background-color: #EEEEEE">Description</span>
                                    {!! Form::textarea('description[]', null, ['class' => 'form-control','aria-describedby' => 'basic-addon-description','id' => 'cloning-description0']) !!}
                                </div>
                                <div id="cloning-subtotal" class="invoice-section col-md-2 col-xs-6" style="display: inline-block">
                                    <p class="text-right">
                                        <span>Subtotal</span><br/>
                                        <span id="cloning-subtotal0"></span>
                                    </p>
                                </div>
                                <div id="cloning-discount" class="invoice-section col-md-2 col-xs-6" style="display: inline-block">
                                    <p class="text-right">
                                        <span>Discount</span><br/>
                                        <span id="cloning-discount0"></span>
                                    </p>
                                </div>
                                <div id="cloning-tax" class="invoice-section col-md-2 col-xs-6" style="display: inline-block">
                                    <p class="text-right">
                                        <span>Tax</span><br/>
                                        <span id="cloning-tax0"></span>
                                    </p>
                                </div>
                                <div id="cloning-total" class="invoice-section col-md-2 col-xs-6" style="display: inline-block">
                                    <p class="text-right">
                                        <span>Total</span><br/>
                                        <span id="cloning-total0"></span>
                                    </p>
                                </div>
                            </div>



                        </div>
                        <div id="cloning-buttons" class="col-md-4 col-sm-6 col-xs-12">
                            <div class="pull-left">
                                <button class="btn btn-primary pull-right" id="addProduct">Add Product</button>
                                <button class="btn btn-primary pull-right" id="addNewRow">Add New Row</button>
                            </div>
                        </div>
                        <div id="invoice-summery" class="pull-right col-md-5 col-xs-12">
                            <table style="width: 100%">
                                <tr>
                                    <td>Subtotal</td>
                                    <td id="summary-subtotal">$0.00</td>
                                </tr>
                                <tr>
                                    <td>Item Tax</td>
                                    <td id="summary-tax">$0.00</td>
                                </tr>
                                <tr>
                                    <td>Invoice Tax</td>
                                    <td id="summary-invoice-tax">$0.00</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td class="clearfix">
                                        <div class="discount-field">
                                            <div class="input-group input-group-sm">
                                                {!! Form::text('invoice_discount_amount', null, ['class' => 'form-control','discount-option','amount','id' => 'invoice_discount_amount']) !!}
                                                <div class="input-group-addon">$</div>
                                            </div>
                                        </div>
                                        <div class="discount-field">
                                            <div class="input-group input-group-sm">
                                                {!! Form::text('invoice_discount_percent', null, ['class' => 'form-control','discount-option','amount','id' => 'invoice_discount_percent']) !!}
                                                <div class="input-group-addon">%</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td id="summary-total"><b>$0.00</b></td>
                                </tr>
                                <tr>
                                    <td>Paid</td>
                                    <td id="summary-paid"><b>$0.00</b></td>
                                </tr>

                            </table>
                        </div>

                    </div>
        <div>

        </div>
            <!-- /.box-body -->
                {!! Form::close() !!}

    </div>
            </div>
         {{--<div class="col-md-1"></div>--}}
     </div>

        {{------------------------------------------------ Modal -----------------------------------------------}}
    <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                    <td><input type="checkbox" name="productId[]" value="{{ $product->id }}" onchange="addProductToForm(this)"></td>
                                    <td>{!! $product->productId !!}</td>
                                    <td>{!! $product->productName !!}</td>
                                    <td>{!! $product->productCategory !!}</td>
                                    <td>{!! $product->price !!}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitProduct" data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
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
    <script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js') !!}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    <script type="text/javascript">

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
        //--------------------- Customer Info ----------------------------
        function customerDetails(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id = $('#customerName').val();
            console.log(id);
            $.ajax({
                url: './../customer/'+id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data.success.customerName);
                    $('#customerNameInfo').text(data.success.customerName);
                    $('#streetAddressInfo').text(data.success.streetAddress);
                    $('#phoneNumberInfo').text(data.success.phoneNumber);
                    $('#emailAddressInfo').text(data.success.emailAddress);
                }
            });
        };

        //        ----------------------------- Cloning a div --------------------------------
        var count =0;
        var productAdded = 0;
        var clonedNum = 0;
        (function() {
        document.getElementById("addNewRow").addEventListener("click", function(e){
            e.preventDefault();

            var div = document.getElementById('clone-this-div'+count),
                clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
            count++;
            $(clone).find(':input').attr('id', function(i, val) {
                if(count<=10){
                    val = val.slice(0, -1);
                } else if(count>10){
                    val = val.slice(0, -2);
                }
                return val + count;
            });
            $(clone).find('#cloning-subtotal > p >span:last').attr('id', function(i, val) {
                if(count<=10){
                    val = val.slice(0, -1);
                } else if(count>10){
                    val = val.slice(0, -2);
                }
                return val + count;
            });
            $(clone).find('#cloning-discount > p >span:last').attr('id', function(i, val) {
                if(count<=10){
                    val = val.slice(0, -1);
                } else if(count>10){
                    val = val.slice(0, -2);
                }
                return val + count;
            });
            $(clone).find('#cloning-tax > p >span:last').attr('id', function(i, val) {
                if(count<=10){
                    val = val.slice(0, -1);
                } else if(count>10){
                    val = val.slice(0, -2);
                }
                return val + count;
            });
            $(clone).find('#cloning-total > p >span:last').attr('id', function(i, val) {
                if(count<=10){
                    val = val.slice(0, -1);
                } else if(count>10){
                    val = val.slice(0, -2);
                }
                return val + count;
            });
            $(clone).attr('id', function(i, val) {
                if(count<=10){
                    val = val.slice(0, -1);
                } else if(count>10){
                    val = val.slice(0, -2);
                }
                return val + count;
            });
            $(clone).find(':input').val("");
            $(clone).find('select').val("0");
            $(clone).find('#cloning-subtotal > p >span:last').text("");
            $(clone).find('#cloning-tax > p >span:last').text("");
            $(clone).find('#cloning-total > p >span:last').text("");

            $('#clone-this-div'+clonedNum).after(clone);
            clonedNum++;

        });
        })();

        //        ----------------------------- Adding product --------------------------------
        document.getElementById("addProduct").addEventListener("click", function(e){
            e.preventDefault();
            $('#example1').find('input[type=checkbox]:checked').removeAttr('checked');
            $('#myModal').modal('toggle');
        });

   function addProductToForm(checkboxElem){
       if (checkboxElem.checked) {
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           var id = checkboxElem.value;
           var test = $('#cloning-item'+productAdded+'').val();
           $.ajax({
               url: './../Product/modal/'+id,
               data: {_token: CSRF_TOKEN},
               dataType: 'JSON',
               success: function (data) {
                   if (test==''){

                   $('#cloning-item'+productAdded+'').val(data.success.productName);
                   $('#cloning-quantity'+productAdded+'').val(data.success.quantity);
                   $('#cloning-price'+productAdded+'').val(data.success.price);
//                   ----------------------------- Product Part calculations -------------------
                       var subtotal = (data.success.price * data.success.quantity).toFixed(2);
                       $('#cloning-subtotal'+productAdded+'').text('$'+subtotal);
                       var tax = (data.success.gst_price * data.success.quantity).toFixed(2);
                       $('#cloning-tax'+productAdded+'').text('$'+tax);
                       var total = (parseFloat(subtotal) + parseFloat(tax)).toFixed(2);
                       $('#cloning-total'+productAdded+'').text('$'+total);
// -------------------------------------- Summary Subtotal and others -------------------------------
                       var summarySub = $('#summary-subtotal').text();
                       summarySub = summarySub.substr(1);
                       var summarySubtotal = (parseFloat(subtotal) + parseFloat(summarySub)).toFixed(2);
                       $('#summary-subtotal').text('$'+summarySubtotal);

//                       ---------------- Invoice Tax ----------------------

                       var summaryInvTax = $('#summary-invoice-tax').text();
                       summaryInvTax = summaryInvTax.substr(1);
                       var summaryInvoiceTax = (parseFloat(tax) + parseFloat(summaryInvTax)).toFixed(2);
                       $('#summary-invoice-tax').text('$'+summaryInvoiceTax);

//                       ---------------- Total ----------------------

                       var summaryTot = $('#summary-total').text();
                       summaryTot = summaryTot.substr(1);
                       var summaryTotal = (parseFloat(total) + parseFloat(summaryTot)).toFixed(2);
                       $('#summary-total').text('$'+summaryTotal);
                   productAdded++;
                   } else {
                       if((count-productAdded)<2){
                       var div = document.getElementById('clone-this-div'+count),
                           clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
                       count++;
                       $(clone).find(':input').attr('id', function(i, val) {
                           if(count<=10){
                               val = val.slice(0, -1);
                           } else if(count>10){
                               val = val.slice(0, -2);
                           }
                           return val + count;
                       });
                       $(clone).find('#cloning-subtotal > p >span:last').attr('id', function(i, val) {
                           if(count<=10){
                               val = val.slice(0, -1);
                           } else if(count>10){
                               val = val.slice(0, -2);
                           }
                           return val + count;
                       });
                       $(clone).find('#cloning-discount > p >span:last').attr('id', function(i, val) {
                           if(count<=10){
                               val = val.slice(0, -1);
                           } else if(count>10){
                               val = val.slice(0, -2);
                           }
                           return val + count;
                       });
                       $(clone).find('#cloning-tax > p >span:last').attr('id', function(i, val) {
                           if(count<=10){
                               val = val.slice(0, -1);
                           } else if(count>10){
                               val = val.slice(0, -2);
                           }
                           return val + count;
                       });
                       $(clone).find('#cloning-total > p >span:last').attr('id', function(i, val) {
                           if(count<=10){
                               val = val.slice(0, -1);
                           } else if(count>10){
                               val = val.slice(0, -2);
                           }
                           return val + count;
                       });
                       $(clone).attr('id', function(i, val) {
                           if(count<=10){
                               val = val.slice(0, -1);
                           } else if(count>10){
                               val = val.slice(0, -2);
                           }
                           return val + count;
                       });
                       $(clone).find(':input').val("");
                       $(clone).find('select').val("0");

                       $('#clone-this-div'+clonedNum).after(clone);
                       clonedNum++;
                       }
                            if(productAdded!=clonedNum){productAdded++;}
                           $('#cloning-item'+productAdded+'').val(data.success.productName);
                           $('#cloning-quantity'+productAdded+'').val(data.success.quantity);
                           $('#cloning-price'+productAdded+'').val(data.success.price);
                           var subtotal = (data.success.price * data.success.quantity).toFixed(2);
                           $('#cloning-subtotal'+productAdded+'').text('$'+subtotal);
                           var tax = (data.success.gst_price * data.success.quantity).toFixed(2);
                           $('#cloning-tax'+productAdded+'').text('$'+tax);
                           var total = (parseFloat(subtotal) + parseFloat(tax)).toFixed(2);
                           $('#cloning-total'+productAdded+'').text('$'+total);
// -------------------------------------- Summary Subtotal and others -------------------------------
                           var summarySub = $('#summary-subtotal').text();
                           summarySub = summarySub.substr(1);
                           var summarySubtotal = (parseFloat(subtotal) + parseFloat(summarySub)).toFixed(2);
                           $('#summary-subtotal').text('$'+summarySubtotal);

//                       ---------------- Invoice Tax ----------------------

                           var summaryInvTax = $('#summary-invoice-tax').text();
                           summaryInvTax = summaryInvTax.substr(1);
                           var summaryInvoiceTax = (parseFloat(tax) + parseFloat(summaryInvTax)).toFixed(2);
                           $('#summary-invoice-tax').text('$'+summaryInvoiceTax);

//                       ---------------- Total ----------------------

                           var summaryTot = $('#summary-total').text();
                           summaryTot = summaryTot.substr(1);
                           var summaryTotal = (parseFloat(total) + parseFloat(summaryTot)).toFixed(2);
                           $('#summary-total').text('$'+summaryTotal);
                       productAdded++;

                   }
               }
           });
       } else {
           console.log ("There is an error to add product.");
       }

        }
        //------------------------------Datepicker--------------------------------------

        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
        $('#datepicker2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
    </script>
    @endsection