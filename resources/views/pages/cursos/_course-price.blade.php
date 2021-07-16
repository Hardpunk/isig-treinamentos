<div class="course-price__wrapper d-block d-md-none pb-4 pt-5 shadow-sm">
    <div class="container">
        <div class="course-price__wrapper--inner">
            <div class="course-price__content">
                {{--<div class="discount">
                    <span class="percentage">{{ number_format(($curso->price / $curso->old_price) * 100, 0) }}%</span>
                </div>--}}
                <div class="price__wrapper pt-3 mb-4">
                    <div class="price__wrapper--content">
                        <p class="price mb-0">
                            <em class="price-discount">R$ {{ number_format($curso->price, 2, ',', '.') }}</em>
                            <em class="price-installments">
                                <span>
                                    <span> 10x de </span>
                                    <label class="price-discounted">R$
                                        {{ number_format($curso->price / 10, 2, ',', '.') }}</label>
                                    <span> ou</span>
                                </span>
                            </em>
                        </p>
                        {{-- <p class="price-cash text-center">Preço a vista:<strong>R$
                                269,99</strong></p> --}}
                    </div>
                </div>
                <div class="checkout-button__wrapper">
                    <form id="add-to-cart-md" action="{{ action('CartController@add') }}" method="POST" role="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $curso->id }}" />
                        <input type="hidden" name="type" value="course" />
                        <button type="button" data-loading-text="<i class='fas fa-spinner fa-spin mr-2'></i>Aguarde..."
                            style="display: {{ $in_cart ? 'none' : 'block' }};"
                            class="btn btn-large checkout-button waves-effect waves-light mx-auto font-weight-bold" style="background-color: #0E815C;">COMPRAR</button>
                        <a href="{{ route('checkout.index') }}" data-loading-text="<i class='fas fa-spinner fa-spin mr-2'></i>Aguarde..."
                            style="display: {{ $in_cart ? 'block' : 'none' }};"
                            class="btn btn-large go-checkout-button waves-effect waves-light mx-auto font-weight-bold" style="background-color: #0E815C;">FINALIZAR COMPRA</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
