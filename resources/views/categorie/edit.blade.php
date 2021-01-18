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
                <input type="text" name="name" id="name" value="{{$categorie->name}}">
                <button type="submit" class="btn btn-warning btn-sm"> Update </button>
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

