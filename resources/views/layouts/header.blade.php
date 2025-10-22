
{{--<img class="backgroundO" src="{{ asset('img/backgroundO.png') }}" alt="">--}}
    <div class="header">
        <a class="logoAndSvg" href="{{ route('main.index') }}">
            <svg class="svg_logo" width="64" height="64" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.15" y="3.15" width="50.7" height="50.7" fill="white"/>
                <rect x="0.15" y="3.15" width="50.7" height="50.7" stroke="black" stroke-width="0.2"/>
                <rect x="0.15" y="3.15" width="50.7" height="50.7" stroke="black" stroke-width="0.2"/>
                <rect x="0.15" y="3.15" width="50.7" height="50.7" stroke="black" stroke-width="0.2"/>
                <rect x="3.15" y="1.15" width="49.7" height="49.7" fill="white"/>
                <rect x="3.15" y="1.15" width="49.7" height="49.7" stroke="black" stroke-width="0.2"/>
                <rect x="3.15" y="1.15" width="49.7" height="49.7" stroke="black" stroke-width="0.2"/>
                <rect x="3.15" y="1.15" width="49.7" height="49.7" stroke="black" stroke-width="0.2"/>
                <rect x="6.73691" y="0.15" width="47.1138" height="47.1138" fill="white"/>
                <rect x="6.73691" y="0.15" width="47.1138" height="47.1138" stroke="black" stroke-width="0.3"/>
                <rect x="6.73691" y="0.15" width="47.1138" height="47.1138" stroke="black" stroke-width="0.3"/>
                <rect x="6.73691" y="0.15" width="47.1138" height="47.1138" stroke="black" stroke-width="0.3"/>

                <!-- Цветные блоки с классами -->
                <rect class="color-block block-1" x="10.5658" y="4.41035" width="10.5759" height="16.6103" fill="#D0FFCA" stroke="black" stroke-width="0.2"/>
                <rect class="color-block block-2" x="24.7895" y="4.41035" width="10.5759" height="16.6103" fill="#FFF7CA" stroke="black" stroke-width="0.2"/>
                <rect class="color-block block-3" x="39.0131" y="4.41035" width="10.5759" height="16.6103" fill="#FFCACA" stroke="black" stroke-width="0.2"/>
                <rect class="color-block block-4" x="10.5658" y="26.3931" width="10.5759" height="16.6103" fill="#CAFFFF" stroke="black" stroke-width="0.2"/>
                <rect class="color-block block-5" x="24.7895" y="26.3931" width="10.5759" height="16.6103" fill="#CAD1FF" stroke="black" stroke-width="0.2"/>
            </svg>
            <div class="text_logo">
                <svg width="147" height="37" viewBox="0 0 147 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.0351 5.10998L12.8101 6.54498L12.5651 5.00498L3.22012 6.50998V27.72H0.000117265V3.98998L13.5801 1.92498L13.8251 3.49998L23.9051 1.71498L27.2301 27.125L23.8351 27.65L21.0351 5.10998ZM11.5151 8.78498H14.7351V27.72L11.4801 27.755L11.5151 8.78498ZM50.7181 8.78498L53.5881 9.97498L41.6181 36.505L38.7481 35.385L50.7181 8.78498ZM35.2131 10.08L38.0831 8.81998L44.0331 22.68L41.1981 24.01L35.2131 10.08ZM63.0247 1.92498H66.2097L66.8047 24.5L82.3797 23.38L82.5197 26.355L63.6897 27.685L63.0247 1.92498ZM91.3868 1.81998H95.4468V5.87998H91.3868V1.81998ZM91.8768 9.06498H94.9218V27.65H91.8768V9.06498ZM116.545 12.355L111.33 13.335L110.7 10.325L119.065 8.74998L121.865 27.265L118.75 27.755L116.545 12.355ZM106.43 8.88998L109.475 8.78498L110.14 27.65L107.095 27.755L106.43 8.88998ZM135.094 27.545L132.049 27.65L131.384 0.104977L134.429 -2.38419e-05L134.849 17.85L142.689 8.67998L144.929 10.78L138.559 17.85L146.644 25.48L144.404 27.755L134.884 18.2L135.094 27.545Z" fill="#4C4C4C"/>
                </svg>

            </div>
        </a>

        <input type="checkbox" id="burger-checkbox" class="burger-checkbox">
        <label class="burger" for="burger-checkbox"></label>

        <div class="navMenu" id="">
            <a class="navtab" href="{{ route('main.index') }}">Главная</a>
            <a class="navtab" href="{{ route('client.index') }}"><span class="markerHeaderClient">Пользователи</span></a>
            <a class="navtab" href="{{ route('price.index') }}">Цены</a>
            @auth
                <a class="navtab user-profile-link" href="{{ route('dashboard') }}">
                    <div class="avatar-circle desktop-only">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="profile-text mobile-only">
                    {{ auth()->user()->name }}
                </span>
                </a>
            @else
                <a class="navtab navtabSingIn" href="{{ route('login') }}">Войти</a>
            @endauth

        </div>

    </div>

