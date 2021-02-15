<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
                    .clearfix:after {
                    content: "";
                    display: table;
                    clear: both;
                    }

                    a {
                    color: #5D6975;
                    text-decoration: underline;
                    }

                    body {
                    position: relative;
                    width: 21cm;  
                    height: 29.7cm; 
                    margin: 0 auto; 
                    color: #001028;
                    background: #FFFFFF; 
                    font-family: Arial, sans-serif; 
                    font-size: 12px; 
                    font-family: Arial;
                    }

                    header {
                    padding: 10px 0;
                    margin-bottom: 30px;
                    }

                    #logo {
                    text-align: center;
                    margin-bottom: 10px;
                    }

                    #logo img {
                    width: 90px;
                    }

                    h1 {
                    border-top: 1px solid  #5D6975;
                    border-bottom: 1px solid  #5D6975;
                    color: #5D6975;
                    font-size: 2.4em;
                    line-height: 1.4em;
                    font-weight: normal;
                    text-align: center;
                    margin: 0 0 20px 0;
                    background: url(dimension.png);
                    }

                    #project {
                    float: left;
                    }

                    #project span {
                    color: #5D6975;
                    text-align: right;
                    width: 52px;
                    margin-right: 15px;
                    display: inline-block;
                    font-size: 0.9em;
                    }

                    #company {
                    float: right;
                    text-align: right;
                    }

                    #project div,
                    #company div {
                    white-space: nowrap;        
                    }

                    table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    margin-bottom: 20px;
                    }

                    table tr:nth-child(2n-1) td {
                    background: #F5F5F5;
                    }

                    table th,
                    table td {
                    text-align: center;
                    }

                    table th {
                    padding: 5px 20px;
                    color: #5D6975;
                    border-bottom: 1px solid #C1CED9;
                    white-space: nowrap;        
                    font-weight: normal;
                    }

                    table .service,
                    table .desc {
                    text-align: center;
                    }

                    table td {
                    padding: 20px;
                    text-align: center;
                    }

                    table td.service,
                    table td.desc {
                    vertical-align: top;
                    }

                    table td.unit,
                    table td.qty,
                    table td.total {
                    font-size: 1.2em;
                    }

                    table td.grand {
                    border-top: 1px solid #5D6975;;
                    }

                    #notices .notice {
                    color: #5D6975;
                    font-size: 1.2em;
                    }

                    footer {
                    color: #5D6975;
                    width: 100%;
                    height: 30px;
                    position: absolute;
                    bottom: 0;
                    border-top: 1px solid #C1CED9;
                    padding: 8px 0;
                    text-align: center;
                    }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="assets/img/r1.png">
      </div>
      <h1>INVOICE #{{$invoice->invoice}}</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>Customer Name:</span> {{$invoice->customer->nama_customer}}</div>
        <div><span>ADDRESS:</span> {{$invoice->customer->address}}</div>
        <div><span>EMAIL:</span> {{$invoice->customer->email}}</div>
        <div><span>PHONE:</span> {{$invoice->customer->phone}}</div>
        <div><span>DATE</span>{{ $invoice->created_at->format('d-M-Y') }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ITEM</th>
            <th class="desc">Price</th>
            <th>QTY</th>
            <th>DISCOUNT PERITEM</th>
            <th>TOTAL * QTY</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($invoice->sale_detail as $row)
            <tr>
                <td class="service">{{$row->item->nama_item}}</td>
                <td class="unit">Rp.{{number_format($row->price)}}</td>
                <td class="qty">{{$row->qty}}</td>
                <td class="qty">Rp.{{ number_format($row->discount_item)}}</td>
                <td class="total">Rp.{{number_format($row->total)}} </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">Sub Total</td>
                <td class="total">Rp.{{number_format($invoice->total_price)}}</td>
              </tr>
              <tr>
                <td colspan="4">Discount Global</td>
                <td class="total">Rp.{{number_format($invoice->discount)}}</td>
              </tr>
              <tr>
                <td colspan="4">Grand Total</td>
                <td class="grand total">Rp.{{number_format($invoice->final_price)}}</td>
              </tr>
        </tbody>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
        YR Corporate.
           Jakarta Selatan, Pejaten - 
             085343966997 -
             support@yr.id
         
    </footer>
  </body>
</html>