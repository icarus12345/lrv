<!--Blog Sidebar Start-->
<div class="blog-sidebar">
    
    <h6 class="blog-sidebar-title"><span>{{__('common.recent_post')}}</span></h6>
    
    <ul class="blog-sidebar-post">
        @foreach(\App\Models\Post::newest()->limit(3)->get() as $item)
        <li>
            <a href="/blog/detail/{{$item->id}}" class="thumbnail"><img src="{{$item->image_path}}" alt="" /></a>
            <div class="content">
                <a href="/blog/detail/{{$item->id}}" class="title">{{$item->title}}</a>
                <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->format('M, d') }}</span>
            </div>
        </li>
        @endforeach
    </ul>
    
</div>
<!--Blog Sidebar End-->