@extends('layouts.main')

@section('title', '詳細画面')

@section('content')
@include('partial.store')
<table class="table-bordered mb-5 mt-3">
    <colgroup span="1" style="width:200px;background-color:#efefef;"></colgroup>
    <tbody>
        <tr>
            <th>住所</th>
            <td>
                <p>{{ $store->address }}</p>
            </td>
        </tr>
        <tr>
            <th>直売所画像</th>
            <td>
                @if (!empty($store->img_path))
                <div>
                    <img src="{{ Storage::disk('public')->url($store->img_path) }}" class="square-img">
                </div>
                @endif
            </td>
        </tr>
        <tr>
            <th>置いている野菜</th>
            <td>
                <div>
                    {{ $store->vegetable->name }}
                </div>
                    <img src="{{ $store->vegetable->img_path }}" class="square-img">
            </td>
        </tr>
        <tr>
            <th>値段</th>
            <td>{{ $store->price }}円</td>
        </tr>
    </tbody>
</table>
<div id="map" style="height: 30vh"></div>
    <div class="d-flex">
        <a href="{{ route('store.edit', $store) }}" class="btn btn-primary mr-2">編集</a>
        <a href="{{ route('store.index') }}" class="btn btn-secondary mr-2">戻る</a>
        <form action="{{ route('store.destroy', $store) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger" onclick="if(!confirm('削除しますか？')){return false;}">
        </form>
    </div>
@endsection

@section('script')
@include('partial.map')
<script>
    L.marker([{{ $store->latitude }},{{ $store->longitude }}])
             .bindPopup("{{ $store->name }}", {closeButton: false})
             .addTo(map);
</script>
@endsection
