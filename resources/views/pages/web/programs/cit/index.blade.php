@php
  $items = [
    ['name' => 'Gaudencio Iyo Jr., MIT', 'position' => 'College Dean/System Administrator', 'image' => asset('images/departments/cit/6.png')],
    ['name' => 'Ruben Madriaga, LPT, MIT', 'position' => 'Faculty/Research Coordinator', 'image' => asset('images/departments/cit/9.png')],
    ['name' => 'Jeffrey Ubarco, MIT', 'position' => 'Faculty', 'image' => asset('images/departments/cit/12.png')],
    ['name' => 'Maria Jessa Linogao, MIT', 'position' => 'Faculty', 'image' => asset('images/departments/cit/7.png')],
    ['name' => 'Novelyn Joy Daculan', 'position' => 'Faculty', 'image' => asset('images/departments/cit/3.png')],
    ['name' => 'Reah Lou Daculan', 'position' => 'Faculty', 'image' => asset('images/departments/cit/4.png')],
    ['name' => 'Niel Daculan', 'position' => 'Faculty', 'image' => asset('images/departments/cit/2.png')],
    ['name' => 'Johnfed Cariaga', 'position' => 'Faculty/ICT Officer', 'image' => asset('images/departments/cit/1.png')],
    ['name' => 'Jomar Otoc', 'position' => 'Faculty', 'image' => asset('images/departments/cit/11.png')],
    ['name' => 'Cyron Micarte', 'position' => 'Faculty', 'image' => asset('images/departments/cit/10.png')],
    ['name' => 'John Rey Macua', 'position' => 'Faculty', 'image' => asset('images/departments/cit/8.png')],
    ['name' => 'Ryan Jay Villastique', 'position' => 'Faculty', 'image' => asset('images/departments/cit/13.png')],
    ['name' => 'Barry Gebe', 'position' => 'Faculty/Computer Programmer', 'image' => asset('images/departments/cit/5.png')],
  ]
@endphp

@extends('layouts.web')

@section('content')
  <div class="relative bg-linear-to-b from-red-500/70 via-rose-400/60 to-pink-300/1 py-10 md:py-20">
    <div class="max-w-6xl mx-auto px-4 md:px-6 flex items-center gap-10 md:gap-20 max-md:flex-col">
      <img src="{{ asset('images/departments/CIT.png') }}" alt="cit" class="size-52 md:size-62">
      <div class="space-y-4">
        <h1 class="text-3xl font-extrabold text-white max-md:text-center">College of Information Technology</h1>
        <p class="font-medium max-md:text-justify">The College of Information Technology prepares students to become
          skilled and innovative
          professionals ready to excel in today’s digital world. With hands-on learning in programming, networking, web
          development, cybersecurity, and emerging technologies, students develop critical thinking and problem-solving
          skills. Guided by expert faculty and equipped with modern facilities, the college fosters innovation, ethical
          responsibility, and leadership—producing graduates who are globally competitive and committed to advancing
          technology and society.</p>
      </div>
    </div>
  </div>
  <div class="max-w-6xl mx-auto p-4 md:p-6">
    <div class="space-y-6">
      <div class="flex items-center gap-4">
        <h1 class="font-bold text-2xl text-nowrap">College Leadership</h1>
        <div class="h-px w-full bg-blue-700"></div>
      </div>
      <div class="space-y-4">
        @foreach ($items as $item)
          <div class="flex items-center gap-4">
            <div class="relative size-28 rounded-full border border-slate-100">
              <img src="{{ asset('images/backgrounds/1.jpg') }}" class="size-full object-cover rounded-full">
              <div class="absolute inset-0 bg-blue-700/25 rounded-full"></div>
              <img src="{{ $item['image'] }}" class="absolute inset-0 rounded-full">
            </div>
            <div>
              <h1 class="font-bold">{{ $item['name'] }}</h1>
              <p class="text-gray-600 text-sm font-medium">{{ $item['position'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection