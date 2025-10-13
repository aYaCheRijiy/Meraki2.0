@extends('layouts.main')
@section('content')
    <div class="price_container">
        <div class="priceTitle">Выберите план, который подходит именно вам.</div>
        <table>
            <tr>
                <td class="headTable headTableFuncAndVozm">Функция / Возможность</td>
                @foreach($plans as $key => $plan)
                    <td class="headTable {{ $key }}-column">{{ $plan['name'] }}</td>
                @endforeach
            </tr>

            @php
                // Собираем все уникальные названия функций для заголовков строк
                $allFeatures = [];
                foreach ($plans as $plan) {
                    $allFeatures = array_merge($allFeatures, array_keys($plan['features']));
                }
                $allFeatures = array_unique($allFeatures);
            @endphp

            @foreach($allFeatures as $feature)
                <tr>
                    <td class="planConf">{{ $feature }}</td>
                    @foreach($plans as $key => $plan)
                        <td class="{{ $key }}-column">
                            @if(!empty($plan['features'][$feature]) && $plan['features'][$feature])
                                <img class="imgGalochka" alt="галочка" src="{{ asset('img/galochka.svg') }}">
                            @else
                                <img class="imgKrestik" alt="крестик" src="{{ asset('img/krestik.svg') }}">
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
@endsection
