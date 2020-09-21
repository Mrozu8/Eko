<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <title>Faktura {{ $buy->invoice }}</title>
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
        <p style="text-align: left; font-size: 18px;">Faktura zakupu</p>
        <p style="text-align: right; font-size: 18px;">{{ $buy->created_at->format('Y-m-d H:i') }}</p>
    </div>
    <div class="invoice-number">
        <h2 style="text-align: center;">{{ $buy->invoice }}</h2>
    </div>
    <div class="buyer-data">
        <div class="buy" style="float: right;">
            <p style="font-size: 18px;">Dane sprzedającego</p>
            <ul>
                <li>Nip: {{ $buy->nip }}</li>
                <li>Sprzedający: {{ $buy->dealer_name }}</li>
                <li>Adres: {{ $buy->address }}</li>
            </ul>
        </div>
        <p style="font-size: 18px;">Dane kupującego</p>
        <ul>
            <li>Nip: {{ $settings->nip }}</li>
            <li>Sprzedający: {{ $settings->name }}</li>
            <li>Adres: {{ $settings->address }}</li>
        </ul>
    </div>
    <div class="sale-item">
        <p style="font-size: 18px;">Sprzedane produkty</p>
        <table>
            <thead>
            <tr>
                <th style="padding-left: 14px; padding-right: 14px;">Kod</th>
                <th style="padding-left: 14px; padding-right: 14px;">Nazwa</th>
                <th style="padding-left: 14px; padding-right: 14px;">Producent</th>
                <th style="padding-left: 14px; padding-right: 14px;">Ilość</th>
                <th style="padding-left: 14px; padding-right: 14px;">Cena za szt.</th>
                <th style="padding-left: 14px; padding-right: 14px;">Brutto</th>
                <th style="padding-left: 14px; padding-right: 14px;">Razem brutto</th>
            </tr>
            </thead>
            <tbody>
            @foreach($buy->buy_item as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->supplier }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_price }} zł</td>
                    <td>{{ $item->unit_price*1.23 }} zł</td>
                    <td>{{ ($item->unit_price * $item->quantity * 1.23) }} zł</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="sum">
        <h3 style="text-align: right;">Łącznie brutto: {{ $buy->cost }} zł</h3>
    </div>
</div>

</body>
</html>
