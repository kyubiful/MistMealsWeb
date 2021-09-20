<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Mist Meals - Menú</title>
    <link rel="icon" href="img/favicon_mistmeals.png" type="image/png">
    <style type="text/css">
            </style>
</head>

<body style="font-family:Verdana, Geneva, Tahoma, sans-serif;">
    <section style="width: 80%; margin: 0 auto;">
        <div>
            <p style="text-align: center;"><img style="width: 500px;" src="img/otros/MistMealsLogoEtoqieta.png" alt=""></p>
        </div>
        <div style="border-bottom: 3px solid black;">
            <h1 style="font-size: 30px; text-align: center; margin-top: -20px;">{{ $nombre }} - {{ $plato_peso }}</h1>
        </div>
        <div>
            <p><b>INGREDIENTES </b> {{ $ingredientes }}</p>
            <p><b>ALÉRGENOS: </b> @foreach($alergenos as $alergeno) {{ $alergeno }} @endforeach</p>
            <p><b>MODO DE PREPARACIÓN: </b> {{ $receta }}</p>
            <p style="text-align: right;">Peso Neto Aproximado: <b style="font-size: 24px;"> {{ $peso }}g</b></p>
        </div>
        <div style="margin-top: -50px;">
            <p><b>INFORMACIÓN NUTRICIONAL</b></p>
        </div>
        <div>
            <table style="width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <td style="width: 40%;"></td>
                        <td style="width: 30%; text-align: right;">(Por 100g)</td>
                        <td style="width: 30%; text-align: right;">(Por Plato)</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">Valor Energético:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $energia }} Kcal</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $energia_peso }} Kcal</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">Grasas:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $grasas }} g</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $grasas_peso }} g</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">de las cuales saturadas:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $saturadas }} g</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $saturadas_peso }} g</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">Carbohidratos:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $carbohidratos }} g</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $carbohidratos_peso }} g</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">de los cuales azúcares:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $azucares }} g</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $azucares_peso }} g</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">Proteínas:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $proteinas }} g</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $proteinas_peso }} g</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid black; padding: 5px;">Sal:</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $sales }} g</td>
                        <td style="border-bottom: 2px solid black; padding: 5px; text-align: right;">{{ $sales_peso }} g</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px;">Fibra:</td>
                        <td style="padding: 5px; text-align: right;">{{ $fibra }} g</td>
                        <td style="padding: 5px; text-align: right;">{{ $fibra_peso }} g</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="border-top: 3px solid black; border-bottom: 3px solid black; margin-top: 60px;">
            <p style="text-align: center;"><b>Elaborado por FUNDACIÓN JUAN XXIII</b></p>
            <p style="text-align: center; margin-top: -10px; margin-bottom: 30px;">Avd. Gran Vía del Este, no1 28032 Madrid NoRGS 26.11456/M</p>
        </div>
        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="width: 50%; text-align: center;">Lote</td>
                <td style="width: 50%; text-align: center;">Consumir antes del</td>
            </tr>
        </table>
        <div style="position: absolute; bottom: 0px;">
            <p style="text-align: center;">Conservar entre 3ºC y 5ºC</p>
            <p style="text-align: center;">Plato envasado en atmósfera protectora</p>
        </div>
    </section>
</body>
</html>
