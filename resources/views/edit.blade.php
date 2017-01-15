@extends('layout')

@section('content')



<div align="center">
	<h1>Upraviť produkt</h1>
	<hr>
	
	<br />
    <div style="width: 400px;" align="left">
        <iframe name="hideForm" style="display:none;"></iframe>                                     
        <form name="productForm" method="POST" action="/products/update">    
            <label>Názov</label>  
            <input type="text" name="nazov" class="form-control" value="{{ $producto->nazov }}" />  
            <br />
            <label>Kód</label>  
            <input type="text" name="kod" class="form-control" value="{{ $producto->kod }}" />
            <br />
            <label>Cena</label>                          
            <input type="text" name="cena" class="form-control" value="{{ $producto->cena }}" />
            <input type="hidden" name="id" value="{{ $producto->id }}" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <br />  
            <br /> <br />

            <div align="center">
                <input type="submit" name="btnInsert" class="btn btn-info" value="Upraviť"/>
            </div>
        </form>
    </div>
</div>

@stop