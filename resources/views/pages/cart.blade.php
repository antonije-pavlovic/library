@extends('layouts.main')
@section('content')
    <div class="modal fade" id="pera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please check your mail and click on link so you can verify account
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        @if(isset($books))
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shipping cart
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                @php ($price = 0)
                @foreach($books as $book)
                    @php ($price += $book->price)
                <!-- PRODUCT -->
                    <div class="row sinleProduct" >
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{$book->picture}}" width="130px">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{$book->title}}</strong></h4>

                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right pt-3">
                                <h6><span>$</span><strong class="price">{{$book->price}}</strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">

                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-light btn-xs">
                                    <i class="fa fa-remove removeProduct" data-uid="{{session()->get('user')[0]->id}}" data-price="{{$book->price}}" data-id="{{$book->bookID}}" style="font-size:40px;color:red"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                <!-- END PRODUCT -->
                @endforeach
                </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="" class="btn btn-success buyProducts" data-uid="{{session()->get('user')[0]->id}}">Buy</a>
                            </div>
                            <div class="col-lg-6 " >
                                <span style="float:right"> Total price: <b class="sumPrice">${{$price}}</b></span>
                            </div>
                        </div>
                    </div>
                </div>
        @else
            <p>{{$notice}}</p>
        @endif
    </div>

@endsection