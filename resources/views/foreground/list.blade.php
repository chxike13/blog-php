@foreach($articles as $article)
        <div class="xnews2">
            <div class="pic">
                <a target="_blank" href="20160920156279.html">
                    <img src="{{asset("static/foreground/images/{$article->pic}")}}" alt="在家如何自制烤肉 烤肉串致癌不适宜多吃"/>
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
            <ul>
                <li class="thisclass">1</li>
                <li><a href='list_117_2.html'>2</a></li>
                <li><a href='list_117_3.html'>3</a></li>
                <li><a href='list_117_4.html'>4</a></li>
                <li><a href='list_117_5.html'>5</a></li>
                <li><a href='list_117_6.html'>6</a></li>
                <li><a href='list_117_7.html'>7</a></li>
                <li><a href='list_117_8.html'>8</a></li>
                <li><a href='list_117_9.html'>9</a></li>
                <li><a href='list_117_2.html'>下一页</a></li>
                <li><a href='list_117_1201.html'>末页</a></li>
            </ul>
        </div>
    </div>
