@extends('layouts.mylayout')

@section('styles')
    <style>
        .info{
            font-size: 20px;
        }

        tr.click-row {
            cursor: pointer;
        }
    </style>
@endsection

@section('title')
    Produtos
@endsection

@section('content')

    <div class="itens container">
        @foreach($products as $product)
            <div class='item col-md-3' style='margin-top:15px;margin-bottom:15px;'>
                <img src='http://lorempixel.com/250/250/' class='img-responsive'>
                <div class='descricao'>
                    <h4 class='nome' data-nome='{{$product->nome}}'>{{$product->nome}}</h4>
                    <p class='preco' data-preco='{{$product->preco}}'>R$ {{number_format($product->preco, 2, ',', ' ')}}</p>
                    <button class='add-button btn btn-info'>Adicionar ao Carrinho</button>
                </div>
            </div>
        @endforeach
    </div>

@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>
@endsection