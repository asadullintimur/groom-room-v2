@extends("layouts.index")

@section("content")
    <section class="admin">
        <div class="container">
            <h2>Административная панель</h2>

            <table class="table orders-table">
                <thead>
                <tr>
                    <th>Кличка</th>
                    <th>Фото до</th>
                    <th>Фото после</th>
                    <th>Статус заявки</th>
                    <th>ФИО клиента</th>
                    <th>Смена статуса</th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->pet_name}}</td>
                        <td><img src="/public/storage/{{$order->before_image}}" alt="before img"></td>
                        <td>@if($order->after_image)
                                <img src="/public/storage/{{$order->after_image}}" alt="after img">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            {{$order->formattedStatus()}}
                        </td>
                        <td>{{$order->user->full_name}}</td>
                        <td>

                            @if ($order->isProcessed())
                                Смена статуса невозможна
                            @else
                                <form action="groom/{{$order->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("patch")

                                    <select name="new_status" class="input newStatusSelect">
                                        <option selected disabled>Сменить статус на:</option>
                                        <option value="new">Новая</option>
                                        <option value="processing">Обработка данных</option>
                                        <option value="processed">Услуга оказана</option>
                                    </select>

                                    <label class="label photoLabel">
                                        <input type="file" name="photo">
                                    </label>

                                    <button class="btn">Сменить</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>


    @if ($errors->any())
    <div class="notification">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    <script src="{{asset("js/changeOrderStatus.js")}}">
    </script>
@endsection
