@extends('layouts.frontlayout')
@section('content')

<!-- Section Title Blog -->
<div class="section-title-bg text-center m-bottom-20">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s">
        <strong>Our Blogs</strong>
    </h2>
    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
        We write quality content regularly. check them out!
    </p>
</div>

<!--BLog single section-->
<section class="blog-index">
    <!--Container-->
    <div class="container clearfix">
        <div class="row">
            <div class="col-md-4 sidebar">
                <a href="{{ URL::to('/blogs') }}">
                    <ol class="breadcrumb">
                        <li>All Blogs</li>
                    </ol>
                </a>
                <!-- Widget 1 -->
                <div class="widget widget-search">
                    <form class="search-form">
                        <input class="titleinput" type="text" typeblog="title" search="" name="search" onfocus="if(this.value == 'Search') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search'; }" value="Search" />
                        <input type="submit" class="submit-search searchtitle" value="Ok" />
                    </form>
                </div>
                <!--End widget-->
                @php

                $blogfilters=blogfilters();
                $categorydata=$blogfilters['allcategory'];
                $tagsdata=$blogfilters['alltag'];
                $keyworddata=$blogfilters['allkeyword'];

                @endphp

                <!--Widget 4-->
                <div class="widget">
                    <h4>Month wise Blogs</h4>
                    <input type="text" class="span2 dateblog" typeblog="created_at" search="" value="05-2024" id="dp1">
                    <input type="submit" class="submit-search searchdate" value="Ok" />
                </div>
                <!--End widget-->

                <!-- Widget 2 -->
                <div class="widget">
                    <h4>Categories</h4>
                    <ul class="tag-list">
                        @foreach ($categorydata as $key => $category )
                        <li>
                            <a class="categorysearch" typeblog="category" search="{{$key}}">{{$category}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--End widget-->

                <!-- Widget 3 -->
                <div class="widget">
                    <h4>Tags</h4>
                    <ul class="tag-list">
                        @foreach ($tagsdata as $key => $tag )
                        <li><a class="tagsearch" typeblog="tags" search="{{$key}}">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--End widget-->

                <!--Widget 4-->
                <div class="widget">
                    <h4>Keywords</h4>
                    <ul class="tag-list">
                        @foreach ($keyworddata as $key => $keys )
                        <li><a class="keysearch" typeblog="keyword" search="{{$key}}">{{$keys}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--End widget-->

            </div>
            <!-- /.col -->

            <div class="col-md-8">
                <div class="row multi-columns-row blogsearchdetails">
                    @foreach ($blogitems as $blog)
                    <!-- === Blog item 1 === -->
                    <div class="col-sm-6 m-bottom-40">
                        <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                            <div class="blog-media">
                                <a href="{{ URL::to('/blog').'/'.base64_encode($blog['id']) }}"><img src="{{ URL::to('blog').'/'.$blog['image'] }}" alt="" /></a>
                            </div>
                            <!--post media-->

                            <div class="blog-post-info clearfix">
                                <span class="time"><i class="fa fa-calendar"></i>{{ $blog['createdat']}}</span>
                            </div>
                            <!--post info-->

                            <div class="blog-post-body">
                                <h4><a class="title" href="#">{{ $blog['title']}}</a></h4>
                                @php
                                $small = substr( strip_tags($blog['description']), 0, 180);
                                @endphp
                                <p class="p-bottom-20">{!! $small !!}</p>
                                <a href="{{ URL::to('/blog').'/'.base64_encode($blog['id']) }}" class="read-more">Read More >></a>
                            </div><!--post body-->
                            <!--post body-->
                        </div>
                        <!-- /.blog -->
                    </div>
                    <!-- /.inner-col -->
                    @endforeach
                </div>
                <!-- /.inner-row -->
                @if($pagination>1)
                <!-- blog pagination -->
                <div class="blog-pagination" id="paginationblog">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            @php
                            $i = 1;
                            $prevpage=$page-1;
                            @endphp
                            @if($page == 1)
                            <li class="disabled">
                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                @else
                            <li>
                                <a href="{{ URL::to('/blogs') }}/{{$prevpage}}" aria-label="Previous">
                                    <span aria-hidden="false"><i class="fa fa-angle-left"></i></span>
                                </a>
                                @endif
                            </li>
                            @while ($i <= $pagination) @if($i==$page ) <li class="active">
                                <span>{{$i}} <span class="sr-only">(current)</span></span>
                                </li>
                                @else
                                <li><a href="{{ URL::to('/blogs') }}/{{$i}}">{{$i}}</a></li>
                                @endif
                                @php
                                $i++;
                                @endphp
                                @endwhile
                                @if($i-$page==1)
                                <li class="disabled">
                                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    @else
                                <li> <a href="{{ URL::to('/blogs') }}/{{$page++}}" aria-label="Next">
                                        <span aria-hidden="false"><i class="fa fa-angle-right"></i></span>
                                    </a>
                                    @endif
                                </li>
                        </ul>
                    </nav>
                </div>
                <!-- /.blog-pagination -->
                @endif
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
</section>
<!--End blog single section-->
@endsection