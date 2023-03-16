@extends('lawyer.home.layouts.app')
@section('content')
    @include('admin.layouts.flash-message')
    <div class="container p-5">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header" style="background:#208C84;color:white;">{{$forum->title}}</h5>
                <div class="card-body">
                    <p>{{$forum->message}}</p>
                    <form action="{{route('lawyer.qa.answer', $forum->id)}}" method="post">
                        @csrf()
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="answer" placeholder="Your answer..." value="{{$forum->myAnswer($forum->id)}}" aria-describedby="floatingInputHelp" />
                            <label for="floatingInput">Answer</label>
                        </div>
                        <button class="btn btn-primary mt-2" style="float: right;background:#208C84;color:white;border:none;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" style="background:#208C84;color:white;">All Lawyer Answers</div>
            <div class="card-body">
                @forelse($answers as $k => $answer)
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="floatingInput" name="answer" value="{{$answer->answer}}" disabled aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Answer</label>
                        <div id="floatingInputHelp" class="form-text" style="text-align: end;"><b>{{$answer->lawyer->name}}</b></div>
                    </div>
                @empty
                    <h5>No Answers Yet</h5>
                @endforelse
            </div>
        </div>
    </div>
@endsection