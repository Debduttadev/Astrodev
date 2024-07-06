<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\tag;
use App\Models\category;
use App\Models\keyword;
use App\Models\alttag;
use App\Http\Requests\StoreblogRequest;
use App\Http\Requests\UpdateblogRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manageblog()
    {
        $blogs = blog::get();
        $blogitems = [];
        foreach ($blogs as $blogdata) {

            $cataegoryid = explode(",", $blogdata->category);
            $categories = [];
            foreach ($cataegoryid as $id) {
                $category = category::where('id', $id)->first();
                $categories[$id] = $category->category;
            }
            $blogitems[$blogdata->id]['category'] = $categories;

            $keywordid = explode(",", $blogdata->keyword);
            $keywords = [];
            foreach ($keywordid as $id) {
                $keyword = keyword::where('id', $id)->first();
                $keywords[$id] = $keyword->keyword;
            }
            $blogitems[$blogdata->id]['keyword'] = $keywords;

            $tagid = explode(",", $blogdata->tags);
            $tags = [];
            foreach ($tagid as $id) {
                $tag = tag::where('id', $id)->first();
                $tags[$id] = $tag->tag;
            }
            $blogitems[$blogdata->id]['tag'] = $tags;

            $blogitems[$blogdata->id]['description'] = html_entity_decode($blogdata->description);
            $blogitems[$blogdata->id]['title'] = $blogdata->title;
            $blogitems[$blogdata->id]['nameurl'] = str_replace(" ", "-", strtolower(trim($blogdata->title)));
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            $blogitems[$blogdata->id]['image'] = $blogdata->image;
        }
        //dd($blogitems);

        return view('admin.manageblog', ['page_name' => 'manageblog', 'navstatus' => "manageblog", "blogsdata" => $blogitems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addblog(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);

        if (!empty($request->newtags)) {
            $tagdata = explode(",", $request->newtags);
        } else {
            $tagdata = [];
        }
        if (!empty($request->tags)) {
            $oldtag = $request->tags;
            $tagsdata = array_merge($oldtag, $tagdata);
        } else {
            $tagsdata = $tagdata;
        }

        if (!empty($tagsdata)) {
            $tagid = [];
            $i = 0;
            foreach ($tagsdata as $tag) {
                $ifdata = tag::where('tag', '=', $tag)->first();
                if ($ifdata === null) {
                    $savetag = new tag;
                    $savetag->tag = $tag;
                    $savetag->save();
                    $tagid[$i] = $savetag->id;
                    $i++;
                } else {
                    $tagid[$i] = $ifdata->id;
                    $i++;
                }
            }
        } else {
            session(['status' => "0", 'msg' => 'tag not selected']);
            return redirect()->back();
        }

        if (!empty($request->newkeyword)) {
            $keyworddata = explode(",", $request->newkeyword);
        } else {
            $keyworddata = [];
        }
        if (!empty($request->keyword)) {
            $oldkeyword = $request->keyword;
            $keywordsdata = array_merge($oldkeyword, $keyworddata);
        } else {
            $keywordsdata = $keyworddata;
        }

        if (!empty($keywordsdata)) {
            $keywordid = [];
            $k = 0;
            foreach ($keywordsdata as $keyword) {
                $ifdata = keyword::where('keyword', '=', $keyword)->first();
                if ($ifdata === null) {
                    $savekeyword = new keyword;
                    $savekeyword->keyword = $keyword;
                    $savekeyword->save();
                    $keywordid[$k] = $savekeyword->id;
                    $k++;
                } else {
                    $keywordid[$k] = $ifdata->id;
                    $k++;
                }
            }
        } else {
            session(['status' => "0", 'msg' => 'tag not selected']);
            return redirect()->back();
        }

        if (!empty($request->newcategory)) {
            $categorydata = explode(",", $request->newcategory);
        } else {
            $categorydata = [];
        }
        if (!empty($request->category)) {
            $oldcategory = $request->category;
            $categoriesdata = array_merge($oldcategory, $categorydata);
        } else {
            $categoriesdata = $categorydata;
        }

        if (!empty($categoriesdata)) {
            $categoryid = [];
            $c = 0;
            foreach ($categoriesdata as $category) {
                $ifdata = category::where('category', '=', $category)->first();
                if ($ifdata === null) {
                    $savecategory = new category;
                    $savecategory->category = $category;
                    $savecategory->save();
                    $categoryid[$c] = $savecategory->id;
                    $c++;
                } else {
                    $categoryid[$c] = $ifdata->id;
                    $c++;
                }
            }
        } else {
            session(['status' => "0", 'msg' => 'tag not selected']);
            return redirect()->back();
        }

        $nameurl = str_replace(" ", "-", strtolower(trim($request->name)));

        if (blog::where('nameurl', '=', $nameurl)->exists()) {

            session(['status' => "0", 'msg' => 'Blog name already exists']);
        } else {

            $tagid = implode(",", $tagid);
            $keywordid = implode(",", $keywordid);
            $categoryid = implode(",", $categoryid);

            $newblog = new blog;
            $newblog->tags = $tagid;
            $newblog->keyword = $keywordid;
            $newblog->category = $categoryid;
            $newblog->title = $request->name;
            $newblog->nameurl = $nameurl;
            $newblog->description = htmlentities($request->blogdescription);

            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
                ]);
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = 'Blog' . time() . '.' . $ext;
                $image = Image::read($file);
                // Resize image

                // resize image canvas
                // $image->resizeCanvas(1920, 1080);
                $image->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // $file = $request->file('image');
                // $ext = $file->getClientOriginalExtension();
                // $filename = 'Blog' . time() . '.' . $ext;
                // $file->move(public_path('blog'), $filename);
                if ($image->save(public_path('blog') . '/' . $filename)) {
                    $newblog->image = $filename;
                    // dd($newblog);
                }
            }
            //dd($newblog);
            if ($newblog->save()) {
                session(['status' => "1", 'msg' => 'Blog Add is successful']);
            } else {
                session(['status' => "0", 'msg' => 'Blog data is not Added']);
            }
        }
        return redirect()->back();
    }

    /**
     * show only one blog .
     */
    public function blog($nameurl)
    {
        //dd($id);
        $blogs = blog::where('nameurl', $nameurl)->first();

        $category = explode(',', $blogs->category);
        $similarblog = [];
        $i = 1;
        foreach ($category as $cat) {
            $catblog = blog::where(
                'category',
                'like',
                '%' . $cat . '%'
            )->inRandomOrder()->limit(4)->get();
            foreach ($catblog as $similar) {
                $similarblog[$i] = $similar;
                $i++;
            }
        }

        $blogitems = [];
        foreach ($similarblog as $blogdata) {

            $cataegoryid = explode(",", $blogdata->category);
            $categories = [];
            foreach ($cataegoryid as $id) {
                $category = category::where('id', $id)->first();
                $categories[$id] = $category->category;
            }
            $blogitems[$blogdata->id]['category'] = $categories;

            $keywordid = explode(",", $blogdata->keyword);
            $keywords = [];

            foreach ($keywordid as $id) {
                $keyword = keyword::where('id', $id)->first();
                $keywords[$id] = $keyword->keyword;
            }
            $blogitems[$blogdata->id]['keyword'] = $keywords;

            $tagid = explode(",", $blogdata->tags);
            $tags = [];

            foreach ($tagid as $id) {
                $tag = tag::where('id', $id)->first();
                $tags[$id] = $tag->tag;
            }

            $blogitems[$blogdata->id]['tag'] = $tags;
            $blogitems[$blogdata->id]['description'] = html_entity_decode($blogdata->description);
            $blogitems[$blogdata->id]['title'] = $blogdata->title;
            $blogitems[$blogdata->id]['nameurl'] = str_replace(" ", "-", strtolower(trim($blogdata->title)));
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            if (!empty($blogdata->image)) {
                $blogitems[$blogdata->id]['image'] = $blogdata->image;
            } else {
                $blogitems[$blogdata->id]['image'] = 'noimage.jpg';
            }
            $createdat = $blogdata->created_at;
            $blogitems[$blogdata->id]['createdat'] = $blogdata->created_at->format('d F, Y');
        }
        //dd($blogs);
        return view('front.soloblog', ["blogsdata" => $blogs, 'blogitems' => $blogitems]);
    }

    /**
     * Display the specified resource.
     */
    public function bloglist(blog $blog)
    {
        // blog details
        $limit = 4;
        $blogs = blog::limit($limit)->get();
        $blogcount = blog::count();
        $pagination = $blogcount / $limit;
        $pagination = ceil($pagination);
        //dd($pagination);
        $blogitems = [];
        foreach ($blogs as $blogdata) {

            $cataegoryid = explode(",", $blogdata->category);
            $categories = [];
            foreach ($cataegoryid as $id) {
                $category = category::where('id', $id)->first();
                $categories[$id] = $category->category;
            }
            $blogitems[$blogdata->id]['category'] = $categories;

            $keywordid = explode(",", $blogdata->keyword);
            $keywords = [];
            foreach ($keywordid as $id) {
                $keyword = keyword::where('id', $id)->first();
                $keywords[$id] = $keyword->keyword;
            }
            $blogitems[$blogdata->id]['keyword'] = $keywords;

            $tagid = explode(",", $blogdata->tags);
            $tags = [];
            foreach ($tagid as $id) {
                $tag = tag::where('id', $id)->first();
                $tags[$id] = $tag->tag;
            }
            $blogitems[$blogdata->id]['tag'] = $tags;

            $blogitems[$blogdata->id]['description'] = html_entity_decode($blogdata->description);
            $blogitems[$blogdata->id]['title'] = $blogdata->title;
            $blogitems[$blogdata->id]['nameurl'] = str_replace(" ", "-", strtolower(trim($blogdata->title)));
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            if (!empty($blogdata->image)) {
                $blogitems[$blogdata->id]['image'] = $blogdata->image;
            } else {
                $blogitems[$blogdata->id]['image'] = 'noimage.jpg';
            }
            $createdat = $blogdata->created_at;
            $blogitems[$blogdata->id]['createdat'] = $blogdata->created_at->format('d F, Y');
        }

        //dd($blogitems);
        return view('front.bloglist', ["blogitems" => $blogitems, 'pagination' => $pagination, 'page' => 1]);
    }


    public function bloglistpagination($page)
    {
        // blog details
        $limit = 4;
        $countpage = $page - 1;
        $offset = $limit * $countpage;

        $blogs = blog::offset($offset)->limit($limit)->get();
        $blogcount = blog::count();
        $pagination = $blogcount / $limit;
        $pagination = ceil($pagination);


        //dd($pagination);
        $blogitems = [];
        foreach ($blogs as $blogdata) {

            $cataegoryid = explode(",", $blogdata->category);
            $categories = [];
            foreach ($cataegoryid as $id) {
                $category = category::where('id', $id)->first();
                $categories[$id] = $category->category;
            }
            $blogitems[$blogdata->id]['category'] = $categories;

            $keywordid = explode(",", $blogdata->keyword);
            $keywords = [];
            foreach ($keywordid as $id) {
                $keyword = keyword::where('id', $id)->first();
                $keywords[$id] = $keyword->keyword;
            }
            $blogitems[$blogdata->id]['keyword'] = $keywords;

            $tagid = explode(",", $blogdata->tags);
            $tags = [];
            foreach ($tagid as $id) {
                $tag = tag::where('id', $id)->first();
                $tags[$id] = $tag->tag;
            }
            $blogitems[$blogdata->id]['tag'] = $tags;

            $blogitems[$blogdata->id]['description'] = html_entity_decode($blogdata->description);
            $blogitems[$blogdata->id]['title'] = $blogdata->title;
            $blogitems[$blogdata->id]['nameurl'] = str_replace(" ", "-", strtolower(trim($blogdata->title)));
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            if (!empty($blogdata->image)) {
                $blogitems[$blogdata->id]['image'] = $blogdata->image;
            } else {
                $blogitems[$blogdata->id]['image'] = 'noimage.jpg';
            }

            $createdat = $blogdata->created_at;
            $blogitems[$blogdata->id]['createdat'] = $blogdata->created_at->format('d F, Y');
        }

        // dd($allkeyword);
        return view('front.bloglist', ["blogitems" => $blogitems, 'pagination' => $pagination, 'page' => $page]);
    }

    /**
     * show only one blog .
     */
    public function searchblog(Request $request)
    {
        $data = $request;

        //dd($data->search);
        $search = $data->search;
        $type = $data->type;

        if ($type == 'created_at') {

            $year = [];
            $year = explode('-', $search);
            $year = array_reverse($year);
            $yearmonth = implode('-', $year);
            $blogs = blog::where(
                'created_at',
                'like',
                '%' . $yearmonth . '%'
            )->get();
        } else {
            $blogs = blog::where(
                $type,
                'like',
                '%' . $search . '%'
            )->get();
        }

        $blogitems = [];

        foreach ($blogs as $blogdata) {

            $cataegoryid = explode(",", $blogdata->category);
            $categories = [];
            foreach ($cataegoryid as $id) {
                $category = category::where('id', $id)->first();
                $categories[$id] = $category->category;
            }
            $blogitems[$blogdata->id]['category'] = $categories;

            $keywordid = explode(",", $blogdata->keyword);
            $keywords = [];
            foreach ($keywordid as $id) {
                $keyword = keyword::where('id', $id)->first();
                $keywords[$id] = $keyword->keyword;
            }
            $blogitems[$blogdata->id]['keyword'] = $keywords;

            $tagid = explode(",", $blogdata->tags);
            $tags = [];
            foreach ($tagid as $id) {
                $tag = tag::where('id', $id)->first();
                $tags[$id] = $tag->tag;
            }
            $blogitems[$blogdata->id]['tag'] = $tags;

            $blogitems[$blogdata->id]['description'] = substr(strip_tags(html_entity_decode($blogdata->description)), 0, 184);;
            $blogitems[$blogdata->id]['title'] = $blogdata->title;
            $blogitems[$blogdata->id]['nameurl'] = str_replace(" ", "-", strtolower(trim($blogdata->title)));
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            if (!empty($blogdata->image)) {
                $blogitems[$blogdata->id]['image'] = $blogdata->image;
            } else {
                $blogitems[$blogdata->id]['image'] = 'noimage.jpg';
            }

            $blogitems[$blogdata->id]['createdate'] = $blogdata->created_at->format('d F, Y');
        }

        if (count($blogitems) != 0) {
            print_r(json_encode($blogitems));
        } else {
            print_r(json_encode("0"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editblog($id)
    {
        $id = base64_decode($id);
        $blogs = blog::where('id', $id)->first();
        $blogitems = [];
        //dd($blogs);


        //dd($allcategory);
        return view('admin.editblog', ['page_name' => 'manageblog', 'navstatus' => "manageblog", "blogsdata" => $blogs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateblog(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);
        if (!empty($request->newtags)) {
            $tagdata = explode(",", $request->newtags);
        } else {
            $tagdata = [];
        }
        if (!empty($request->tags)) {
            $oldtag = $request->tags;
            $tagsdata = array_merge($oldtag, $tagdata);
        } else {
            $tagsdata = $tagdata;
        }

        $tagid = [];
        $i = 0;
        foreach ($tagsdata as $tag) {
            $ifdata = tag::where('tag', '=', $tag)->first();
            if ($ifdata === null) {
                $savetag = new tag;
                $savetag->tag = $tag;
                $savetag->save();
                $tagid[$i] = $savetag->id;
                $i++;
            } else {
                $tagid[$i] = $ifdata->id;
                $i++;
            }
        }

        if (!empty($request->newkeyword)) {
            $keyworddata = explode(",", $request->newkeyword);
        } else {
            $keyworddata = [];
        }
        if (!empty($request->keyword)) {
            $oldkeyword = $request->keyword;
            $keywordsdata = array_merge($oldkeyword, $keyworddata);
        } else {
            $keywordsdata = $keyworddata;
        }
        $keywordid = [];
        $k = 0;
        foreach ($keywordsdata as $keyword) {
            $ifdata = keyword::where('keyword', '=', $keyword)->first();
            if ($ifdata === null) {
                $savekeyword = new keyword;
                $savekeyword->keyword = $keyword;
                $savekeyword->save();
                $keywordid[$k] = $savekeyword->id;
                $k++;
            } else {
                $keywordid[$k] = $ifdata->id;
                $k++;
            }
        }

        if (!empty($request->newcategory)) {
            $categorydata = explode(",", $request->newcategory);
        } else {
            $categorydata = [];
        }
        if (!empty($request->category)) {
            $oldcategory = $request->category;
            $categoriesdata = array_merge($oldcategory, $categorydata);
        } else {
            $categoriesdata = $categorydata;
        }
        $categoryid = [];
        $c = 0;
        foreach ($categoriesdata as $category) {
            $ifdata = category::where('category', '=', $category)->first();
            if ($ifdata === null) {
                $savecategory = new category;
                $savecategory->category = $category;
                $savecategory->save();
                $categoryid[$c] = $savecategory->id;
                $c++;
            } else {
                $categoryid[$c] = $ifdata->id;
                $c++;
            }
        }

        $nameurl = str_replace(" ", "-", strtolower(trim($request->name)));
        if (blog::where([['nameurl', '=', $nameurl], ['id', '!=', $request->id]])->exists()) {
            // data found
            session(['status' => "0", 'msg' => 'Blog name already exists']);
        } else {
            // data not found

            //dd($categoryid);
            $tagid = implode(",", $tagid);
            $keywordid = implode(",", $keywordid);
            $categoryid = implode(",", $categoryid);

            $updateblog['tags'] = $tagid;
            $updateblog['keyword'] = $keywordid;
            $updateblog['category'] = $categoryid;
            $updateblog['title'] = $request->name;
            $updateblog['nameurl'] = $nameurl;
            $updateblog['description'] = htmlentities($request->blogdescription);

            if ($request->hasFile('newimage')) {

                $request->validate([
                    'newimage' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
                ]);

                $file = $request->file('newimage');
                $ext = $file->getClientOriginalExtension();
                $filename = 'Blog' . time() . '.' . $ext;
                $image = Image::read($file);
                // Resize image

                // resize image canvas
                // $image->resizeCanvas(1920, 1080);
                $image->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                });
                if ($image->save(public_path('blog') . '/' . $filename)) {
                    $image = public_path('about') . '/' . $request->oldimage;
                    unlink($image);
                    $updateblog['image'] = $filename;
                }
            } else {
                $updateblog['image'] = $request->oldimage;
            }
            //dd($updateblog);
            $update = blog::where('id', $request->id)
                ->update($updateblog);

            if ($update) {
                session(['status' => "1", 'msg' => 'Blog update is successful']);
            } else {
                session(['status' => "0", 'msg' => 'Blog data is not Updated']);
            }
        }
        return redirect('/manageblog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteblog(Request $request)
    {
        $id = base64_decode($request->id);
        if (!empty($request->blogimage)) {
            $image = public_path('blog') . '/' . $request->blogimage;
        }

        //echo json_encode(array('status' => 1, 'msg' => $id));
        $blog = blog::where('id', $id)->delete();
        $altblog = alttag::where([['relatedid', $id], ['page', 'blog']])->delete();
        if ($blog) {
            if (isset($image)) {
                unlink($image);
            }

            echo json_encode(array('status' => 1, 'msg' => "true"));
        } else {
            echo json_encode(array('status' => 0, 'msg' => "false"));
        }
    }
}
