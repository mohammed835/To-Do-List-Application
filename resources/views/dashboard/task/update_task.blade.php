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
            color: var(--cyan);">edit task</h3>
                @foreach ($task as $data)
                <form id="basic-form" method="post" action="{{ route('edit_task') }}">
                    @csrf

                    <div class="form-group">
                        <label class="label">Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control" required>
                    </div>
                    <input type="hidden" name="id" value="{{$data->id  }}">
                    <div class="form-group">
                        <label class="label">Description</label>
                        <textarea class="form-control" name="description" rows="5" cols="30" required
                            style="height: 168px;">{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="label">Assign Task</label>
                        <select name="user" class="custom-select">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $data->user ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <input style="display: flex; margin: 7px auto; text-align: center;" type="submit" value="Edit Task"
                        class="btn btn-primary">
                </form>
                @endforeach



            </div>
        </div>

    </div>



    @include('dashboard.footer')