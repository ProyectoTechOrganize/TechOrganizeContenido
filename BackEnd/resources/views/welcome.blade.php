<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3" >CRUD Proyecto</h1>

        @if (session("Correcto"))
            <div class="alert alert-success">{{session("Correcto")}}</div>
        @endif

        @if (session("Incorrecto"))
            <div class="alert alert-danger">{{session("Incorrecto")}}</div>
        @endif

    <!-- Modale Registro -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Datos</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("crud.create")}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Rol</label>
                        <input type="text" name="txtrol" class="form-control" id="txtrol" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="txtusuario" name="txtusuario" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tipo de Documento</label>
                        <input type="text" class="form-control" id="txtdocumento" name="txtdocumento" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="txtcorreo" name="txtcorreo" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Numero de Celular</label>
                        <input type="text" class="form-control" id="txtcelular" name="txtcelular" aria-describedby="emailHelp">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    <div class="p-5 table-responsive">
        <button data-bs-toggle="modal" data-bs-target="#modalRegistro" class="btn btn-primary btn-sm">Añadir Usuario</button>
        <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">Rol</th>
                <th scope="col">Tipo de Documento</th>
                <th scope="col">Nombre de Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Numero de Celular</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($datos as $item)
                <tr>
                    <th>{{$item->Rol}}</th>
                    <td>{{$item->Documento}}</td>
                    <td>{{$item->NombreUsuario}}</td>
                    <td>{{$item->Correo}}</td>
                    <td>{{$item->NumeroCelular}}</td>
                    <td>
                        <a href=""data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->Rol}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <a href="{{route("crud.delete",$item->NombreUsuario)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a>
                    </td>

                    <!-- Modale modificar -->
                    <div class="modal fade" id="modalEditar{{$item->Rol}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route("crud.update")}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Rol</label>
                                  <input type="text" name="txtrol" class="form-control" id="exampleInputEmail1" value="{{$item->Rol}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tipo de Documento</label>
                                    <input type="text" value="{{$item->Documento}}" class="form-control" id="txtdocumento" name="txtdocumento" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="txtusuario" value="{{$item->NombreUsuario}}">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="txtcorreo" value="{{$item->Correo}}">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Numero de Celular</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$item->NumeroCelular}}" name="txtcelular">
                                  </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                  </div>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
