@include('dashboard.head')
<style>
    .button-container {
        display: flex;
        justify-content: center;
        margin: 30px 0;
    }

    .restore-button {
        background-color: #28a745;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .restore-button:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .restore-button:active {
        background-color: #1e7e34;
        transform: translateY(0);
    }

    .restore-button:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.5);
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
            <div class="body">
                @if (session('add_task'))
                <div class="alert alert-success">
                    {{session('add_task')}}

                </div>
                @endif
                @if (session('force_delete'))
                <div class="alert alert-success">
                    {{session('force_delete')}}

                </div>
                @endif
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
                <h2 style="text-align: center;"> All tasks sent to members </h2>
                <div class="button-container">
                    <form action="{{ route('restore_delete') }}" method="post">
                        @csrf
                        <button type="submit" class="restore-button">Restore Deleted Tasks</button>
                    </form>
                </div>



                <div class="form-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                </div>
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

                            {{-- <a href="{{ route('deletetask',$task->id) }}" class="btn btn-danger js-sweetalert"
                                title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></a> --}}
                            <td>
                                <a href="{{ route('taskBoard') }}"><i class="fa-regular fa-eye"></i></a>
                                <form action="{{ route('update_task') }}" method="post" style="display: inline-flex;">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-info" title="Edit"><i
                                            class="fa fa-edit"></i></button>
                                </form>
                                <a href="{{ route('deletetask',$task->id) }}" class="btn btn-danger js-sweetalert"
                                    title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    </thead>


                </table>
            </div>
        </div>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('.c_list tbody tr');

            searchInput.addEventListener('input', function () {
                const searchText = this.value.toLowerCase();

                rows.forEach(row => {
                    let rowVisible = false;
                    row.querySelectorAll('td').forEach(cell => {
                        const cellText = cell.textContent.toLowerCase();
                        if (cellText.includes(searchText)) {
                            rowVisible = true;
                        }
                    });
                    if (rowVisible) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
    @include('dashboard.footer')