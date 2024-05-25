<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\tag;
use App\Models\category;
use App\Models\keyword;
use App\Http\Requests\StoreblogRequest;
use App\Http\Requests\UpdateblogRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


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
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            $blogitems[$blogdata->id]['image'] = $blogdata->image;
        }
        //dd($blogitems);
        $alltags = tag::select('id', 'tag')->get();
        $alltag = [];
        foreach ($alltags as $tag) {
            $alltag[$tag->id] = $tag->tag;
        }

        $allkeywords = keyword::select('id', 'keyword')->get();
        $allkeyword = [];
        foreach ($allkeywords as $keyword) {
            $allkeyword[$keyword->id] = $keyword->keyword;
        }

        $allcategories = category::select('id', 'category')->get();
        $allcategory = [];
        foreach ($allcategories as $category) {
            $allcategory[$category->id] = $category->category;
        }

        return view('admin.manageblog', ['page_name' => 'manageblog', 'navstatus' => "manageblog", "blogsdata" => $blogitems, "tagsdata" => $alltag, "categorydata" => $allcategory, "keyworddata" => $allkeyword]);
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

        $tagid = implode(",", $tagid);
        $keywordid = implode(",", $keywordid);
        $categoryid = implode(",", $categoryid);

        $newblog = new blog;
        $newblog->tags = $tagid;
        $newblog->keyword = $keywordid;
        $newblog->category = $categoryid;
        $newblog->title = $request->name;
        $newblog->description = htmlentities($request->blogdescription);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'Blog' . time() . '.' . $ext;
            $file->move(public_path('blog'), $filename);

            $newblog->image = $filename;
        }
        //dd($newblog);
        if ($newblog->save()) {
            session(['status' => "1", 'msg' => 'Blog Add is successful']);
        } else {
            session(['status' => "0", 'msg' => 'Blog data is not Added']);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreblogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function bloglist(blog $blog)
    {
        // blog details
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
            $blogitems[$blogdata->id]['id'] = $blogdata->id;
            if (!empty($blogdata->image)) {
                $blogitems[$blogdata->id]['image'] = $blogdata->image;
            } else {
                $blogitems[$blogdata->id]['image'] = 'noimage.jpg';
            }
            $createdat = $blogdata->created_at;
            $blogitems[$blogdata->id]['createdat'] = $blogdata->created_at->format('d F, Y');
        }

        $alltags = tag::select('id', 'tag')->get();
        $alltag = [];
        foreach ($alltags as $tag) {
            $alltag[$tag->id] = $tag->tag;
        }

        $allkeywords = keyword::select('id', 'keyword')->get();
        $allkeyword = [];
        foreach ($allkeywords as $keyword) {
            $allkeyword[$keyword->id] = $keyword->keyword;
        }

        $allcategories = category::select('id', 'category')->get();
        $allcategory = [];
        foreach ($allcategories as $category) {
            $allcategory[$category->id] = $category->category;
        }
        //dd($alltag);
        return view('front.bloglist', ["blogitems" => $blogitems, "tagsdata" => $alltag, "categorydata" => $allcategory, "keyworddata" => $allkeyword]);
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

        $alltags = tag::select('id', 'tag')->get();
        $alltag = [];
        foreach ($alltags as $tag) {
            $alltag[$tag->id] = $tag->tag;
        }

        $allkeywords = keyword::select('id', 'keyword')->get();
        $allkeyword = [];
        foreach ($allkeywords as $keyword) {
            $allkeyword[$keyword->id] = $keyword->keyword;
        }

        $allcategories = category::select('id', 'category')->get();
        $allcategory = [];
        foreach ($allcategories as $category) {
            $allcategory[$category->id] = $category->category;
        }
        //dd($allcategory);
        return view('admin.editblog', ['page_name' => 'manageblog', 'navstatus' => "manageblog", "blogsdata" => $blogs, "tagsdata" => $alltag, "categorydata" => $allcategory, "keyworddata" => $allkeyword]);
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
        //dd($categoryid);
        $tagid = implode(",", $tagid);
        $keywordid = implode(",", $keywordid);
        $categoryid = implode(",", $categoryid);

        $updateblog['tags'] = $tagid;
        $updateblog['keyword'] = $keywordid;
        $updateblog['category'] = $categoryid;
        $updateblog['title'] = $request->name;
        $updateblog['description'] = htmlentities($request->blogdescription);
        // dd($updateblog['description']);
        // echo "<pre>";
        // print_r($updateblog);
        // echo "</pre>";
        // exit;
        if ($request->hasFile('newimage')) {

            $request->validate([
                'newimage' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);

            $file = $request->file('newimage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'Blog' . time() . '.' . $ext;
            $file->move(public_path('blog'), $filename);

            $updateblog['image'] = $filename;
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
