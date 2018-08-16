@if($act=='tag')
    <a href='{{url('foreground/index')}}'>主页</a> > <a href='javascript:void(0)' onclick="getList('tag','{{$tagname}}')">{{$tagname}}</a> >
@else
    <a href='{{url('foreground/index')}}'>主页</a> > <a href='javascript:void(0)' onclick="getList('cate',{{$cates->id}})">{{$cates->catename}}</a> >
@endif
