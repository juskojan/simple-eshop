@extends('layout')

@section('content')
<div class="content">            
    <div class="title m-b-md">
        Objednávky
    </div>
    <div id="addButton" align="center">
        <a href="/objednavky/add"><button type="button" class="btn btn-info btn-lg"> Pridať objednávku </button></a>
    </div>
     <div class="container" style="width:800px;">
        <br/>
        <table class="table table-hover">  
            <thead class="thead-inverse">
                <tr>    
                    <th>Meno</th>
                    <th>Adresa</th>
                    <th>Dátum vytvorenia</th>
                    <th>Suma</th>
                    <th></th>
                    <th></th>
                </tr>  
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr align="left">
                       <td> <a href="{{URL::to('/objednavky/view/'.$order->id) }}"> {{ $order->meno}} </a> </td>
                       <td> <a href="{{URL::to('/objednavky/view/'.$order->id) }}"> {{ $order->adresa}} </a> </td>
                       <td> <a href="{{URL::to('/objednavky/view/'.$order->id) }}"> {{ $order->created_at }} </a> </td>
                       <td> <a href="{{URL::to('/objednavky/view/'.$order->id) }}"> {{ $order->cena }} </a> </td>

                       <td class="center"><a href="{{URL::to('/objednavky/edit/'.$order->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                       
                       <td class="center"><a href="{{URL::to('/objednavky/delete/'.$order->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                @endforeach
            </tbody>    
        </table>

    </div>
        
</div>
@stop
