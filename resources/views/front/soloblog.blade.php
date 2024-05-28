@extends('layouts.frontlayout')
@section('content')

<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80">

    <!--Container-->
    <div class="container clearfix">
        <div class="row">

            <div class="col-md-4 sidebar">
                <!-- Widget 1 -->
                <div class="widget widget-search">
                    <form action="#" class="search-form">
                        <input type="text" onfocus="if(this.value == 'Search') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search'; }" value="Search" />
                        <input type="submit" class="submit-search" value="Ok" />
                    </form>
                </div>
                <!--End widget-->

                <!-- Widget 2 -->
                <div class="widget">
                    <h4>Categories</h4>
                    <ul class="cat-list">
                        @foreach ($categorydata as $category )
                        <li>
                            <a href="#">{{$category}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--End widget-->

                <!-- Widget 3 -->
                <div class="widget">
                    <h4>Tags</h4>
                    <ul class="tag-list">
                        @foreach ($tagsdata as $tag )
                        <li><a href="#">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--End widget-->

                <!--Widget 4-->
                <div class="widget">
                    <h4>Keywords</h4>
                    <ul class="cat-archives">
                        @foreach ($keyworddata as $key )
                        <li><a href="#">{{$key}}</a></li>

                        @endforeach
                    </ul>
                </div>
                <!--End widget-->

            </div>
            <!-- /.col -->


            <div class="col-sm-8">
                <!--Post Single-->
                <div class="postSingle">

                    <div class="postMedia">
                        <img alt="" src="{{ URL::to('blog').'/'.$blogsdata['image'] }}">
                    </div><!--Post image-->

                    <div class="postMeta clearfix">
                        <div class="postMeta-info">

                        </div>
                        <div class="postMeta-date">
                            <span class="metaDate"><i class="fa fa-calendar"></i> <a href="#">{{ $blogsdata['createdat']}}</a></span>
                        </div>
                    </div><!--Post meta-->

                    <div class="postTitle">
                        <h1>{{ $blogsdata['title']}}</h1>
                        <div class="divider-small"></div>
                    </div> <!--Post title-->

                    <p>{!! html_entity_decode($blogsdata['description']) !!}</p>

                    <div class="postTags clearfix">
                        <h4><i class="fa fa-tags"></i>Tags :</h4>
                        <ul class="list-inline">
                            @php
                            $tags=explode(',',$blogsdata['tags']);
                            @endphp
                            @foreach ($tags as $tag)
                            <li><a href="#">{{$tagsdata[$tag]}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="postTags clearfix">
                        <h4><i class="fa fa-tags"></i>Categories :</h4>
                        <ul class="list-inline">
                            @php
                            $categories=explode(',',$blogsdata['category']);
                            @endphp
                            @foreach ($categories as $category)
                            <li><a href="#">{{$categorydata[$category]}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="postTags clearfix">
                        <h4><i class="fa fa-tags"></i>Keywords :</h4>
                        <ul class="list-inline">
                            @php
                            $keywords=explode(',',$blogsdata['keyword']);
                            @endphp
                            @foreach ($keywords as $keyword)
                            <li><a href="#">{{$keyworddata[$keyword]}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <!--End post single-->
            </div> <!-- /.col -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection