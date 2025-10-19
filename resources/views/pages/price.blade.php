@extends('layouts.main')
@section('content')
    <div class="pricing-section">
        <div class="pricing-header">
            <h1 class="pricing-title">Выберите план, который подходит именно вам</h1>
            <p class="pricing-subtitle">Все тарифы включают основные возможности с расширенным функционалом для профессионалов</p>
        </div>

        <div class="pricing-table-container">
            <!-- Desktop Table -->
            <div class="pricing-table desktop-view">
                <div class="table-header">
                    <div class="feature-column">Функция / Возможность</div>
                    @foreach($plans as $key => $plan)
                        <div class="plan-column {{ $key }}-column">
                            <div class="plan-name">{{ explode(' / ', $plan['name'])[0] }}</div>
                            <div class="plan-price">{{ explode(' / ', $plan['name'])[1] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="table-body">
                    @php
                        $allFeatures = [];
                        foreach ($plans as $plan) {
                            $allFeatures = array_merge($allFeatures, array_keys($plan['features']));
                        }
                        $allFeatures = array_unique($allFeatures);
                    @endphp

                    @foreach($allFeatures as $feature)
                        <div class="table-row">
                            <div class="feature-column">{{ $feature }}</div>
                            @foreach($plans as $key => $plan)
                                <div class="plan-column {{ $key }}-column">
                                    @if(!empty($plan['features'][$feature]) && $plan['features'][$feature])
                                        <div class="feature-status available">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="feature-status unavailable">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M5 5L15 15M15 5L5 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Mobile Cards -->
            <div class="pricing-cards mobile-view">
                @foreach($plans as $key => $plan)
                    <div class="pricing-card {{ $key }}-card">
                        <div class="card-header">
                            <h3 class="plan-name">{{ explode(' / ', $plan['name'])[0] }}</h3>
                            <div class="plan-price">{{ explode(' / ', $plan['name'])[1] ?? '' }}</div>
                        </div>

                        <div class="card-features">
                            @foreach($plan['features'] as $feature => $available)
                                <div class="feature-item">
                                    <div class="feature-status {{ $available ? 'available' : 'unavailable' }}">
                                        @if($available)
                                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.6667 5L7.50004 14.1667L3.33337 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        @else
                                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none">
                                                <path d="M5 5L15 15M15 5L5 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <span class="feature-text">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
