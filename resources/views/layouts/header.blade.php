
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
                <svg width="163" height="28" viewBox="0 0 163 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.19 3.2L20.035 1.94L20.21 4.81L0.365 6.14L0.19 3.2ZM2.22 7.47H5.405V27.77H2.22V7.47ZM6.98 13.595L18.25 12.825L18.495 15.73L7.19 16.605L6.98 13.595ZM29.1325 9.99L43.1675 8.625L42.2925 19.615H34.8025V16.85H39.3525L39.8075 11.635L32.3525 12.405L33.2975 24.76L44.4975 23.01L44.7075 25.88L30.4975 27.945L29.1325 9.99ZM53.6421 9.99L67.6771 8.625L66.8021 19.615H59.3121V16.85H63.8621L64.3171 11.635L56.8621 12.405L57.8071 24.76L69.0071 23.01L69.2171 25.88L55.0071 27.945L53.6421 9.99ZM78.8517 2.01H82.0367L82.6317 24.585L98.2067 23.465L98.3467 26.44L79.5167 27.77L78.8517 2.01ZM107.214 1.905H111.274V5.965H107.214V1.905ZM107.704 9.15H110.749V27.735H107.704V9.15ZM132.372 12.44L127.157 13.42L126.527 10.41L134.892 8.835L137.692 27.35L134.577 27.84L132.372 12.44ZM122.257 8.975L125.302 8.87L125.967 27.735L122.922 27.84L122.257 8.975ZM150.921 27.63L147.876 27.735L147.211 0.189999L150.256 0.0849981L150.676 17.935L158.516 8.765L160.756 10.865L154.386 17.935L162.471 25.565L160.231 27.84L150.711 18.285L150.921 27.63Z" fill="#4C4C4C"/>
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

