<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <title> {{ $repair->repair_number }}</title>
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
        <p style="text-align: left; font-size: 18px;">Zlecenie</p>
        <p style="text-align: right; font-size: 18px;">{{ $repair->created_at->format('Y-m-d H:i') }}</p>
    </div>
    <div class="invoice-number">
        <h2 style="text-align: center;">{{ $repair->repair_number }}</h2>
    </div>
    <div class="buyer-data">
        <p style="font-size: 18px;">Dane klienta</p>
        <ul>
            <li>Nip: {{ $repair->nip }}</li>
            <li>Klient: {{ $repair->dealer_name }}</li>
            <li>Adres: {{ $repair->address }}</li>
            <li>Telefon (1): {{ $repair->phone_one }}</li>
            <li>Telefon (2): {{ $repair->phone_two }}</li>
        </ul>
        <p>Informacje dodatokwe:</p>
        <p>{{ $repair->customer_note }}</p>
    </div>

    <div class="repair-data">
        <p style="font-size: 18px;">Dane naprawy</p>
        <ul style="float: right; padding-top: 20px;">
            <li>Model: {{ $repair->model }}</li>
            <li>Kod (1): {{ $repair->code_first }}</li>
            <li>Kod (2): {{ $repair->code_second }}</li>
            <li>Numer seryjny: {{ $repair->serial_number }}</li>
        </ul>
        <ul>
            <li>Producent: {{ $repair->supplier }}</li>
            <li>Data sprzedaży: {{ $repair->sale_date }}</li>
            <li>Data naprawy: {{ $repair->repair_date }}</li>
            <li>Gwarancja: {{ $repair->warrant }}</li>
        </ul>
        <p>Opis usterki:</p>
        <p>{{ $repair->damage_note }}</p>
    </div>

    <hr>

    <div class="sale-item">
        <p style="font-size: 18px;">Wykorzystane części</p>
        <table>
            <thead>
            <tr>
                <th style="padding-left: 65px; padding-right: 65px;">Kod części</th>
                <th style="padding-left: 113px; padding-right: 113px;">Nazwa</th>
                <th style="padding-left: 25px; padding-right: 25px;">Ilość</th>
                <th style="padding-left: 30px; padding-right: 30px;">Cena za szt.</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                   <td style="height: 40px;"></td>
                   <td></td>
                   <td></td>
                   <td></td>
                </tr>
                <tr>
                    <td style="height: 40px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="height: 40px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="height: 40px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="height: 40px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="sale-item" style="margin-top: 50px;">
        <p style="font-size: 18px;">Podsumowanie</p>
        <table>
            <thead>
            <tr>
                <th style="padding-left: 50px; padding-right: 50px;">Robocizna</th>
                <th style="padding-left: 50px; padding-right: 50px;">Koszt dojazdu</th>
                <th style="padding-left: 35px; padding-right: 35px;">Wykonano</th>
                <th style="padding-left: 80px; padding-right: 80px;">Technik</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="height: 40px;"></td>
                <td></td>
                <td>Tak / Nie</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="note">
        <p style="font-size: 18px;">Notatki:</p>
    </div>



</div>

</body>
</html>
