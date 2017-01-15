@extends('layout')

@section('content')

<div align="center">
    <h1>Vytvoriť objednávku</h1>
    <hr>
    
    <br />

    <div style="width: 800px">
    <div style="width: 400px;" align="left">
        <iframe name="hideForm" style="display:none;"></iframe>                                     
        <form name="productForm" method="POST" action="/objednavky/create">    
            <label>Meno a priezvisko</label>  
            <input type="text" name="meno" class="form-control"/>  
            <br />
            <label>Adresa doručenia</label>  
            <input type="text" name="adresa" class="form-control"/>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <br />  
    </div>

    <div style="width: 800px">
    <h3>Vybrať produkty</h3>   
            <br/>
            <table class="table table-hover">  
                <thead class="thead-inverse">
                    <tr>    
                        <th>Názov</th>
                        <th>Kód</th>
                        <th>Cena</th>
                        <th></th>
                        
                    </tr>  
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr align="left">
                           <td> {{ $product->nazov}} </td>
                           <td> {{ $product->kod }} </td>
                           <td> {{ $product->cena }} </td>

                           <td><input type="checkbox" name="product[]" value="{{ $product->id }}"></td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>            

            <div align="center">
                <input type="submit" name="btnInsert" class="btn btn-info" value="Vytvoriť"/>
            </div>
        </form>
    </div>
    </div>

    

</div>
@stop