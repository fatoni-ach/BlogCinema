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
            <ol class="breadcrumb">
              <li><i class="fa fa-laptop"></i><a href="{{url('blog')}}">Blog</a></li>
              <li><i class="fa fa-laptop"></i>{{$context['title_body']}}</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                {{$context['title']}}
              </header>
              <div class="panel-body">
                  <div class="col-md-12">
                    <!-- <div class="text-center">
                      <a class="btn btn-default" href="{{route('edit', $post->slug)}}">Edit</a>
                    </div> -->
                    
                    <h2 class="entry-title" itemprop="headline"><a
                        href="{{route('show', $post->slug )}}"
                        alt="" itemprop="url"
                        rel="bookmark">{{$post->judul}}</a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#DeletePosting">
                        <i class="icon_trash_alt"></i> 
                        Hapus</a>
                        <div class="modal fade" id="DeletePosting" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin ingin menghapus?</h5>
                              </div>
                              <div class="modal-body">
                                <p>Postingan : {{$post->judul}}</p>
                              </div>
                              <div class="modal-footer">
                                <a type="button" class="btn btn-danger" href="{{route('delete', $post->slug)}}" >Ya</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </h2> 
                        <span>
                          <p>
                            Diposting oleh : {{$post->posted_by}}
                          </p>
                        </span>
                        <span>
                          <p>
                            Genre :
                            @foreach($post->categories as $categorie)
                              {{$categorie->name}} &middot
                            @endforeach
                          </p>
                        </span>
                        <br>
                        <span>
                          <i class="dashicons dashicons-controls-play"></i> 
                          <!-- <p align=center class="indented" >{{$post->deskripsi}}</p> -->
                          <p align=center>{!! nl2br(e($post->deskripsi)) !!}</p>
                        </span> 
                        <br>
                        <h4 class="txt-info">Link Download</h4>
                        @forelse( $link_downloads as $ld )
                        <!-- <div class="alert alert-success"> -->
                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              {{$ld->name}}
                            </div>
                            <div class="panel-body">
                              @if(!empty($ld->link_1))
                              <a class="btn btn-primary btn-sm" href="{{$ld->link_1}}">480p</a>
                              @endif
                              @if(!empty($ld->link_2))
                              <a class="btn btn-primary btn-sm" href="{{$ld->link_2}}">720p</a>
                              @endif
                              @if(!empty($ld->link_3))
                              <a class="btn btn-primary btn-sm" href="{{$ld->link_3}}">1080p</a>
                              @endif
                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$ld->id}}" > <i class="icon_trash_alt"></i> </a>
                                <div class="modal fade" id="exampleModalCenter{{$ld->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin ingin menghapus?</h5>
                                      </div>
                                      <div class="modal-body">
                                        <p>{{$ld->name}}</p>
                                      </div>
                                      <div class="modal-footer">
                                        <a type="button" class="btn btn-danger" href="{{route('link.delete', $ld->slug)}}" >Ya</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>      
                          
                        <!-- </div> -->
                        @empty
                        <div class="alert alert-danger fade in">
                          <p>
                              link belum tersedia
                          </p>
                        
                        </div>
                        @endforelse
                        <p>
                            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                              Tambahkan Link
                            </button>
                          </p> 
                        <div class="collapse" id="collapseExample">
                          <div class="card card-body">
                          <form class="form-horizontal " method="post">
                            @csrf
                            <input type="hidden" name="slug" value="{{$post->slug}}">
                            <div class="form-group">
                              <div class="col-sm-5">
                                <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control"
                                placeholder="Nama Link">
                              </div>
                            </div>
                            <div class="form-group">
                            <div class="col-lg-5">
                              <div class="row">
                                <div class="col-lg-4">
                                  <input id="link_1" name="link_1" value="{{ old('link_1') }}" type="text" class="form-control" placeholder="480p">
                                </div>
                                <div class="col-lg-4">
                                  <input id="link_2" name="link_2" value="{{ old('link_2') }}" type="text" class="form-control" placeholder="720p">
                                </div>
                                <div class="col-lg-4">
                                  <input id="link_3" name="link_3" value="{{ old('link_3') }}" type="text" class="form-control" placeholder="1080p">
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-10">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <!-- <a class="btn btn-default" type="submit" href="{{url()->previous()}}" >Cancel</a> -->
                                
                              </div>
                            </div>
                          </form>
                          </div>
                        </div>
                        <br>
                        <span itemprop="author" itemscope=""
                          itemtype="https://schema.org/Person" class="author vcard"><i
                          class="dashicons dashicons-admin-users"></i> </span> <span><i
                          class="dashicons dashicons-calendar"></i> <b>Released on</b>: 
                          {{$post->created_at->diffForHumans()}}
                        </span>
                  </div>
              </div>
            </section>
          </div>
        </div>

      <div class="text-right">
        <div class="credits">
        </div>
      </div>
    </section>
@endsection