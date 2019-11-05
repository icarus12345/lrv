<!--Blog Sidebar Start-->
<div class="blog-sidebar">
    
    <h6 class="blog-sidebar-title"><span>{{__('common.archives')}}</span></h6>
    
    <ul class="blog-sidebar-list">
        @foreach(\App\Models\Post::getArchive()->get() as $item)
        <li><a href="blog/archive/{{$item->month}}">{{$item->archive_title}}</a></li>
        @endforeach
    </ul>
    
</div>
<!--Blog Sidebar End-->
