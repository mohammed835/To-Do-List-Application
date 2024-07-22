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
                @if (session('delete_task'))
                <div class="alert alert-danger">
                    {{ session('delete_task') }}
                </div>

                @endif
                <h2 style="text-align: center;"> All tasks sent to members </h2>
                <table class="table mb-0 table-hover c_list">
                    <thead>
                        <tr>
                            <th>التاسك</th>
                            <th>مسند الي</th>
                            <th>حالة التاسك</th>
                            <th>تعليق المسند اليه</th>
                            <th>حدث</th>
                        </tr>
                    <tbody>
                        @foreach ($data as $data)
                        @foreach ($data->tasks as $task)

                        @foreach ($task->comments as $comment)
                        <tr>
                            <td>
                                {{$task->title }}
                            </td>
                            <td>
                                {{ App\Models\User::find($task->user)->name }}
                            </td>
                            <td>
                                {{ $comment->task_status }}
                            </td>
                            <td>
                                {{ $comment->comment }}

                            </td>
                            <td>
                                <a href="{{ route('deletetask',$task->id) }}" class="btn btn-danger js-sweetalert"
                                    title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></a>
                            </td>

                        </tr>

                        @endforeach
                        @endforeach

                        @endforeach

                    </tbody>
                    </thead>


                </table>
            </div>
        </div>

    </div>



    @include('dashboard.footer')