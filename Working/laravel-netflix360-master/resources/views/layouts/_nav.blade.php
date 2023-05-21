<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

    <div class="container">

        <a class="navbar-brand" href="{{ route('welcome') }}">Netflix<span class="text-primary font-weight-bold">ify</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="" class="col-12 col-md-6 p-0 mt-1">
                <div class="input-group">
                    <input type="search" class="form-control bg-transparent border-0" placeholder="Search for your favorite movies">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-white border-0" id="basic-addon2"><i class="fas fa-search"></i></span>
                    </div>
                     
                </div>
            </form><!-- end of form -->
            <div class="col-12 col-md-6 p-0 mt-1">
               <span>
                    <select  class="input-group-text bg-transparent mr-0 pr-0 border-0" name="" onChange="onChange()"  id="kID">
                                <option value="" selected hidden>Select Category</option>
                                <option value="1">Action</option>
                                <option value="2">Drama</option>
                                <option value="3">Comic</option>
                                <option value="4">Fiction</option>
                                <option value="5">Romantic</option>
                                <option value="6">Horror</option>
                                <option value="7">War</option>
                                <option value="8">Adventure</option>
                                <option value="9">Vagueness</option>
                                <option value="10">Excitement</option>


                        </select>
                </span>
            </div>

           
            <ul class="navbar-nav " style="position:relative;right:124px">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('movies.index', ['favorite' => 1]) }}" class="nav-link text-white" style="position: relative;">
                            <i class="fa fa-heart"></i>
                            <span class="bg-primary text-white d-flex justify-content-center align-items-center"
                                  style="position: absolute; top: 0; right: -15px; width: 30px; height: 20px; border-radius: 50px;"
                                  id="nav__fav-count"
                                  data-fav-count="{{ auth()->user()->movies_count }}"
                            >
                            {{ auth()->user()->movies_count > 9 ? '9+' : auth()->user()->movies_count }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
                                <a class="dropdown-item" href="{{ route('dashboard.welcome') }}">
                                    <i class="fa fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i>
                                Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                @else
                    <a href="{{ route('login') }}" class="btn btn-primary mb-2 mb-md-0 mr-0 mr-md-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @endauth
            </ul>

        </div><!-- end of collapse -->

    </div><!-- end of container fluid-->

</nav><!-- end of nav -->
<script type='text/javascript'>
        function onChange(){
            var kategori = document.getElementById('kID').value;
            if (kategori) { 
                var slug =kategori ;
                var base = "{!! route('filters','') !!}";
                var url = base+'/'+slug ;
                window.location.href = url ;

            }
            
        }
    
</script>