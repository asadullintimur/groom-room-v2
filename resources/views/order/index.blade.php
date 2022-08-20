@extends("layouts.index")

@section("content")
    <section class="profile">
        <div class="container">
            <h2>Личный кабинет</h2>

            <div class="flex-block">
                <div class="order-create">
                    <form class="form" method="post" enctype="multipart/form-data">
                        @csrf

                        <h3>Создать заявку</h3>

                        <label class="label">
                            <span>Кличка питомца</span>
                            <input value="{{old("pet_name")}}" type="text" class="input" placeholder="Жорик"
                                   name="pet_name">
                        </label>

                        <label class="label">
                            <span>Фото</span>
                            <input type="file" class="input" name="photo">
                        </label>

                        <p class="error-message"
                           style="@if(!$errors->all()) display: none @endif">
                            @error("pet_name")
                            {{$message}}
                            <br>
                            @enderror

                            @error("photo")
                            {{$message}}
                            @enderror
                        </p>
                        <button class="btn">Создать</button>
                    </form>
                </div>

                <div class="orders">
                    <h3>Текущие заявки:</h3>

                    @if(!$orders->count())
                        <h4>Заявок пока нет.</h4>
                    @endif

                    <div class="grid orders-grid">
                        @foreach($orders as $order)
                            <div class="card order">
                                <h4>{{$order->pet_name}}</h4>

                                <p>Статус - {{$order->formattedStatus()}}
                                </p>

                                <form action="{{route("order.delete", ["order" => $order->id])}}" method="post">
                                    @csrf
                                    @method("DELETE")


                                    <button class="btn btn_red"
                                            @if(!$order->isNew())
                                                disabled
                                        @endif>
                                        Удалить
                                    </button>
                                </form>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
