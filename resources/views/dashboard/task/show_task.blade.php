@include('dashboard.head')
<head>
    <style>
      .tasks {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.tasks h1 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #333333;
}

.tasks p {
    font-size: 18px;
    color: #555555;
    line-height: 1.5;
}

.tasks span {
    font-size: 14px;
    color: #777777;
}

.tasks {
    position: relative;
}

.tasks:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background-color: #4285f4; /* Facebook-like blue color */
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.tasks h1,
.tasks p,
.tasks span {
    padding-left: 10px;
}

.comments {
    margin-top: 20px;
}

.comment {
    margin-bottom: 10px;
}

.comment-author {
    font-weight: bold;
    margin-right: 5px;
}

.comment-text {
    color: #333;
}

.add-comment-form {
    margin-top: 20px;
}

.add-comment-form input[type="text"] {
    width: calc(100% - 80px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.add-comment-form button {
    width: 60px;
    padding: 8px;
    border: none;
    background-color: #4285f4;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

.add-comment-form button:hover {
    background-color: #357ae8;
}
    </style>
</head>
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
        <div class="body" dir="rtl">
            @if (session('comment'))
            <div class="alert alert-success">
                {{ session('comment') }}
            </div>
                
            @endif


            @foreach ($tasks as $task) 
            @if (auth()->user()->id == $task->user)
            <div class="tasks" style="direction: rtl;
            text-align: justify;">
                <h1>{{$task->title}}</h1>
                <p>{{$task->description}}</p>
                <span>{{$task->created_at}}</span>
                      <!-- Comments Section -->
            {{-- <div class="comments">
                    <div class="comment">
                        <span class="comment-author">John Doe</span>
                        <span class="comment-text">This is a great task!</span>
                    </div>
                    <div class="comment">
                        <span class="comment-author">Jane Smith</span>
                        <span class="comment-text">I agree, well done!</span>
                    </div>
                <!-- Add more comments here -->
            </div> --}}
         <!-- Add comment form -->
         <form class="add-comment-form" method="post" action="{{ route('add_comment') }}">
            @csrf
            <input type="text" name="task_id" value="{{ $task->id }}" style="display: none">
            
            <input type="text" name="comment" placeholder="Write a comment..." />
            <select name="task_status" >
                <option value="0">pending</option>
                <option value="1">improgress</option>
                <option value="2">done</option>

            </select><br><br>
            <button type="submit">Accept</button>
        </form>

        </div>
            @else
            @endif               
            
            

            @endforeach

        </div>
    </div>

</div>
    
    

@include('dashboard.footer')