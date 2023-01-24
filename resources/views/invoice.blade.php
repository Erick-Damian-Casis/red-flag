<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{public_path('css/styles.css')}}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
        Soy tu factura
        <table class="table  rounded-2">
            <thead class="border rounded-3">
            <tr >
                <th class="text-start border producto"><p>Descripcion</p></th>
                <th class="text-start border producto"><p>U.</p></th>
                <th class="text-start border producto"><p>V.U</p></th>
                <th class="text-end border producto"><p>V.T</p></th>
            </tr>
            </thead>
            <tbody class="text-start">
            @foreach ($cars as $car)
            <tr>
                <td>
                    <p>{{ $car->product->name }}</p>
                </td>
                <td class="text-start border">
                    <p>{{ $car->amount }}</p>
                </td>
                <td class="text-start border">
                    <p>{{ $car->product->price_discount }}</p>
                </td>
                <td class="text-start border">
                    <p>{{ $car->total_price }}</p>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="container border p-2 border total info_total">
            <div class="col-12 col-md-12 row">
                <div class="col-10">
                    <p class=" text-end text-black value">Sub Total:</p>
                </div>
                <div class="col-1 text-end">
                    <p  class=" text-black pvalue">100$</p>
                </div>
            </div>

            <div class="col-12 row ">
                <div class="col-10">
                    <p class=" text-end  text-black value">IVA: 12%</p>
                </div>
                <div class="col-1 text-end">
                    <p class=" text-black pvalue">???</p>
                </div>
            </div>
            <div class="col-12 row">
                <div class="col-10">
                    <p class=" text-end  text-black value">Valor Total:</p>
                </div>
                <div class="col-1 text-end">
                    <p class=" text-black pvalue">100$</p>
                </div>
            </div>
        </div>
</body>
</html>
