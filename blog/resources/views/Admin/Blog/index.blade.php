@extends('admin_layout.master')
@section('content')
@include('inc.success')
<style>
    .show{
        display: none;
    }
</style>
<body>

    <div class="container">
        <div class="d-flex justify-content-between m-2">
            <a class="btn btn-primary show" href="{{url('AdminBlogs/create')}}" id='addbtn'>Add Blog</a>
            <button href="#" class="btn btn-success" id="customize">Customize Page</button>
            </div>

    <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8">
        <div class="container">
            <div class="row">
            <!-- post -->
            @foreach ($blogs as $item)
            <div class="post col-xl-6">
                <div class="control show delete" >
                    <form action="{{ route('AdminBlogs.destroy',$item->id) }}" method="Post" style="display: inline-block">
                        @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                    <a href="{{url('AdminBlogs/'.$item->id.'/edit')}}" class="btn btn-primary">Edit</a>
                </div>
                <div class="post-thumbnail"><a href="post.html"><img src="img/{{$item->image}} "alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">20 May | 2016</div>
                    <div class="category"><a href="#">{{$item->tag}}</a></div>
                </div><a href="post.html">
                    <h3 class="h4">{{$item->title}}</h3></a>
                <p class="text-muted">{{$item->description}}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                </footer>
                </div>
            </div>
            @endforeach
            <!-- Pagination -->
            {{$blogs->links()}}
            </div>
          </main>
          <aside class="col-lg-4">
            <!-- Widget [Search Bar Widget]-->
            <div class="widget search">
              <header>
                <h3 class="h6">Search the blog</h3>
              </header>
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="search" placeholder="What are you looking for?">
                  <button type="submit" class="submit"><i class="icon-search"></i></button>
                </div>
              </form>
            </div>
            <!-- Widget [Latest Posts Widget]        -->
            <div class="widget latest-posts">
              <header>
                <h3 class="h6">Latest Posts</h3>
              </header>
              <div class="blog-posts"><a href="#">
                  <div class="item d-flex align-items-center">
                    <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                      <div class="d-flex align-items-center">
                        <div class="views"><i class="icon-eye"></i> 500</div>
                        <div class="comments"><i class="icon-comment"></i>12</div>
                      </div>
                    </div>
                  </div></a><a href="#">
                  <div class="item d-flex align-items-center">
                    <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                      <div class="d-flex align-items-center">
                        <div class="views"><i class="icon-eye"></i> 500</div>
                        <div class="comments"><i class="icon-comment"></i>12</div>
                      </div>
                    </div>
                  </div></a><a href="#">
                  <div class="item d-flex align-items-center">
                    <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                      <div class="d-flex align-items-center">
                        <div class="views"><i class="icon-eye"></i> 500</div>
                        <div class="comments"><i class="icon-comment"></i>12</div>
                      </div>
                    </div>
                  </div></a></div>
            </div>
            <!-- Widget [Categories Widget]-->
            <div class="widget categories">
              <header>
                <h3 class="h6">Categories</h3>
              </header>
              <div class="item d-flex justify-content-between"><a href="#">Growth</a><span>12</span></div>
              <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
              <div class="item d-flex justify-content-between"><a href="#">Sales</a><span>8</span></div>
              <div class="item d-flex justify-content-between"><a href="#">Tips</a><span>17</span></div>
              <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
            </div>
            <!-- Widget [Tags Cloud Widget]-->
            <div class="widget tags">
              <header>
                <h3 class="h6">Tags</h3>
              </header>
              <ul class="list-inline">
                @foreach ($blogs as $item)
                <li class="list-inline-item"><a href="#" class="tag">{{$item->tag}}</a></li>
                @endforeach
              </ul>
            </div>
          </aside>
        </div>
      </div>


    <script>
        let btn=document.getElementById('customize');
        let addbtn=document.getElementById('addbtn');
        let deletebtn=document.querySelectorAll('.delete');
        btn.addEventListener('click',function(){
            addbtn.classList.toggle('show');
        })
        for(let item of deletebtn){
            btn.addEventListener('click',function(){
                item.classList.toggle('show');
        })
        }
    </script>
    @endsection
