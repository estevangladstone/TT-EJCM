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

    <div id="carrinho" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Meu Carrinho</h4>
                </div>
                <div class="modal-body edit-content container-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>
@endsection