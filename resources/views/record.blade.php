<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/record.css"/>
    <title>AttendanceApp</title>
  </head>
  <body>
    @extends('layouts.layouts')

    @section('header-list')
    <nav class = "header-nav">
      <ul>
        <li class = "header-list"><a class = "header-list-ul" href="/">ホーム</a></li>
        <li class = "header-list"><a class = "header-list-ul" href="/record">日付一覧</a></li>
        <li class = "header-list"><a class = "header-list-ul" href="/logout">ログアウト</a></li>
      </ul>
    </nav>
    @endsection

    @section('content')
    <div class = "wrapper">
      <div class = "date-paginate">

      </div>
      <div class = "record-table">
        <table>
          <tr class = "table-title">
            <th scope="col" class="name">名前</th>
            <th scope="col" class="punchin">勤務開始</th>
            <th scope="col" class="punchout">勤務終了</th>
            <th scope="col" class="rest">休憩時間</th>
            <th scope="col" class="attendance">勤務時間</th>
          </tr>

          <tr>
            <td>naoya</td>
            <td>9:00</td>
            <td>18:00</td>
            <td>1:00</td>
            <td>7:00</td>
          </tr>
        </table>
      </div>
    </div>
    @endsection