<!DOCTYPE html>
<html lang="en">
    <head>
        <title>service</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h2>Have a peak at our services</h2>
        @if($running==1)

        <p>This are the services we provide: </p>
        <table border = "2">
            <thead>
                <th>Name</th>
                <th>Price</th>
            </thead>
            <tbody>
                @foreach($services as $s)
                <tr>
                    <td> {{ $s['name'] }} </td>
                    <td> {{ $s['price'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>We are not providing any services right now</p>
        @endif
    </body>
</html>