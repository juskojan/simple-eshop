@extends('layout')

@section('content')


    <style type="text/css">
    
    .table-hover tr td:nth-last-child(-n+2) {
    visibility: hidden;
    }
    .table-hover tr:hover td:nth-last-child(-n+2) {
        visibility: visible;
    }

    #delete:hover > #delete_img {
        cursor: pointer;
    }
    #edit:hover > #edit_img {
        cursor: pointer;
    }
    </style>>




        <div class="content">            
            <div class="title m-b-md">
                Produkty
            </div>




            <div id="addButton" align="center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addModal"> Pridať produkt </button>
            </div>


    <div class="modal fade" id="addModal" role="dialog" align="center">
        <div class="modal-dialog">          
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pridaj produkt</h4>
                </div>

                <div class="modal-body">                                
                    <br />
                    <div style="width: 400px;" align="left">
                        <iframe name="hideForm" style="display:none;"></iframe>                                     
                        <form name="productForm" method="POST" action="/products/add">    
                            <label>Názov</label>  
                            <input type="text" name="nazov" class="form-control"/>  
                            <br />
                            <label>Kód</label>  
                            <input type="text" name="kod" class="form-control" />
                            <br />
                            <label>Cena</label>                          
                            <input type="text" name="cena" class="form-control" />
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <br />  
                            <br /> <br />

                            <div align="center">
                                <input type="submit" name="btnInsert" class="btn btn-info" value="Pridať"/>
                            </div>
                        </form>
                    </div>           
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>       
            </div>                   
        </div> 
    </div>


        <div class="container" style="width:800px;">
        <br/>
        <table class="table table-hover">  
            <thead class="thead-inverse">
                <tr>    
                    <th>Názov</th>
                    <th>Kód</th>
                    <th>Cena</th>
                    <th></th>
                    <th></th>
                </tr>  
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr align="left">
                       <td> {{ $product->nazov}} </td>
                       <td> {{ $product->kod }} </td>
                       <td> {{ $product->cena }} </td>

                       <td class="center"><a href="{{URL::to('/products/edit/'.$product->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                       <td class="center"><a href="{{URL::to('/products/delete/'.$product->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                @endforeach
            </tbody>    
        </table>

    </div>
                
        </div>

@stop