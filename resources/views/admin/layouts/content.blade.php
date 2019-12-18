@if($title)<h1> {{$createinfo->get('brandname')}}{{$title}}</h1>@endif
@foreach(explode(PHP_EOL,$articleinfos) as $articleinfo)
    <p>{!! $articleinfo !!}</p>
@endforeach
@if(isset($articlecontents))
    @foreach($articlecontents as $content_type=>$articlecontent)
        <h3>{{$createinfo->get('brandname')}}{{$content_type}}</h3>
        @if(isset($articlecontent->content))
            @foreach(explode('@@',$articlecontent->content) as $content)
                <p>{{str_replace('{}',$createinfo->get('brandname'),$content)}}</p>
            @endforeach
        @endif
    @endforeach
@endif