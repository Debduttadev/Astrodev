@extends('layouts.frontlayout')
@section('content')
<div class="section-title-bg text-center m-bottom-20">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s">
        <strong>Blog Details</strong>
    </h2>
    <!-- End Regular Section -->
    <div class="divider-center divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
</div>
<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80">

    <!--Container-->
    <div class="container clearfix">
        <div class="row">

            <div class="col-md-2 sidebar">
                <a href="{{ URL::to('/blogs') }}">
                    <ol class="breadcrumb" style="background-color: #000000;">
                        <li>All Blogs</li>
                    </ol>
                </a>
                <!-- Widget 1 -->
                @php
                $blogfilters=blogfilters();

                $categorydata=$blogfilters['allcategory'];
                $tagsdata=$blogfilters['alltag'];
                $keyworddata=$blogfilters['allkeyword'];

                @endphp

            </div>
            <!-- /.col -->

            <div class=" col-sm-8">
                <!--Post Single-->
                <div class="postSingle blogsearchdetails">
                    @php
                    $alttagforimages = alttagforimages();
                    $alttag=$alttagforimages['blog'][$blogsdata['id']]['alttag'];
                    $title=$alttagforimages['blog'][$blogsdata['id']]['title'];
                    @endphp
                    <div class="postMedia">
                        <img alt="{{$alttag}}" src="{{ URL::to('blog').'/'.$blogsdata['image'] }}" title="{{$title}}">
                    </div><!--Post image-->

                    <div class="postMeta clearfix">
                        <div class="postMeta-info">

                        </div>
                        <div class="postMeta-date">
                            <span class="metaDate"><i class="fa fa-calendar"></i> <a href="#">{{ date_format($blogsdata['created_at'],"d F, Y")}}</a></span>
                        </div>
                    </div><!--Post meta-->

                    <div class="postTitle">
                        <h1>{{ $blogsdata['title'].$blogsdata['createdat']}}</h1>
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
        <!-- End Regular Section -->
        <div class="divider-center divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        <!-- Start blog -->
        <section id="blog" class="p-top-80 p-bottom-80">

            <div class="container ">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Section Title -->
                        <div class="section-title text-center m-bottom-40">
                            <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Similar Category Blogs </h2>
                        </div>
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
                <div class="row">
                    <!-- === blog === -->
                    <div id="owl-blog" class="owl-carousel owl-theme">
                        @php
                        $alttagforimages =alttagforimages();
                        @endphp
                        @foreach ($blogitems as $blog)
                        <!-- === Blog item 1 === -->
                        <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                            @php
                            $alttag=$alttagforimages['blog'][$blog['id']]['alttag'];
                            $title=$alttagforimages['blog'][$blog['id']]['title'];
                            @endphp
                            <div class="blog-media">
                                <a href="{{ URL::to('/blog').'/'.$blog['nameurl'] }}"><img src="{{ URL::to('blog').'/'.$blog['image'] }}" alt="{{$alttag}}" title="{{$title}}"></a>
                            </div><!--post media-->

                            <div class="blog-post-info clearfix">
                                <span class="time"><i class="fa fa-calendar"></i>{{ $blog['createdat']}}</span>
                            </div><!--post info-->

                            <div class="blog-post-body">
                                <h4><a class="title" href="#">{{ $blog['title']}}</a></h4>
                                @php
                                $small = substr( strip_tags($blog['description']), 0, 200);
                                @endphp
                                <p class="p-bottom-20">{!! $small !!}</p>
                                <a href="{{ URL::to('/blog').'/'.$blog['nameurl'] }}" class=" read-more">Read More >></a>
                            </div><!--post body-->
                        </div> <!-- /.blog -->
                        @endforeach
                    </div><!-- /#owl-testimonials -->

                </div> <!-- /.row -->
                <a href="{{ URL::to('/blogs') }}" class="m-top-30 m-bottom-30 btn btn-main wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">See more Blogs</a>
            </div> <!-- /.container -->

        </section>
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection