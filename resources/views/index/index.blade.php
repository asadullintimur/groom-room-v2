@extends("layouts.index")

@section("content")
    <section class="home">
        <div class="container">

            <h2>GroomRoom - лучшие услуги <br> груминга</h2>

            <h3>Наши последние работы:</h3>

            <div class="grid home-orders">
                @foreach($orders as $order)
                    <div class="card">
                        <h4>{{$order->pet_name}}</h4>

                        <img src="/public/storage/{{$order->before_image}}" alt="" class="card-img">
                    </div>
                @endforeach
            </div>

            @if(!$orders->count())
                <h4>Здесь пока пусто...</h4>
            @endif
        </div>
    </section>

@endsection
