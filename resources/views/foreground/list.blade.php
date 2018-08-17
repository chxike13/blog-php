@foreach($articles as $article)
        <div class="xnews2">
            <div class="pic">
                <a target="_blank" href="">
                    <img src="{{asset("storage/img/{$article->pic}")}}" alt="图挂了"/>
                </a>
            </div>
            <div class="dec">
                <h3>
                    <a href="javascript:void(0);" onclick="getArticle({{$article->id}})">{{$article->title}}</a>
                </h3>
                <div class="time">发布时间：{{$article->create_time}}</div>
                <p>{{$article->desc}}</p>
                <div class="time"></div>
            </div>
        </div>
    @endforeach
<div class="pages">
    <div class="plist">
        {{$articles->links()}}
    </div>
</div>
