<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    .page-break {
      page-break-after: always;
    }

  </style>
</head>

<body>

  <h1>Fecha {{ $dato->fechaEntrega }}</h1>
  @foreach ( $data as $dato )
  Pedido {{ $dato->pedido }}

  @endforeach

  {{-- <div class="page-break"></div>
  <h1>Hello in another page</h1> --}}

</body>
</html>
