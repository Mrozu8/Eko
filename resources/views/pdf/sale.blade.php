<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <title>Faktura {{ $sale->invoice }}</title>
</head>
<style>
    table {
        border-collapse: collapse;
        text-align: center;

    }

    table, th, td {
        border: 1px solid black;
    }

    body {
        font-family: DejaVu Sans;
        font-size: 12px;
    }
</style>
<body>

<div class="container" style="width: 100%;">
    <div class="header" style="display: flex; justify-content: space-around;">
        <p style="text-align: left; font-size: 18px;">Faktura sprzedaży</p>
        <p style="text-align: right; font-size: 18px;">{{ $sale->created_at->format('Y-m-d H:i') }}</p>
    </div>
    <div class="invoice-number">
        <h2 style="text-align: center;">{{ $sale->invoice }}</h2>
    </div>
    <div class="data">
       <div class="sell-data" style="float: right;">
           <p style="font-size: 18px; ">Dane sprzedającego</p>
           <ul >
               <li>Nip: {{ $settings->nip }}</li>
               <li>Kupujący: {{ $settings->name }}</li>
               <li>Adres: {{ $settings->address }}</li>
           </ul>
       </div>
        <p style="font-size: 18px;">Dane kupującego</p>
        <ul>
            <li>Nip: {{ $sale->nip }}</li>
            <li>Kupujący: {{ $sale->buyer_name }}</li>
            <li>Adres: {{ $sale->address }}</li>
        </ul>

    </div>
    <div class="sale-item">
        <p style="font-size: 18px;">Sprzedane produkty</p>
        <table>
            <thead>
               <tr>
                   <th>Kod</th>
                   <th>Nazwa</th>
                   <th>Ilość</th>
                   <th>Cena za szt.</th>
                   <th>Brutto</th>
                   <th>Razem brutto</th>
               </tr>
            </thead>
            <tbody>
                @foreach($sale->sale_item as $item)
                    <tr>
                        <td style="padding-left: 14px; padding-right: 14px;">{{ $item->code }}</td>
                        <td style="padding-left: 14px; padding-right: 14px;">{{ $item->name }}</td>
                        <td style="padding-left: 14px; padding-right: 14px;">{{ $item->quantity }}</td>
                        <td style="padding-left: 14px; padding-right: 14px;">{{ $item->unit_price }} zł</td>
                        <td style="padding-left: 14px; padding-right: 14px;">{{ $item->unit_price*1.23 }} zł</td>
                        <td style="padding-left: 14px; padding-right: 14px;">{{ ($item->unit_price * $item->quantity * 1.23) }} zł</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="sum">
        <h3 style="text-align: right;">Łącznie brutto: {{ $sale->cost }} zł</h3>
    </div>
</div>

</body>
</html>
