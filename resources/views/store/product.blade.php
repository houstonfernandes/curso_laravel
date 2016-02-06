@extends('store.template')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <h2 class="title text-center">{{$product->name}}</h2>
        <div class="col-sm-5">
            <div class="view-product">
                @if(count($product->images))
                    <img src="{{url('uploads/' .$product->images->first()->id . '.' . $product->images->first()->extension) }}" alt="" width="300" id="imgProduct"/>
                @else
                    <img src="{{url('images/no-img.jpg')}}" alt="" width="300" />
                @endif
            </div>

            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($product->images as $image)
                        <a href="#" class='imgLink' imgName="{{url('uploads/' .$image->id . '.' . $image->extension) }}" >
                            <img src="{{url('uploads/' .$image->id . '.' . $image->extension) }}" alt="" width="80">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2>
                    {{$product->name}}
                </h2>
                <p>
                    {{$product->description}}
                </p>
                <span>
                    <span>R$ {{number_format($product->price, 2, ',', '.')}}</span>
                        <a href="#" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Adicionar no Carrinho
                        </a>
                </span>
            </div><!--/product-information-->

        </div>

        @if(count($tags))
                @foreach($tags as $tag)
                    <a href = "{{route('store.tag', ['id' => $tag->id])}}" class="label label-primary">{{ $tag->name }} </a>
                @endforeach
        @endif

    </div>
@stop

@section('js')
    <script type="application/javascript">
        $('.imgLink').on('click', function(){
            var img = $(this).attr('imgName');
            $('#imgProduct').prop('src',img);
        });
    </script>
@stop

