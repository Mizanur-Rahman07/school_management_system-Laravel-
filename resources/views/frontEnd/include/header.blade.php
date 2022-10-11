<!-- Start header -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('/')}}"><img src="{{asset('frontEndAsset')}}/images/logo.png"
                    alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="{{route('/')}}">Home</a></li>
                    <li><a class="nav-link" href="{{route('about')}}">About</a></li>
                    <li><a class="nav-link" href="{{route('course')}}">Courses</a></li>
                    <li><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-o" aria-hidden="true"></i>
                            Admin</a></li>

                    <li class="dropdown">
                        <a class="nav-link" href="" data-toggle="dropdown" aria-expanded="false">Sign In</a>
                        <ul class="dropdown-menu">

                            @if(Session::get('studentId'))
                            <li><a class="nav-link"
                                    href="{{route('student-profile')}}">{{ Session::get('studentName')}}</a></li>
                            <li><a class="nav-link" href="{{route('student-logout')}}">Logout</a></li>
                            @else
                            <li><a class="nav-link" href="{{route('student-login')}}">Student As Login</a></li>
                            <li><a class="nav-link" href="{{route('student-register')}}">Student_As_Register</a></li>
                            @endif



                            @if(Session::get('teacherId'))
                            <li><a class="nav-link" href="{{route('teacher-profile')}}"><i class="fa fa-user-o"
                                        aria-hidden="true"></i> {{ Session::get('teacherName')}}</a></li>
                            <li><a class="nav-link" href="{{route('teacher-logout')}}">Logout</a></li>
                            @else
                            <li><a class="nav-link" href="{{route('teacher-login')}}">Teacher Login</a></li>
                            @endif

                        </ul>
                    </li>



                    <!-- @if(Session::get('studentId'))
                    <li><a class="nav-link" href="{{route('student-login')}}">{{ Session::get('studentName')}}</a></li>
                    <li><a class="nav-link" href="{{route('student-logout')}}">Logout</a></li>
                    @else
                    <li><a class="nav-link" href="{{route('student-login')}}">Login</a></li>
                    <li><a class="nav-link" href="{{route('student-register')}}">Register</a></li>
                    @endif

                    @if(Session::get('teacherId'))
                    <li><a class="nav-link" href="{{route('teacher-profile')}}">{{ Session::get('teacherName')}}</a>
                    </li>
                    <li><a class="nav-link" href="{{route('teacher-logout')}}">Logout</a></li>
                    @else
                    <li><a class="nav-link" href="{{route('teacher-login')}}">Teacher Login</a></li>
                    @endif -->

                </ul>
            </div>
            <!-- <div class="search-box">
                    <input type="text" class="search-txt" placeholder="Search">
                    <a class="search-btn">
                        <img src="{{asset('frontEndAsset')}}/images/search_icon.png" alt="#" />
                    </a>
                </div> -->
        </div>
    </nav>
</header>
<!-- End header -->