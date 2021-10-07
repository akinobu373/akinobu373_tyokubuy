@extends('layouts.main')

@section('title','直売所編集')

@section('content')
@if ($errors->any())
<div class="error">
    <p>
        <b>{{ count($errors) }}件のエラーがあります。</b>
    </p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h1>直売所編集</h1>

<form action="{{ route('store.update',$store) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <label for="address">住所:</label>
        <textarea name="address" cols="30" rows="10">{{ old('address',$store->address) }}</textarea>
    </div>
    <div>
        <label for="img_path">直売所の画像</label>
        <input type="file" name="img_path" id="img_path" placeholder="Image" onchange="previewImage(this);"
            value="{{ old('img_path',Storage::disk('public')->url($store->img_path)) }}">
        <img id="preview" style="max-width:200px;" src="@if (!empty($store->img_path))
                    {{ Storage::disk('public')->url($store->img_path)}}@endif">
    </div>
    <div>
        <label for="vegetable_id">野菜</label>
        <select name="vegetable_id" id="vegetable_id">
            @foreach ($vegetables as $vegetable)
            <option value="{{ $vegetable->id }}" @if (old('vegetable')==$vegetable->id) selected
                @endif>{{ $vegetable->name }}
            </option>
            @endforeach
    </div>
    <div>
        <label for="price">値段</label>
        <input type="number" name="price" id="price" value="{{ old('price',$store->price) }}">円
    </div>
    <label for="map" class="visually-hidden">地図マップ</label>
    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $store->latitude) }}">
    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $store->longitude) }}">
    <div id="map" style="height: 50vh;"></div>
    <div>
        <input type="submit" value="更新">
    </div>
</form>

<a href="{{ route('store.store') }}">戻る</a>
@endsection

@section('script')
@include('partial.map')
<script>
    const lat = document.getElementById('latitude');
    const lng = document.getElementById('longitude');
    let clicked;
    map.on('click', function(e) {
        if (clicked !== true) {
            clicked = true;
            const marker = L.marker([e.latlng['lat'], e.latlng['lng']], {draggable: true}).addTo(map);
            lat.value = e.latlng['lat'];
            lng.value = e.latlng['lng'];
            marker.on('dragend', function(e) {
             // 座標は、e.target.getLatLng()で取得
            lat.value = e.target.getLatLng()['lat'];
            lng.value = e.target.getLatLng()['lng'];
            });
            }
        });
</script>
@endsection
