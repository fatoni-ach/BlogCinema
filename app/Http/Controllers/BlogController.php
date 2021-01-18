<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Post, Categorie};
use Auth;
use App\LinkDownload;


class BlogController extends Controller
{
    public function blog()
    {   
        // $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        $posts = Post::latest()->paginate(6);
        // $posts = Post::paginate(6);
        // $posts->deskripsi = \Str::limit(30);
        $context = array(
            "title"         => "Blog",
            "title_body"    => "All-Post"
        );
        // dd($posts->judul);
        return view('blog.blog', compact('context', 'posts'));
    }

    public function show(Post $post)
    {   
        $link_downloads = $post->link_downloads->sortBy('name');
        // dd($post);

        $context = array(
            "title"         => "Blog",
            "title_body"    => "Show"
        );
        // dd($post);
        return view('blog.show', compact('context', 'post', 'link_downloads'));
    }

    public function create(Request $request, Categorie $categories)
    {   
        if($request->method() == "POST"){
            $post = Post::create([
                'judul' => $request['judul'],
                'slug'  => \Str::slug($request['judul']),
                'deskripsi' => $request['deskripsi'],
                'genre' => "genre",
                'link_video' => "",
                'link_download' => "",
                'link_gambar' => "",
                'posted_by' => Auth::user()->name,
            ]);
            // return redirect('blog');
            $post->categories()->attach(request('categorie'));
            return redirect('blog');
        }
        $post = new Post();
        $context = array(
            "title"         => "Create Post",
            "title_body"    => "Create Post"
        );
        $categories = $categories->get();
        return view('blog.create', compact('context', 'post', 'categories'));
    }

    public function save_link(Request $request)
    {   
        $post = Post::firstWhere('slug', $request['slug']);
        if($request->method() == "POST"){
            LinkDownload::create([
                'name' => $request['name'],
                'slug'  => \Str::slug($request['link_1']),
                'link_1' => $request['link_1'],
                'link_2' => $request['link_2'],
                'link_3' => $request['link_3'],
                'post_id' => $post->id,
            ]);
            // return redirect('blog');
            return redirect(url()->previous());
        }
    }

    public function link_delete(LinkDownload $link_download)
    {   
        // dd($link_download);
        $post = Post::firstWhere('id', $link_download->post_id);
        // dd($post);
        $link_download->delete();
        return redirect()->route('show', $post->slug);
    }

    public function edit_post(Post $post, Request $request, Categorie $categories)
    {   
        if($request->method() == "PATCH"){
            // dd($request->all());
            $post->update($request->all());
            $post->categories()->sync(request('categorie'));
            // $post->save();
            return redirect('blog');
        }
        $context = array(
            "title"         => "Edit Post",
            "title_body"    => "Edit Post"
        );

        $categories = $categories->get();

        return view('blog.edit', compact('context', 'post', 'categories'));
    }

    public function delete_post(Post $post)
    {
        $link_downloads = LinkDownload::Where('post_id', $post->id);
        // dd($link_downloads);
        $post->categories()->detach();
        $link_downloads->delete();
        $post->delete();

        return redirect('blog');
    }
}
