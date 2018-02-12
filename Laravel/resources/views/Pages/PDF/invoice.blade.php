<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('dist/invoice-pdf/style.css') }}"/>

</head>

<body style="width: 695px; margin: auto; background-color: white; height: 842px; border: 1px solid black">
<div id="wrapper" style="">
    <div class="top-header">
        <table id="header" align="center" width="100%">
            <tr>
                <td>
                    <img src="{{ asset('dist/invoice-pdf/img/company-logo.jpg') }}" width="120" height="60">
                    <p>
                        Company Name <br>
                        ABN 95 088 011 536
                    </p>
                </td>
                <td align="center" style="vertical-align: bottom;">
                    <h2>Invoice</h2>
                </td>
                <td>
                    <ul>
                        <li>Invoice:<span>793100836</span></li>
                        <li>Issue Date:<span>25 Feb 17</span></li>
                        <li>Period:<span>23 Jan 17 to 22 Feb 17</span></li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
    <div class="customer-details">
        <table width="100%" style="margin: auto;">
            <tr>
                <td width="50%">
                    <p>
                        Customer Name:<br>
                        Customer Address Line 1 <br>
                        Customer Address Line 1 <br>
                        Suberb <br>
                        Post Code
                    </p>
                </td>
                <td width="50%" style="text-align: center;">
                    <p  style="float: right;background-color: #00A5AF;padding: 2%;box-shadow: 3px 3px 3px #888888;">
                        <span style="color: #FFD153">Account number</span> <br>
                        <span style="color: #fff">80850 7508 7001 82</span>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <div id="bills" width="100%" align="center">
        <ul>
            <li>
                <p>
                    <span class="color-title"><b>TOTAL OUTSTANDING</b></span><br>
                    <span class="amount">$410.20</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="color-title"><b>LAST BILL</b></span><br>
                    <span class="amount">$410.20</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="color-title"><b>BALANCE</b></span><br>
                    <span class="amount">$410.20</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="color-title"><b>THIS BILL</b></span><br>
                    <span class="amount">$410.20</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="color-title"><b>TOATAL AMOUNT DUE</b></span><br>
                    <span class="amount">$410.20</span>
                </p>
            </li>
        </ul>
    </div>
    <div class="" style="top:0">
        <table width="100%">
            <tr>
                <td width="50%" style="padding: 0 0 0 15px;">
                    <p><span style="font-family: Arial,Helvetica;"><b>Registered Online Email:</b></span> <span><a href="">vijayjamesmani@gmail.com</a></span></p>
                </td>
                <td width="50%" style="text-align: right; font-size: 9px;">
                    <p style="float: right; padding: 10px 5px; background: #00A5AF; border-radius: 6px;box-shadow: 3px 3px 3px #888888;">
                        <span style="color: #FFD153">THIS BILL DUE DATE</span><br>
                        <span style="color: #fff">27 Mar 2017</span>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="account-summery" style="width: 100%;">
        <div class="" style="width: 50%; margin-left: 49%;">
            <table width="100%">
                <tr>
                    <td class="color-title"><b>YOUR ACCOUNT SUMMARY</b></td>
                    <td>$</td>
                </tr>
                <tr>
                    <td class="color-title"><b>LAST BILL</b></td>
                    <td>$410.20</td>
                </tr>
                <tr>
                    <td class="color-title"><b>PAYMENTS &amp; ADJUSTMENTS</b></td>
                    <td>$415.21CR</td>
                </tr>
                <tr>
                    <td class="color-title"><b>BALANCE</b></td>
                    <td>$5.01CR</td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <br>
    <div class="product-list" style="width:70%;margin-top: 10px; display: block;">
        <table width="95%" border="1" rules="all" style="margin: auto" >
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Tax</th>
                <th>Dsicount</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>2</td>
                <td>20$</td>
                <td>20$</td>
                <td>5$</td>
                <td>2&</td>
                <td>23$</td>
            </tr>
        </table>
    </div>
    <div class="bill-summary" style="width:30%;margin-top: 10px; display: block;">
        <table width="95%" style="margin: auto" >
            <tr>
                <td></td>
                <td>$81.81</td>
            </tr>
            <tr>
                <td><b></b></td>
                <td><b></b></td>
            </tr>
            <tr>
                <td><b></b></td>
                <td><b>$79.46</b></td>
            </tr>
            <tr>
                <td><b></b></td>
                <td><b>$7.95</b></td>
            </tr>
            <tr>
                <td><b>SUB-TOTAL GST</b></td>
                <td><b>$87.41</b></td>
            </tr>
            <tr>
                <td><b>TOTAL THIS BILL</b></td>
                <td><b>$82.40</b></td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="footer">
        <table align="center">
            <tr>
                <td>
                    <h3>BPAY®</h3>
                    <p>
                        Pay from your savings account
                        via internet or phone banking.
                        More info <b>www.bpay.com.au</b>
                    </p>
                </td>
                <td>
                    <h3>Direct Debit</h3>
                    <p>
                        Set up Direct Debit to have the
                        total amount due deducted from
                        your nominated savings, or credit/debit card
                        on the due date. To apply or for more details
                        go to <b>www.optus.com.au/directdebit</b>
                    </p>
                </td>
                <td>
                    <h3>Credit Card*</h3>
                    <p>
                        Call Optus on <b>1300 309 309</b> or <b>SMS</b> 'menu' to <b>9999</b> from your Optus mobile.
                        Online <b>www.optus.com.au</b>
                        Visit the <b>"Pay Your Bill"</b> option.
                        Please note transaction limits apply.
                    </p>
                </td>
                <td>
                    <h3>POST billpay®</h3>
                    <p>
                        Pay in-store at Australia Post.
                        A transaction fee of $1.75 will
                        apply to these payments.
                    </p>
                </td>
            </tr>
        </table>

    </div>
</div>

</body>
</html>
