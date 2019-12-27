@if($title)<h1> {{$createinfo->get('brandname')}}{{$title}}</h1>@endif
@foreach(explode(PHP_EOL,$brandinfos) as $brandinfo)
    <div>{!! $brandinfo !!}</div>
@endforeach
@if(isset($articlecontents))
    @foreach($articlecontents as $content_type=>$articlecontent)
        @if(!empty($articlecontent))
            <h3>{{$createinfo->get('brand')}}{{$content_type}}</h3>
            @if(isset($articlecontent->content))
                <h1>{{$articlecontent->id}}</h1>
                @foreach(explode('@@',$articlecontent->content) as $content)
                    <p>{{str_replace('{}',$createinfo->get('brand'),$content)}}</p>
                @endforeach
            @endif
        @endif
    @endforeach
@endif