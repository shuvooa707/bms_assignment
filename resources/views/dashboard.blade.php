@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @csrf
                    <div class="alert alert-success hide" id="alert">Task Completed</div>
                    <table class="table">
                        <thead>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Handle</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                @if ($user->user_role == 0)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <button class="btn btn-success" onclick="accept('{{ $user->id }}', this.parentElement.parentElement)">accept</button>
                                        <button class="btn btn-danger" onclick="ignore('{{ $user->id }}', this.parentElement.parentElement)">deny</button>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function accept( uid, row ) {
        let alert = document.querySelector("#alert");
        let _token = document.querySelector("input[name='_token']").value;
        alert.classList.add("hide");
        let payload = new FormData();
        payload.append("_token", _token);
        payload.append("uid", uid);
        fetch("/acceptuser",{
            method : "POST",
            body : payload,
        })
        .then( r => r.json() )
        .then( r => {
            if ( r.msg == "success" ) {
                alert.classList.remove("hide");
                row.remove();
            } else {
                alert("failed");
            }
        });
    }
    function ignore( uid, row ) {
        let alert = document.querySelector("#alert");
        let _token = document.querySelector("input[name='_token']").value;

        alert.classList.add("hide");
        let payload = new FormData();
        payload.append("_token", _token);
        payload.append("uid", uid);
        fetch("/ignoreuser",{
            method : "POST",
            body : payload,
        })
        .then( r => r.json() )
        .then( r => {
            if ( r.msg == "success" ) {
                alert.classList.remove("hide");
                row.remove();
            } else {
                alert("failed");
            }
        });
    }
</script>
@endsection
