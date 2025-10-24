<section class="relative bg-cover" style="background-image: url('{{ asset('images/backgrounds/1.jpg') }}');">
  <div class="absolute inset-0 bg-white/30"></div>
  <div class="relative bg-linear-to-b from-blue-500/70 via-sky-400/60 to-cyan-300/1 py-20">
    <h1 class="text-3xl font-extrabold uppercase text-center text-white">Upcoming Events</h1>
  </div>
  <div class="relative max-w-6xl mx-auto p-6 space-y-20">
    <div class="bg-black/20 rounded-2xl p-6 grid grid-cols-2 gap-6 shadow-lg backdrop-blur">
      <div class="flex-1 h-96 rounded-2xl">
        <div x-data="{            
    // Sets the time between each slides in milliseconds
    autoplayIntervalTime: 3000,
    slides: [                
        {
            imgSrc: '{{ asset('images/slides/1.jpg') }}',        
        },                
        {                    
           imgSrc: '{{ asset('images/slides/2.jpg') }}',   
        },                
        {                    
            imgSrc: '{{ asset('images/slides/3.jpg') }}',       
        }, 
        {                    
            imgSrc: '{{ asset('images/slides/4.jpg') }}',       
        },            
        {                    
            imgSrc: '{{ asset('images/slides/5.jpg') }}',       
        }, 
        {                    
            imgSrc: '{{ asset('images/slides/6.jpg') }}',       
        }, 
        {                    
            imgSrc: '{{ asset('images/slides/7.jpg') }}',       
        }, 
    ],            
    currentSlideIndex: 1,
    isPaused: false,
    autoplayInterval: null,
    previous() {                
        if (this.currentSlideIndex > 1) {                    
            this.currentSlideIndex = this.currentSlideIndex - 1                
        } else {   
            // If it's the first slide, go to the last slide           
            this.currentSlideIndex = this.slides.length                
        }            
    },            
    next() {                
        if (this.currentSlideIndex < this.slides.length) {                    
            this.currentSlideIndex = this.currentSlideIndex + 1                
        } else {                 
            // If it's the last slide, go to the first slide    
            this.currentSlideIndex = 1                
        }            
    },    
    autoplay() {
        this.autoplayInterval = setInterval(() => {
            if (! this.isPaused) {
                this.next()
            }
        }, this.autoplayIntervalTime)
    },
    // Updates interval time   
    setAutoplayInterval(newIntervalTime) {
        clearInterval(this.autoplayInterval)
        this.autoplayIntervalTime = newIntervalTime
        this.autoplay()
    },    
}" x-init="autoplay" class="relative size-full overflow-hidden">
          <div class="relative size-full">
            <template x-for="(slide, index) in slides">
              <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                x-transition.opacity.duration.1000ms>
                <img class="object-cover rounded-2xl size-full" x-bind:src="slide.imgSrc" />
              </div>
            </template>
          </div>
        </div>
      </div>
      <div class="flex-1 flex flex-col gap-3 h-96">
        @php
          $events = [
            ['month' => 'August', 'date' => '7–8', 'title' => 'DO DAY', 'description' => 'Join us in fostering a cleaner and greener campus! During DO Day, students, faculty, and staff come together to clean classrooms, organize facilities, and beautify the surroundings. It’s a great way to show pride in our school community while building teamwork and environmental awareness.'],
            ['month' => 'August', 'date' => '6', 'title' => 'Himamat', 'description' => 'Kickstart your exciting journey at OCC with ‘Himamat,’ our official student orientation! Meet your fellow freshmen, get to know your instructors, and learn everything you need to thrive at college. Expect fun activities, campus tours, and inspiring messages that will help you feel right at home.'],
            ['month' => 'August', 'date' => '5', 'title' => 'Org. Festival', 'description' => 'Discover your passion and find your second family at the Organization Festival! Explore a wide variety of student clubs and organizations—academic, cultural, artistic, and service-oriented. This is your chance to meet leaders, make new friends, and get involved in meaningful campus activities.']
          ]
        @endphp
        @foreach ($events as $event)
          <a href=""
            class="flex-1 flex items-center text-white bg-gray-800/80 rounded-2xl hover:bg-gray-700/60 transition duration-300 shadow-lg">
            <div class="w-32 flex flex-col gap-1 items-center justify-center">
              <h1 class="font-bold text-lg">
                {{ $event['month'] }}
              </h1>
              <p class="font-extrabold text-4xl">
                {{ $event['date'] }}
              </p>
            </div>
            <div class="flex-1 pr-4">
              <h1 class="font-semibold text-xl mb-1">
                {{ $event['title'] }}
              </h1>
              <p class="text-sm line-clamp-3">
                {{ $event['description'] }}
              </p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    <div class="flex justify-center">
      <button type="button"
        class="whitespace-nowrap bg-linear-to-r from-cyan-300 via-sky-400 to-blue-500 rounded-full px-6 py-4 font-semibold tracking-wide text-white transition hover:opacity-75 text-center active:opacity-100 disabled:opacity-75 disabled:cursor-not-allowed uppercase shadow-2xl duration-300 hover:scale-105 cursor-pointer">See
        More Events</button>
    </div>
  </div>
</section>