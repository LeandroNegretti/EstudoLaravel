<h3>Fornecedor</h3>


@php


@endphp

@isset($fornecedor)
    fornecedor: {{ $fornecedor[1] ['nome']}}
    <br>
    status : {{ $fornecedor[1] ['status']}}
    CNPJ {{$fornecedor[0]['CNPJ'] ?? 'Dado não foi preenchido'}}
@endisset
