@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))

@section('user-content')

<div class="familytree">
    <ul>
      <li>
        <a href="#">Parent</a>
        <ul>
          <li>
            <a href="#">Child</a>
            <ul>
              <li>
                <a href="#">Grand Child</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Child</a>
            <ul>
              <li><a href="#">Grand Child</a></li>
              <li>
                <a href="#">Grand Child</a>
                <ul>
                  <li>
                    <a href="#">Great Grand Child</a>
                  </li>
                  <li>
                    <a href="#">Great Grand Child</a>
                  </li>
                  <li>
                    <a href="#">Great Grand Child</a>
                  </li>
                </ul>
              </li>
              <li><a href="#">Grand Child</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/tree2.css') }}">
@endsection
