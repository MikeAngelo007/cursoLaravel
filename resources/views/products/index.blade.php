<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container"></br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                    <tr>
                                        <td>
                                            {{$product->description}}
                                        </td>
                                        <td>
                                            {{$product->price}}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">Editar</a>
                                            <a href="javascript:document.getElementById('delete-{{$product->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{$product->id}}" action="{{ route('products.destroy',$product->id)}}" method="POST">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>  
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>