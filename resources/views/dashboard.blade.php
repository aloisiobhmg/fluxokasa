@extends('layouts.app')

@section('content')
<main>
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <img src="{{ asset('hello.svg') }}" alt="" />
            <div class="main__greeting">
                <h1>Ola {{ Auth::user()->name }}</h1>
                <p>Bem vindo a pagina do admin</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
            <div class="card">
                <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Numero de Assinantes</p>
                    <span class="font-bold text-title">578</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Tempo de observação</p>
                    <span class="font-bold text-title">2467</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-video-camera fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Numero de Videos</p>
                    <span class="font-bold text-title">340</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-thumbs-up fa-2x text-green" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Numero de Curtidas</p>
                    <span class="font-bold text-title">645</span>
                </div>
            </div>
        </div>
        <!-- MAIN CARDS ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
                <div class="charts__left__title">
                    <div>
                        <h1>Entradas</h1>
                        <p>Belo Horizonte, Minas Gerais, Brasil</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <div id="apex1"></div>
            </div>

            <div class="charts__right">
                <div class="charts__right__title">
                    <div>
                        <h1>Relatórios de estatasticas</h1>
                        <p>Belo Horizonte, Minas Gerais, Brasil</p>
                    </div>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>

                <div class="charts__right__cards">
                    <div class="card1">
                        <h1>Renda</h1>
                        <p>$75,300</p>
                    </div>

                    <div class="card2">
                        <h1>Vendas</h1>
                        <p>$124,200</p>
                    </div>

                    <div class="card3">
                        <h1>Comercial</h1>
                        <p>3900</p>
                    </div>

                    <div class="card4">
                        <h1>Pedidos</h1>
                        <p>1881</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->
    </div>
</main>

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection

