@extends('layouts.dashboard_header')
@section('content')
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Inventory</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="all,follow">
		<!-- Bootstrap CSS-->
		<link rel="stylesheet" href="../inventory_css/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
		<!-- Google fonts - Roboto -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
		<!-- theme stylesheet-->
		<link rel="stylesheet" href="../inventory_css/css/style.default.css" id="theme-stylesheet">
		<!-- jQuery Circle-->
		<link rel="stylesheet" href="../inventory_css/css/grasp_mobile_progress_circle-1.0.0.min.css">
		<!-- Custom stylesheet - for your changes-->
		<link rel="stylesheet" href="../inventory_css/css/custom.css">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/favicon.ico">
		<!-- Font Awesome CDN-->
		<!-- you can replace it by local Font Awesome-->
		<script src="https://use.fontawesome.com/99347ac47f.js"></script>
		<!-- Font Icons CSS-->
		<link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<link rel="stylesheet" href="../inventory_css/css/inventory.css">
		<!-- Tweaks for older IEs--><!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<style>
            .active-menu
            {
                background:#107f32;
            }
	        .menu-btn
            {
                display:none;
            }
            .dropdown-menu>li>a, .dropdown-menu>li>a {
                width:100%;
                color:#33b35a;
            }
            .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
                color: #ffffff;
                text-decoration: none;
                background-color: #33b35a;
            }
            .container-fluid {
                padding: 0 10px;
            }
           



            .subtab1 td
            {
                border-top:none;
                font-size: 14px;
                padding-top: 5px;
                color: #000000;
            }
            .subtr1
            {
                border:1px solid #000000;
                border-bottom: 1px solid #000000;
                color: #000000;
            }
            .subtr2
            {
                border-bottom: 1px solid #ead9d9;
                color: #000000
            }
            .subtr0
            {
                border-bottom: 1px solid #000000;
                color: #000000;
            }
            .table thead th {
                border-bottom: 1px solid #000000;
                border-top: 1px solid #000000;
                color: #000000;
            }
            .card
            {
                width: 98%;
            }
            @media print {
              body * {
                visibility: hidden;
              }
              #section-to-print, #section-to-print * {
                visibility: visible;
              }
              #section-to-print {
                position: absolute;
                left: 0;
                top: -100px;
              }
            }
            thead
            {
               /* display: block;*/
                display: table-header-group;
            }
            tr {page-break-inside: avoid;}
            tfoot
            {
                /*display: block;*/
                display: table-footer-group;
            }
            .table thead th {
                background-color: #b6bbc0;
            }
            .bottom-table
            {
                page-break-inside: avoid;
            }
        </style>
	</head>
	<body>
		<!-- Side Navbar -->
		
		<div class="page home-page" style="width:100%;">
          <!-- Header Section-->
		
 
		<section class="forms" style="margin-top:110px;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
                            <div class="card-block"  id="section-to-print">
                                <div class="col-sm-12">
                                    <h1 style="text-align:center;">Sri Balaji Interiors</h1>
                                    <hr style="border-color: #101010;">
                                    <table style="width: 100%;color: #000000;
                                    +">
                                        <tr>
                                            <td style="width: 71%;"></td>
                                            <td colspan="2">
                                                <H6>Ultimate Solutions in Interiors</H6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Original</td>
                                            <td>: Buyer</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Duplicate</td>
                                            <td>: Transporter</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Triplicate</td>
                                            <td>: Seller</td>
                                        </tr>
                                    </table>
                                </div>
                                <h4><center> </center></h4>
                                <div class="col-sm-12">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td class="subtr1" style="width: 50%;" rowspan="2">
                                                <b>Sri Balaji Interiors</b><br>
                                                No-025, 1st Floor, 3rd Main<br>
                                                5th Cross, Dollars Colony<br>
                                                BTM 2nd Stage, Bangalore - 76
                                            </td>
                                            <td class="subtr1">
                                                Invoice No.<br>
                                                SBI- /
                                            </td>
                                            <td class="subtr1">
                                                Dated<br>
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subtr1">
                                                Delivery Note<br>

                                            </td>
                                            <td class="subtr1">
                                                Terms of Payment:<br>
                                                $invoice->terms_of_payment
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subtr1" rowspan="2">
                                                <b>Branch Office:</b>
                                               $invoice->branch
                                            </td>
                                            <td class="subtr1">Supplier's Ref</td>
                                            <td class="subtr1">
                                                Other Reference(s):
                                                <br>  
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subtr1">
                                                Buyer's Order No.<br>
                                                <table style="color:#000000">
							               
							               

             <tr>
							                    <td> PO No:$purchase_order->project_name/</td>
							                   
							                </tr>


							                
						
	               
							            </table>
                                            </td>
                                            <td class="subtr1">Dated:<table style="color:#000000">
							               
							               
             <tr>
							                   
							                    <td></td>
							                </tr>
							            					                
						
	               
							            </table></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="subtr1" rowspan="2">
                                                <b>consignee</b><br>
                                               
                                            </td>
                                            <td class="subtr1">
                                                Dispatch Document No. <br>
                                                E Way Bill No. : $invoice->dispatch_doc_no
                                            </td>
                                            <td class="subtr1">
                                                Dated<br>
                                                $invoice->dispatch_no_date
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="subtr1" colspan="2">
                                                <b>Destination</b><br>
                                                 $invoice->destination
                                               
                                            </td>
                                        </tr>
                                    </table>
                                    <table style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="subtr1">Sl No.</th>
                                                <th class="subtr1">Particulars</th>
                                                <th class="subtr1">HSN</th>
                                                <th class="subtr1">Unit</th>
                                                <th class="subtr1">Qty</th>
                                                <th class="subtr1">Rate</th>
                                                <th class="subtr1">Taxable Value %</th>
                                                <th class="subtr1">Rate of Taxes</th>
                                                <th class="subtr1">$invoice->gst_type @ %</th>
                                                <th class="subtr1">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            
                                           
                                            <tr>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"><b>Transportation Charges</b></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"><b>Grand Total</b></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"></td>
                                                <td class="subtr1"><b>$invoice->grand_total</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="bottom-table" style="width: 100%;color: #000000;">
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" class="subtr1">
                                                    Amount Chargeable(Rupees):<b>$invoice->grand_total</b><br>
                                                    Amount Chargeable(In Words):
											
                                                    <br>
                                                    Company's GST TIN No: 29ABEFS4898K1Z9
                                                    <BR>
                                                </td>
                                                <td class="subtr1">
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td class="subtr1">
                                                    For Sri Balaji Interiors
                                                    <br>
                                                    Authorized Signatory
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="width: 100%;display: block;bottom: 0px;color: #000000;font-size: 12px;">
                                        <br>
                                        <br>
                                        <hr style="border-bottom: 1px solid #000000;">
                                        <center><b>No. 25, 1st Floor, 3rd Main, 5th Cross, Dollars Colony, BTM 2nd Stage, Bangalore-560076</b></center>
                                        <center><b>Branch Off: No 69, Kaverappa Industrial Estate, NS Palya, BTM 2nd Stage, Bangalore-76</b></center>
                                        <center><b>Ph No : 080-41202197 / 4097903</b></center>
                                        <center><b>Email : ram@sribalajiinteriors.com, mailto : info@sribalajiinteriors.com</b></center>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            section-to-print
                                <center><a href="javascript:window.print()"  class="btn btn-danger btn-flat"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Print </a></center>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endforeach	
	<!-- Javascript files-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="../inventory_css/https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="../inventory_css/js/tether.min.js"></script>
	<script src="../inventory_css/js/bootstrap.min.js"></script>
	<script src="../inventory_css/js/jquery.cookie.js"> </script>
	<script src="../inventory_css/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
	<script src="../inventory_css/js/jquery.nicescroll.min.js"></script>
	<script src="../inventory_css/js/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<script src="../inventory_css/js/front.js"></script>
	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
	<!---->
	<script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable({ "bInfo" : false});
        });
    </script>
@endsection