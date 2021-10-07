<div class="row">
    <div>
        <img src="{{ Storage::disk('public')->url($store -> img_path )}}"class="store-img">
    </div>
    <div class="ml-3">
        <div class="mt-3 mb-3">
            <h3>
                <a href="{{ route('store.show', $store) }}">{{ $store->address }}</a>
            </h3>
        </div>
        <div>
            <h5>置いている野菜　{{ $store->vegetable->name }}</h5>
            <img src="{{ $store->vegetable->img_path }}"class="square-img">
            <h5>値段　{{ $store->price}}　円</h5>
        </div>
    </div>

</div>

