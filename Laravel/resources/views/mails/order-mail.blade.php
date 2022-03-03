<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Hi {{$order->name}}</h1>
    <p>Order Added Successfuly</p>
    <table>
        <tr>
            <th>Total Price</th>
            <td>{{$order->price}}</td>
        </tr>
        <tr>
            <th>Order Discount</th>
            <td>{{$order->discount}}</td>
        </tr>
    </table>
</body>
</html>