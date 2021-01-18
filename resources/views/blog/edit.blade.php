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
              <li><i class="fa fa-laptop"></i><a href="{{url('blog')}}">Blog</a></li>
              <li><i class="fa fa-laptop"></i>{{$context['title_body']}}</li>
            </ol> -->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                {{$context['title']}}
              </header>
              <div class="panel-body">
              <form class="form-horizontal " method="post">
                @method('patch')
                @csrf
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Judul</label>
                    <div class="col-sm-10">
                      <input id="judul" name="judul" value="{{ old('judul') ?? $post->judul }}" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Di posting oleh </label>
                    <div class="col-sm-10">
                      <input disabled id="posted_by" name="posted_by" value="{{ old('posted_by') ?? $post->posted_by }}" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                    <select name="categorie[]" id="categorie" class="form-control" multiple >
                        <option disabled selected > Choose one!! </option>
                        @foreach($post->categories as $categorie)
                          <option selected value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                        @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                      </select>                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea id="deskripsi" name="deskripsi" type="text" class="form-control" style="height:200px;">{{old('deskripsi') ?? $post->deskripsi}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a class="btn btn-default" type="submit" href="{{url()->previous()}}" >Cancel</a>
                      </div>
                    </div>
                </form>
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