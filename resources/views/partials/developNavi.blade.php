<!-- 開発用メニュー -->
@isset($developNaviList)
    {{-- 各メニュー展開 --}}
    @foreach($developNaviList as $navi)
        <div><a href="{{$navi->url}}">{{$navi->name}}</a></div>

    @endforeach
@else
    <p>開発用メニューの読み込みに失敗しました</p>
@endisset