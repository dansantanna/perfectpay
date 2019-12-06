<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PerfectPay - Daniel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
</head>

<body>
    <main class="container">


        <div class="card ">
            <div class="card-body">
                <h5 class="card-title">Filtrar</h5>
                <div class="form-group form-filter">
                    <select class="form-control" id="client-list">
                        <option value="">Selecione um Cliente</option>
                    </select>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Período</span>
                        </div>
                        <input type="date" class="form-control" id="created_at">
                    </div>
                </div>
                <button type='button' id="btn-filter" class='btn btn-outline-primary'>Filtrar</button>
            </div>
        </div>


        <div class="card ">
            <div class="card-body">
                <h5 class="card-title">Tabela de Vendas</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Data</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="sale-table">
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card ">
            <div class="card-body">
                <h5 class="card-title">Resultado das vendas</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody id="sale-result">
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script src="{{ URL::asset('js/home.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>