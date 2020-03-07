<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .container {
            padding-top: 20px;
            text-align: center;
        }

        .table {
            margin-top: 45px;
        }

        .span {
            position: relative;
            top: 40px;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Получение кадастровых данных</h1>
    <form method="" action="/numbers">
        <div class="form-group">
            <label for="cadaterNumber">Кадастровые номера</label>
            <input name="c_n" class="form-control" id="cadaterNumber" placeholder="Введите кадастровые номера">
            <small class="form-text text-muted">Введите кадастровые номера через запятью. Например <<69:27:0000022:1306,
                69:27:0000022:1307>></small>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Полученные данные</button>
    </form>
    <hr>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($data))
        <table class="table table-striped">
            <thead>
            <p class="span">Всево {{count($data)}} записи</p>
            <tr>
                <th scope="col">Кадастровый номер</th>
                <th scope="col">Адрес</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Площадь</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item->c_n}}</th>
                    <td>{{$item->address}}</td>
                    <td>{{$item->cost}} ₽</td>
                    <td>{{$item->area}} м²</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
