@extends('layout.index')
@section('content')
<div class="container">
    <h2>Đăng nhập</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="list-style: none; padding: 0">
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('key'))
        <div class="alert alert-success" role="alert">
            {{ session('key') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form class="form-signin" action="{{ route('postLogin') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="inputUsername">Tên Đăng Nhập</label>
            <input type="text" name="username" class="form-control username" id="inputUsername" aria-describedby="emailHelp" placeholder="Nhập tên">
            <p class="error-msg"></p>
        </div>

        <div class="form-group">
            <label for="inputPassword">Mật khẩu</label>
            <input type="password" name="password" class="form-control password" id="inputPassword" placeholder="Mật khẩu">
            <p class="error-msg"></p>
        </div>

        <a href="{{ route('getsignup') }}">Đăng ký tài khoản</a>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
