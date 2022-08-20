<header>
    <div class="container">
        <a class="logo" href="{{ route("home") }}">
            <img src="{{asset("images/логотипы/logo.jpg")}}" alt="logo">
        </a>

        <nav>
            @guest
                <a href="#" id="loginBtn">Войти</a>
                <a href="#" id="registerBtn">Регистрация</a>
            @endguest

            @auth
                @if (auth()->user()->is_admin)
                        <a href="{{route("admin")}}">Админ-панель</a>
                    @endif
                <a href="{{route("profile")}}">Личный кабинет</a>
                <a href="{{route("logout")}}">Выход</a>
            @endauth
        </nav>
    </div>
</header>

@guest
    <div class="modal-window" id="modalWindowDiv">
        <form id="registerForm" method="post" class="form" action="register">
            @csrf

            <div class="close-btn">
                +
            </div>

            <h3>Регистрация</h3>

            <label class="label">
                <span>ФИО</span>
                <input type="text" name="full_name" placeholder="Иванов Иван Иванович" value="{{old("full_name")}}"
                    @class(["input" , "error" => $errors->has("full_name")])>
            </label>

            <label class="label">
                <span>Логин</span>
                <input type="text" name="login" placeholder="login-123" value="{{old("login")}}"
                    @class(["input" , "error" => $errors->has("login")])>
            </label>

            <label class="label">
                <span>Почта</span>
                <input type="email" name="email" placeholder="sobaka1337@gmail.com" value="{{old("email")}}"
                    @class(["input" , "error" => $errors->has("email")])>
            </label>

            <label class="label">
                <span>Пароль</span>
                <input type="password" name="password" placeholder="********"
                    @class(["input" , "error" => $errors->has("password")])>
            </label>

            <label class="label">
                <span>Повтор пароля</span>
                <input type="password" name="password_repeat" placeholder="********"
                    @class(["input" , "error" => $errors->has("password_repeat")])>
            </label>

            <label class="label">
                <input type="checkbox" name="agreement" \
                    @class(["error" => $errors->has("agreement")])>
                <span>Согласие на обработку персональных данных</span>
            </label>

            <button class="btn">
                Зарегестрироваться
            </button>
        </form>

        <form id="loginForm" method="post" class="form" action="login">
            @csrf

            <div class="close-btn">
                +
            </div>

            <h3>Аутентификация</h3>

            <label class="label">
                <span>Логин</span>
                <input type="text" class="input" name="login" placeholder="login-123" value="{{old("login")}}">
            </label>

            <label class="label">
                <span>Пароль</span>
                <input type="password" class="input" name="password" placeholder="********">
            </label>

            @error("login", "login")
            <p class="error-message">{{$message}}</p>
            @enderror

            <button class="btn">
                Войти
            </button>
        </form>
    </div>

    <script src="{{asset("js/modalWindow.js")}}">
    </script>
@endguest
