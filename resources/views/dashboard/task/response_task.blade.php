@include('dashboard.head')
<style>
    .taskboard {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
    }

    .dd-list {
        list-style: none;
        padding-left: 0;
    }

    .dd-item {
        margin-bottom: 15px;
    }

    .dd-handle {
        background-color: #4a90e2;
        color: white;
        padding: 10px 15px;
        border-radius: 5px 5px 0 0;
        cursor: move;
        font-weight: bold;
    }

    .dd-content {
        background-color: white;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 5px 5px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .dd-content h5 {
        font-size: 18px;
        margin: 0 0 10px 0;
    }

    .dd-content p {
        margin: 0 0 15px 0;
        color: #666;
    }

    .action {
        text-align: right;
    }

    .btn-outline-danger {
        border-color: #ff4d4f;
        color: #ff4d4f;
        transition: all 0.3s ease;
    }

    .btn-outline-danger:hover {
        background-color: #ff4d4f;
        color: white;
    }

    .icon-trash {
        font-size: 16px;
        vertical-align: middle;
    }
</style>

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
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h2>TaskBoard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a>
                                </li>
                                <li class="breadcrumb-item">App</li>
                                <li class="breadcrumb-item active">TaskBoard</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="flex-row-reverse d-flex">
                                <div class="page_action">
                                    <button type="button" class="btn btn-primary">Generate Report</button>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#new_task">Add New</button>
                                </div>
                                <div class="p-2 d-flex">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('delete_task'))
                <div class="alert alert-danger">
                    {{ session('delete_task') }}
                </div>

                @endif
                <div class="clearfix row row-deck">

                    <div class="col-lg-4 col-md-12">
                        <div class="card planned_task">
                            <div class="header">
                                <h2>Planned</h2>
                            </div>
                            <div class="body taskboard">
                                @if ( $data)
                                @foreach ($data as $item)
                                @if ($item->tasks)
                                @foreach ($item->tasks as $task)
                                @foreach ($task->comments as $comment)
                                @if ($comment->task_status == 0)
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle" style="background: #ff0;; color:#000">Assigne to :
                                                {{App\Models\User::find($task->user)->name }}</div>
                                            <div class="dd-content p-15">
                                                <h5>{{ $task->title }}</h5>
                                                <p>Assignee's response : <br> {{ $comment->comment }}</p>
                                                <hr>
                                                <div class="action">
                                                    <a href="{{ route('deletetask',$task->id) }}"
                                                        class="btn btn-danger js-sweetalert" title="Delete"
                                                        data-type="confirm"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                                @endif
                                @endforeach
                                @else
                                <p>No planned tasks available.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card progress_task">
                            <div class="header">
                                <h2>In progress</h2>
                            </div>
                            <div class="body taskboard">
                                @if ($data)
                                @foreach ($data as $item)
                                @if ($item->tasks)
                                @foreach ($item->tasks as $task)
                                @foreach ($task->comments as $comment)
                                @if ($comment->task_status == 1)
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle" style="background: rgb(40, 210, 18); color:#000">
                                                Assigne to : {{
                                                App\Models\User::find($task->user)->name }}</div>
                                            <div class="dd-content p-15">
                                                <h5>{{ $task->title }}</h5>
                                                <p> Assignee's response : <br> {{ $comment->comment }}</p>
                                                <hr>
                                                <div class="action">
                                                    <a href="{{ route('deletetask',$task->id) }}"
                                                        class="btn btn-danger js-sweetalert" title="Delete"
                                                        data-type="confirm"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                                @endif
                                @endforeach
                                @else
                                <p>No tasks in progress available.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card completed_task">
                            <div class="header">
                                <h2>Completed</h2>
                            </div>
                            <div class="body taskboard">
                                @if ($data)
                                @foreach ($data as $item)
                                @if ($item->tasks)
                                @foreach ($item->tasks as $task)
                                @foreach ($task->comments as $comment)
                                @if ($comment->task_status == 2)
                                <div class="dd" data-plugin="nestable">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle" style="background: #f00; color:#000">Assigne to : {{
                                                App\Models\User::find($task->user)->name }}</div>
                                            <div class="dd-content p-15">
                                                <h5>{{ $task->title }}</h5>
                                                <p> Assignee's response : <br> {{ $comment->comment }}</p>
                                                <hr>
                                                <div class="action">
                                                    <a href="{{ route('deletetask',$task->id) }}"
                                                        class="btn btn-danger js-sweetalert" title="Delete"
                                                        data-type="confirm"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                                @endif
                                @endforeach
                                @else
                                <p>No completed tasks available.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>



    @include('dashboard.footer')