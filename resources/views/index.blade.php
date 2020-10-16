@extends('templates.template')


@section('content')
    <h1 class="text-center">Cadastro com API</h1>
    <hr>

    <main>


        <button class="btn btn-success btnCreate" class="editBtn" data-toggle="modal" data-target="#exampleModal">Novo
            Cliente </button>

        <div className="table-wrapper">
            <table class="fl-table">
                <thead class= 'thead-dark'>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">CPF:</th>
                        <th scope="col">Telefone:</th>
                        <th scope="col">Ações:</th>

                    </tr>
                </thead>
                <tbody>
                    @csrf
                    @foreach ($clients as $client)


                        <tr>
                            <th scope="row">{{ $client->id }}</th>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->cpf }}</td>
                            <td>{{ $client->telefone }}</td>

                            <td>

                                <div class="listBtn">

                                    <i class="material-icons button editBtn" class="editBtn" data-toggle="modal"
                                        data-target="#exampleModal" data-client='{{ $client }}'>edit</i>
                                    <a href="{{ url('clients/' . $client->id) }}" class="js-del">
                                        <i class="material-icons button delBtn">clear</i>
                                    </a>
                                </div>
                            </td>


                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

        @endsection

</main>


<div class="modal fade modaltest" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editando</h5>
            </div>

            <div class="modal-body">

                <form class="formCad" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome</label>
                            <input type="text" class="form-control" id="inputName" name='name' placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCPF">CPF</label>
                            <input type="text" class="form-control" id="inputCPF" name='cpf' placeholder="CPF">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group md-6">
                            <label for="inputTel">Telefone</label>
                            <input type="text" class="form-control" id="inputTel" name='telefone'
                                placeholder="Telefone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCEP">CEP</label>
                            <input type="text" class="form-control" name='cep' id="inputCEP">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputCity">Cidade</label>
                            <input type="text" class="form-control" name='cidade' id="inputCity">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputState">Estado</label>
                            <input type="text" class="form-control" name='estado' id="inputState">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" name='bairro' id="inputBairro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" name='endereco'
                            placeholder="Rua, complemento, nº ">
                    </div>

                    <button type="submit" class="btn btn-primary btnForm"> Salvar </button>
                </form>

            </div>


        </div>
    </div>
</div>
