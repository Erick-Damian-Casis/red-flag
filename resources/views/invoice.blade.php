<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{public_path('css/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <div class="row navbar">
            <div class="col-md-12 ">
                <div class="col-12 pt-3 px-3">
                    <div class="row col-12 ">
                        <!--INSERTAR EL LOGO DEL PROYECTO-->
                        <div class="col-5 col-md-1 px-2">
                            <img src="" class="img-fluid"  alt="LOGO">
                        </div>

                        <div class="col-7 col-md-10 text-end">
                            <h6 class="titulo">FACTURCA N° {{$sale->id}}</h6>
                            <p class="titulo text-dark">Fecha: {{date("d-m-Y", strtotime($sale->created_at))}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!--CONTENIDO PRINCIPAL-->

    <main>

        <div class="container  rounded-3 mt-4 ">
            <div class="row mt-4 rounded-3 info" >
                <div class="col-12 p- mt-4">

                    <div class="col-12 row ">
                        <div class="col-md-3"></div>
                        <div class="col-11 col-md-5 text-start ">
                            <p>Facturar a: {{$user->name}}</p>
                            <p>Dirección: {{$user->address}}</p>
                            <p>Correo: {{$user->email}}</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row ">
                <div class="col-md-2">
                </div>
                <div class="col-12 col-md-8 p-4 text-center ">
                    <table class="table  rounded-2">
                        <thead class="border rounded-3">
                        <tr >

                            <th class="text-start border producto"><p>Producto</p></th>
                            <th class="text-start border producto"><p>Unidades.</p></th>
                            <th class="text-start border producto"><p>Valor por U.</p></th>
                            <th class="text-end border producto"><p>Valor T.</p></th>
                        </tr>
                        </thead>
                        <tbody class="text-start">
                        @foreach($products as $product)
                            @foreach($cars as $car)
                                <tr>
                                    <td>
                                        <p>{{$product->name}}</p>
                                    </td>
                                    <td class="text-start border"><p>{{$car->amount}}</p></td>
                                    <td class="text-start border"><p>{{round($product->price_discount,2)}}</p></td>
                                    <td class="text-end border"><p>{{round($car->total_price,2)}}</p></td>
                                <tr>
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>

                    <div class="container border p-2 border total info_total">

                        <div class="col-12 row ">
                            <div class="col-10">
                                <p class=" text-end  text-black value">IVA: 12%</p>
                            </div>
                        </div>
                        <div class="col-12 row">
                            <div class="col-10">
                                <p class=" text-end  text-black value">Valor Total:</p>
                            </div>
                            <div class="col-1 text-end">
                                <p class=" text-black pvalue">$ {{round($sale->total,2)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <footer>
        <div class="container-fluid pt-2 p-1">
            <div class="row col-12 bg-light p-3">
                <div class="col-12 col-md-4">
                    <h6 class="titulo">CONTACTANOS</h6>
                    <p>0999999999</p>
                    <p>0999999999</p>
                </div>
                <div class="col-12 col-md-4">
                    <p>EMAIL: redflag@yavirac.edu.ec</p>
                    <p>redflag@yavirac.edu.ec</p>
                </div>
                <div class="col-12 col-md-4">
                    <h6>Direccion:</h6>
                    <p>Garcia Moreno y Ambato </p>
                </div>
            </div>
        </div>
</div>
</footer>



<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</div>
</body>
</html>
