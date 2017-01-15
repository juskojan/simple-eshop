@extends('layout')

@section('content')



<div align="center">
	<h1>Upraviť objednávku</h1>
	<hr>
	
	<br />
    <div style="width: 400px;" align="left">
        <iframe name="hideForm" style="display:none;"></iframe>                                     
        <form name="updatehead" method="POST" action="/objednavky/update">    
            <label>Meno</label>  
            <input type="text" name="meno" class="form-control" value="{{ $order->meno }}" />  
            <br />
            <label>Adresa</label>  
            <input type="text" name="adresa" class="form-control" value="{{ $order->adresa }}" />
            <br />

            <input type="hidden" name="id" value="{{ $order->id }}" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <br />  
            <div align="center">
                <input type="submit" name="btnInsert" class="btn btn-info" value="Upraviť hlavičku"/>
            </div>
            <br><hr>
        </form> 
    </div>
    <div style="width: 500px" align="center">
        <h3>Zoznam produktov v objednávke</h3>
        <br>
        <div style="width: 500px;">
            <form name="updateproducts" method="POST" action="/objednavky/updatep" >
                <table class="table table-hover">  
                    <thead class="thead-inverse">
                        <tr>    
                            <th>Názov</th>
                            <th>Cena</th>
                            <th>Kód</th>    
                            <th>Odobrať</th>                
                        </tr>  
                    </thead>
                    <tbody>                    
                        @foreach($items as $item)
                            <tr>
                               <td> {{ $item->nazov}} </td>
                               <td> {{ $item->cena}} </td>
                               <td> {{ $item->kod }} </td>   
                               <td> <input type="checkbox" name="products[]" value="{{ $item->id }} "></td>                    
                            </tr>
                        @endforeach                    
                    </tbody>    
                </table>
                <div align="center">
                    <input type="submit" name="btnInsert" class="btn btn-info" value="Odobrať produkty"/>
                </div>
                <br><hr>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{ $order->id }}" >
            </form>
        </div>
    </div>

    <div style="width: 800px" align="center">
        <h3>Pridať produkt do objednávky</h3>
        <br>        
        <form name="addtoproducts" method="POST" action="/objednavky/addtopr" >
            <br/>
            <table class="table table-hover">  
                <thead class="thead-inverse">
                    <tr>    
                        <th>Názov</th>
                        <th>Kód</th>
                        <th>Cena</th>
                        <th>Pridaj</th>
                        
                    </tr>  
                </thead>
                <tbody>
                    @foreach($all_products as $product)
                        <tr align="left">
                           <td> {{ $product->nazov}} </td>
                           <td> {{ $product->kod }} </td>
                           <td> {{ $product->cena }} </td>
                           <td><input type="checkbox" name="producty[]" value="{{ $product->id }}"></td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>    
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{ $order->id }}" >            

            <div align="center">
                <input type="submit" name="btnInsert" class="btn btn-info" value="Pridať"/>
            </div>
        </form>        
    </div>
    <br><br>
</div>

@stop