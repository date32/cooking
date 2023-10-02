<div>
    <div>調理日アーカイブ</div>
    @foreach ($archiveLinks as $item)
        @foreach ($item as $yearMonth)
            <div><a href="/cooking/show/{{$yearMonth}}">{{ $yearMonth }}</a></div>
        @endforeach
    @endforeach
</div>
