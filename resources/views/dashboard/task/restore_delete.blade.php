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
                @if (session('restore_task'))
                <div class="alert alert-success">
                    {{session('restore_task')}}

                </div>
                @endif
                @if (session('delete_task'))
                <div class="alert alert-danger">
                    {{ session('delete_task') }}
                </div>

                @endif
                <h2 style="text-align: center;"> tasks deleted </h2>

                <table class="table mb-0 table-hover c_list">
                    <thead>
                        <tr>
                            <th>task</th>
                            <th>description</th>
                            <th>assign to</th>
                            <th>action</th>
                        </tr>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{$task->title }}
                            </td>
                            <td>
                                {{ $task->description }}
                            </td>
                            <td>
                                {{ App\Models\User::find($task->user)->name }}
                            </td>


                            <td>
                                <form action="{{ route('restore_task') }}" method="post" style="display: inline-flex;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-info" title="Edit">
                                        restore task </button>
                                </form>
                                <form action="{{ route('force_delete') }}" method="post" style="display: inline-flex;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-danger" title="delete">
                                        force delete</button>
                                </form>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    </thead>


                </table>
            </div>
        </div>

    </div>



    @include('dashboard.footer')