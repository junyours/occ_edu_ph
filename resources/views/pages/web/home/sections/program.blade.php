@php
  $programs = [
    ['title' => 'Bachelor of Elementary Education', 'department' => 'Teacher Education Department', 'description' => 'This program develops competent, compassionate, and reflective elementary teachers who can nurture young learners. Students gain a strong foundation in pedagogy, child psychology, curriculum design, and assessment strategies, preparing them to create engaging and inclusive learning environments for the next generation.', 'image' => 'images/departments/TED.png'],
    ['title' => 'Bachelor of Secondary Education Major in English', 'department' => 'Teacher Education Department', 'description' => 'A specialized program aimed at shaping future educators in the field of English language and literature. It combines linguistic mastery, literary appreciation, and effective teaching methodologies to enable graduates to inspire critical thinking and communication excellence among high school students.', 'image' => 'images/departments/TED.png'],
    ['title' => 'Bachelor of Science in Business Administration Major in Financial Management', 'department' => 'College of Business Administration', 'description' => 'This program provides a strong grounding in financial principles, investment strategies, and risk management. Students learn how to analyze financial statements, manage portfolios, and make sound business decisions — preparing them for careers in banking, corporate finance, and entrepreneurship.', 'image' => 'images/departments/CBA.png'],
    ['title' => 'Bachelor of Science in Business Administration Major in Marketing Management', 'department' => 'College of Business Administration', 'description' => 'A dynamic program that blends creativity and strategy to prepare students for the fast-evolving world of marketing. It covers digital marketing, consumer behavior, branding, and market research — empowering graduates to craft compelling campaigns and drive business growth in competitive industries.', 'image' => 'images/departments/CBA.png'],
    ['title' => 'Bachelor of Science in Information Technology', 'department' => 'College of Information Technology', 'description' => 'A comprehensive program designed to equip students with advanced technical skills in software development, systems analysis, cybersecurity, and emerging technologies such as artificial intelligence and cloud computing. This course prepares future IT professionals to become innovative problem-solvers and leaders in the digital industry.', 'image' => 'images/departments/CIT.png']
  ]
@endphp

<section class="relative bg-cover" style="background-image: url('{{ asset('images/backgrounds/3.jpg') }}');">
  <div class="absolute inset-0 bg-white/30"></div>
  <div class="relative bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1 py-20">
    <h1 class="text-3xl font-extrabold uppercase text-center text-white">Academic Programs</h1>
  </div>
  <div class="relative max-w-6xl mx-auto p-6">
    <div class="grid grid-cols-3 gap-6">
      @foreach ($programs as $program)
        <div
          class="relative overflow-hidden rounded-2xl shadow-2xl bg-white/20 hover:bg-white/30 transition-all duration-300">
          <div class="absolute inset-0 flex items-center justify-center">
            <img src="{{ asset($program['image']) }}" alt="{{ $program['title'] }}" class="size-56 object-cover" />
            <div class="absolute inset-0 bg-black/30"></div>
          </div>
          <div class="size-full relative z-10 p-6 backdrop-blur space-y-6">
            <div class="space-y-2">
              <h1
                class="text-xl font-bold text-transparent bg-clip-text bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500 ">
                {{ $program['title'] }}
              </h1>
              <h3 class="text-sm font-semibold text-sky-200">
                {{ $program['department'] }}
              </h3>
            </div>
            <p class="text-white">
              {{ $program['description'] }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>