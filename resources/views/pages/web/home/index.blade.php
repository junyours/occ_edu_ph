@extends('layouts.web')

@section('content')
  <div class="space-y-20">
    @include('pages.web.home.sections.hero')
    @include('pages.web.home.sections.feature')
    @include('pages.web.home.sections.vision-mission')
    @include('pages.web.home.sections.news')
    @include('pages.web.home.sections.visit-us')
  </div>
@endsection