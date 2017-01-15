@extends('layout')

@section('content')


<div align="center">
	<h1>Objednávka č. {{ $order->id }}</h1>
	<hr>
	
    <h4>Meno a priezvisko</h4>
    {{ $order->meno }}
    <br><br>

    <h4>Adresa doručenia</h4>
    {{ $order->adresa }}
	<br><br>

    <h4>Dátum vytvorenia</h4>
    {{ $order->created_at }}
    <br><br>

    <h4>Cena objednávky</h4>
    {{ $order->cena }}
    <br><hr>

    <h3>Zoznam produktov</h3>
    <br>
    <div style="width: 500px;">
        <table class="table table-hover">  
            <thead class="thead-inverse">
                <tr>    
                    <th>Názov</th>
                    <th>Cena</th>
                    <th>Kód</th>                    
                </tr>  
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                       <td> {{ $item->nazov}} </td>
                       <td> {{ $item->cena}} </td>
                       <td> {{ $item->kod }} </td>                       
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>

</div>

@stop