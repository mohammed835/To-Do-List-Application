@include('dashboard.head')
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f4f4f4;
        padding: 20px;
    }

    /* Blog container styles */
    .blog-container {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .blog-container h3 {
        color: #333;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .blog-container .description {
        display: block;
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .blog-container p {
        font-size: 16px;
        line-height: 1.8;
        color: #555;
        margin-bottom: 20px;
    }

    .blog-container mark {
        background-color: #ffff99;
        padding: 2px 5px;
    }

    .blog-container ol {
        list-style-type: decimal;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .blog-container ol li {
        font-size: 16px;
        line-height: 1.8;
        color: #555;
        margin-bottom: 10px;
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
            <div class="blog-container">
                <h3>Welcome, {{ auth()->user()->name }}</h3>
                <span class="description">Description of the system</span>
                <p>
                    This todo system adds a task to another user in the system through the <mark>add task</mark> button,
                    where you type the title of the task, its description, and the person to whom this task is assigned
                    through the dropdown that contains all users. Then you go to the <mark>other task</mark> page, which
                    contains all the tasks that you have assigned to all users. Then you go to the
                    <mark>taskBoard</mark>
                    page, which contains the status of the task and the comment of the person assigned to this task, if
                    any.
                    The <mark>show task</mark> page shows all the tasks assigned to you.
                </p>

                <h3>Instructions when using this system</h3>
                <ol>
                    <li>You must create at least two users, one of whom will assign the task to the other user.</li>
                    <li>On the taskBoard page, the information appears when the person assigned to this task responds
                        with
                        the status of the task sent to him, and can also write any comments if any.</li>
                    <li>On the taskBoard page, the status of the task changes based on the completion of this task by
                        the
                        user to whom this task is assigned.</li>
                    <li>In the otherTask page there are also soft deletes.</li>
                    <li>The showtask page shows all the tasks assigned to you.</li>
                    <li>In the othertask page, you can see all the tasks you have assigned to other users.</li>
                </ol>
            </div>


        </div>

    </div>



    @include('dashboard.footer')