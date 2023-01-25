<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/attendance.css"/>
    <title>AttendanceApp</title>
  </head>
  <body>
    @extends('layouts.layouts')

    @section('header-list')
    <nav class = "header-nav">
      <ul>
        <li class = "header-list"><a class = "header-list-ul" href="/">ホーム</a></li>
        <li class = "header-list"><a class = "header-list-ul" href="/record">日付一覧</a></li>
        <li class = "header-list">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class = "header-list-ul" href="/logout" onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('ログアウト') }}</a>
          </form>
        </li>
      </ul>
    </nav>
    @endsection

    @section('content')
    <div class = "container">
      <p class = "greeting">{{ $user->name }}さんお疲れ様です！</p>
      <p>{{session('message')}}</p>
      <div class = "btn-attendance">
        <form action="{{ route('punch/in') }}" method="POST">
          @csrf
          @method('POST')
          <button type = submit class = "btn btn-punchin"><p class = "txt punchin">勤務開始</p></button>
        </form>

        <form action="{{ route('punch/out') }}" method="POST">
          @csrf
          @method('POST')
          <button type = submit class = "btn btn-punchout"><p class = "txt punchout">勤務終了</p></button>
        </form>
        
        <form action="{{ route('rest/in') }}" method="POST">
          @csrf
          @method('POST')
          <button type = submit class = "btn btn-restin"><p class = "txt restin">休憩開始</p></button>
        </form>

        <form action="{{ route('rest/out') }}" method="POST">
          @csrf
          @method('POST')
          <button type = submit class = "btn btn-restout"><p class = "txt restout">休憩終了</p></button>
        </form>
      </div>
    </div> 
    @endsection
  </body>
</html>
