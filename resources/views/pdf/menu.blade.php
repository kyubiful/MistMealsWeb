<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Mist Meals - Menú</title>
    <link rel="icon" href="img/favicon_mistmeals.png" type="image/png">
    <style type="text/css">
        @font-face {
            font-family: 'CoreSansC35';
            src: url({{ public_path('fonts/CoreSansC-35Light.ttf') }}) format('truetype');
        }

        @font-face {
            font-family: 'CoreSansC65';
            src: url({{ public_path('fonts/CoreSansC-65Bold.ttf') }}) format('truetype');
        }

        @font-face {
            font-family: 'TuskerGrotesk35';
            src: url({{ public_path('fonts/TuskerGrotesk-3500Medium.ttf') }}) format('truetype');
        }

        @font-face {
            font-family: 'TuskerGrotesk65';
            src: url({{ public_path('fonts/TuskerGrotesk-6500Medium.ttf') }}) format('truetype');
        }

        @page {
            margin: 0;
        }

        .page-break {
            page-break-after: always;
        }

        body {
            font-family: 'CoreSansC35', sans-serif;
            background-color: #000000;
            color: #F9F2E1;
            padding: 50px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        img.claim {
            position: absolute;
            top: 150px;
            left: 150px;
        }

        img.tag {
            position: absolute;
            top: 0;
            left: 0;
        }

        img.tag-bottom {
            position: absolute;
            top: 610px;
            left: 820px;
        }

        .top .user {
            font-family: 'CoreSansC35', sans-serif;
            font-size: 8pt;
            position: absolute;
            top: 80px;
            right: 230px;
            padding: 15px 25px;
            border: 1px solid #F9F2E1;
            width: 220px;
        }

        .top .user .bold {
            font-family: 'CoreSansC65', sans-serif;
        }

        .top img.logo {
            position: absolute;
            width: 120px;
            height: 120px;
            top: 80px;
            right: 80px;
        }

        .middle {
            position: relative;
            top: 250px;
            z-index: 999;
        }

        .middle table, .middle th, .middle td {
            border: 1px solid #F9F2E1;
            border-collapse: collapse;
            text-align: center;
        }

        .middle td {
            width: 80px;
        }

        .middle th, .middle td {
            padding: 0 5px;
        }

        .middle table .table-title {
            font-family: 'TuskerGrotesk35', sans-serif;
            font-size: 18pt;
        }

        .middle table .table-content {
            font-family: 'CoreSansC35', sans-serif;
            font-size: 6.5pt;
        }

        .middle table .table-content.table-food {
            padding: 10px 20px;
        }

        .middle table .table-content img {
            width: 45px;
            height: 45px;
            margin-bottom: 10px;
        }

        .middle table .table-result {
            font-family: 'TuskerGrotesk65', sans-serif;
            font-size: 13pt;
        }

        .middle table tr:first-child td:nth-child(1) {
            border-top: 1px solid #000000;
            border-left: 1px solid #000000;
        }

        .middle .info {
            font-family: 'CoreSansC35', sans-serif;
            font-size: 7pt;
            margin-top: 10px;
        }

        .middle .info p {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
@if($user->objetivo_id == 1)
    <img class="claim" src="img/pdf/fighter_menu.jpg">
@elseif($user->objetivo_id == 2)
    <img class="claim" src="img/pdf/keeper_menu.jpg">
@elseif($user->objetivo_id == 3)
    <img class="claim" src="img/pdf/promoter_menu.jpg">
@endif
<div class="page-break"></div>
@if($user->objetivo_id == 1)
    <img class="tag" src="img/pdf/fighter_claim.png">
@elseif($user->objetivo_id == 2)
    <img class="tag" src="img/pdf/keeper_claim.png">
@elseif($user->objetivo_id == 3)
    <img class="tag" src="img/pdf/promoter_claim.png">
@endif
<div class="top">
    <div class="user">
        <ul>
            <li><span class="bold">Nombre:</span> {{ $user->name }}</li>
            <li><span class="bold">Peso (kg):</span> {{ $user->peso }}</li>
            <li><span class="bold">Altura (cm):</span> {{ $user->altura }}</li>
            <li><span class="bold">Edad (años):</span> {{ $user->edad }}</li>
            <li><span class="bold">Sexo:</span> {{ $user->sexo->nombre }}</li>
            <li><span class="bold">Nivel de ejercicio:</span> {{ $user->nivel_ejercicio->nombre }}</li>
            <li><span class="bold">Objetivo:</span> {{ $user->objetivo->nombre }}</li>
        </ul>
    </div>

    @if($user->objetivo_id == 1)
        <img class="logo" src="img/pdf/fighter_logo.png">
    @elseif($user->objetivo_id == 2)
        <img class="logo" src="img/pdf/keeper_logo.png">
    @elseif($user->objetivo_id == 3)
        <img class="logo" src="img/pdf/promoter_logo.png">
    @endif
</div>
<div class="middle">
    <table>
        <tr>
            <td></td>
            <td class="table-title">LUNES</td>
            <td class="table-title">MARTES</td>
            <td class="table-title">MIERCOLES</td>
            <td class="table-title">JUEVES</td>
            <td class="table-title">VIERNES</td>
            <td class="table-title">SABADO</td>
            <td class="table-title">DOMINGO</td>
        </tr>
        <tr>
            <td class="table-title">COMIDA</td>
            @foreach($lunch as $i => $el)
                <td class="table-content table-food">
                    <div><img src="{{ $el->getUrlImagePdfAttribute() }}"></div>
                    <div>{{ $el->nombre }}</div>
                </td>
            @endforeach
        </tr>
        <tr>
            <td class="table-title">CENA</td>
            @foreach($dinner as $i => $el)
                <td class="table-content table-food">
                    <div><img src="{{ $el->getUrlImagePdfAttribute() }}"></div>
                    <div>{{ $el->nombre }}</div>
                </td>
            @endforeach
        </tr>
        <tr>
            <td class="table-title">TOTAL KCAL</td>
            @foreach($lunch as $i => $el)
                <td class="table-result">{{ round( $lunch[$i]->calorias +  $dinner[$i]->calorias, 0 ) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="table-title">RESTO*</td>
            @foreach($lunch as $i => $el)
                <td class="table-result">{{ round( $user->calorias_propuestas - ($lunch[$i]->calorias +  $dinner[$i]->calorias), 0 ) }}</td>
            @endforeach
        </tr>
    </table>
    <div class="info">
        <p>*Se recomienda completar las calorías con el desayuno y un almuerzo.</p>
        <p>**Se recomienda tomar algún complemento alimentario para completar las calorías requeridas.</p>
    </div>
</div>
@if($user->objetivo_id == 1)
    <img class="tag-bottom" src="img/pdf/fighter_claim1.png">
@elseif($user->objetivo_id == 2)
    <img class="tag-bottom" src="img/pdf/keeper_claim1.png">
@elseif($user->objetivo_id == 3)
    <img class="tag-bottom" src="img/pdf/promoter_claim1.png">
@endif
</body>
</html>
