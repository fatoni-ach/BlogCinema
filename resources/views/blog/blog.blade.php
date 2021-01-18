@extends('master.master_admin')

@section('title')
    <title>Admin - {{$context['title']}}</title>
@endsection

@section('content')
<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> {{$context['title_body']}}</h3>
            
            <!-- <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('blog')}}">Blog</a></li>
              <li><i class="fa fa-laptop"></i>{{$context['title_body']}}</li>
            </ol> -->
          </div>
          <div class="text-center mr-10">
                <a href="{{route('blog.create')}}" class="btn btn-primary">
                  <span class="icon_plus_alt">
                  </span>tambah
                </a>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-heading">
                All Post  
              </div>
              <div class="panel-body">
                @forelse($posts as $post)
                  <div class="col-lg-6">
                    <h2 class="entry-title" itemprop="headline">
                      <a href="{{route('show', $post->slug )}}"
                        alt="" itemprop="url"
                        rel="bookmark">{{Str::limit($post->judul, 25)}}</a>
                    </h2> 
                    <span><i class="dashicons dashicons-controls-play"></i> 
                    <p>{{Str::limit($post->deskripsi, 60)}} </p>
                    <p><a href="{{route('show', $post->slug )}}">Read more</a></p> 

                    
                    </span> <span itemprop="author" itemscope=""
                      itemtype="https://schema.org/Person" class="author vcard"><i
                        class="dashicons dashicons-admin-users"></i> </span> <span><i
                        class="dashicons dashicons-calendar"></i> <b>Released on</b>: 
                        {{$post->created_at->diffForHumans()}}</span>
                        <a class="btn btn-warning" href="{{route('edit', $post->slug)}}">Edit</a>
                  </div>
                @empty
                  <div class="col-lg-12">
                    <div class="alert alert-success fade in">
                      <h2>Tidak ada postingan</h2>
                    </div>
                  </div>
                @endforelse
              </div>

            </section>
            {{$posts->links()}}
          </div>
        </div>

      <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <!-- Designed by <a href="{{url('admin')}}">BootstrapMade</a> -->
        </div>
      </div>
    </section>
@endsection