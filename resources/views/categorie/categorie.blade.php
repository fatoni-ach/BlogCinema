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
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <div class="panel-heading">
                All Categories
              </div>
              <div class="panel-body">              
              <form action="" method="post">
                @csrf
                @forelse($categories as $categorie)
                    <p>
                        {{$categorie->name}} <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$categorie->name}}" >hapus</a>
                        <a href="{{Route('categorie.edit', $categorie)}}" class="btn btn-info btn-sm">Edit</a>
                        <div class="modal fade" id="{{$categorie->name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin ingin menghapus?</h5>
                              </div>
                              <div class="modal-body">
                                <p>Kategori : {{$categorie->name}}</p>
                              </div>
                              <div class="modal-footer">
                                <a type="button" class="btn btn-danger" href="{{route('categorie.delete', $categorie)}}" >Ya</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </p>
                @empty
                    <p>Belum ada kategori dibuat</p>
                @endforelse
                <input type="text" name="categorie" id="categorie">
                <button type="submit" class="btn btn-primary btn-sm">Tambahkan kategori</button>
              </form>
                
              </div>

            </section>
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

