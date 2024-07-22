@include('dashboard.head')

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="assets/images/logo-icon.svg" width="48" height="48" alt="Iconic"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Top navbar div start -->
        @include('dashboard.navbar')

        <!-- main left menu -->
        @include('dashboard.sidebar')

        <!-- rightbar icon div -->
        @include('dashboard.right_icon_bar')

        <!-- mani page content body part -->
        <div id="main-content" style="padding: 30px">
            <div class="body">
                <h3 style="
            text-align: center;
            text-transform: capitalize;
            color: var(--cyan);">add task</h3>

                <form id="basic-form" dir="rtl" method="post" action="{{ route('storetask') }}">
                    @csrf

                    <div class="form-group">
                        <label class="label"> العنوان</label>
                        <input type="text" name='title' class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="label"> المهام</label>
                        <textarea class="form-control" name='description' rows="5" cols="30" required=""
                            style="height: 168px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="label"> اسناد المهمة </label>
                        <select name="user" class="custom-select" required>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <input style="display: flex;
                margin: 7px auto;
                text-align: center;" type="submit" value="Add Task" class="btn btn-primary">

                </form>

            </div>
        </div>

    </div>



    @include('dashboard.footer')