<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.css">
    <title>Paises</title>
</head>
<body>
    
    <h1>Lista de paises</h1>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Pais</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Poblacion</th>
                <th>Ciudades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
            <tr>
                <td>
                    {{  $pais }}
                </td>
                <td>
                    {{  $infopais["capital"] }}
                </td>
                <td>
                    {{  $infopais["moneda"] }}
                </td>
                <td>
                    {{  $infopais["poblacion"] }}
                </td>
                <td>
                    @foreach($infopais["ciudades"] as $ciudad)

                    <li>{{   $ciudad   }}</li>

                    @endforeach
                
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>

<style>
    h1{
        text-align-last: center;
    }
    body{
        background-color: darkgrey;
    }
    table{
        border: solid 5px;
        background-color: lightseagreen;
        font-size: 20px;
    }
    th{
        color: mediumspringgreen;
    }
</style>