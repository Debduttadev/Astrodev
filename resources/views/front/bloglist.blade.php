@extends('layouts.frontlayout')
@section('content')

<!-- Section Title Blog -->
<div class="section-title-bg text-center m-bottom-20">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s">
        <strong>Our Blog</strong>
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

            <div class="col-md-8">
                <div class="row multi-columns-row">
                    @foreach ($blogitems as $blog)
                    <!-- === Blog item 1 === -->
                    <div class="col-sm-6 m-bottom-40">
                        <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                            <div class="blog-media">
                                <a href="blog_single_post.html"><img src="{{ URL::to('blog').'/'.$blog['image'] }}" alt="" /></a>
                            </div>
                            <!--post media-->

                            <div class="blog-post-info clearfix">
                                <span class="time"><i class="fa fa-calendar"></i>{{ $blog['createdat']}}</span>
                            </div>
                            <!--post info-->

                            <div class="blog-post-body">
                                <h4><a class="title" href="#">Working in Cool Head</a></h4>
                                @php
                                $small = substr( strip_tags($blog['description']), 0, 200);
                                @endphp
                                <p class="p-bottom-20">{!! $small !!}</p>
                                <a href="#" class="read-more">Read More >></a>
                            </div><!--post body-->
                            <!--post body-->
                        </div>
                        <!-- /.blog -->
                    </div>
                    <!-- /.inner-col -->
                    @endforeach
                </div>
                <!-- /.inner-row -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!--End blog single section-->
@endsection