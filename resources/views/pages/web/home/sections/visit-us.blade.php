<section class="max-w-6xl mx-auto">
  <div class="mx-4 md:mx-6 space-y-8">
    <div class="space-y-2">
      <div class="flex items-center gap-4">
        <div class="h-0.5 w-10 bg-blue-700"></div>
        <h1 class="font-semibold text-lg text-blue-700 uppercase">Visit Us</h1>
      </div>
      <h1 class="text-2xl font-semibold">Discover our vibrant campus community</h1>
    </div>
    <div x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false"
      class="grid md:grid-cols-2 items-center gap-6 transform transition duration-800 ease-out"
      :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
      <div class="space-y-8">
        <p class="text-gray-600">
          We’d love to welcome you to Opol Community College!
          Our campus is open for visits, inquiries, and
          community engagement. Come and explore our vibrant
          learning environment, meet our dedicated faculty,
          and discover how OCC can help you achieve your
          goals.
        </p>
        <div class="space-y-4">
          <div class="flex items-center gap-4">
            <div class="border border-gray-300 p-2">
              <i data-lucide="map-pin" class="text-blue-700" stroke-width="1.5"></i>
            </div>
            <div class="flex flex-col">
              <span class="text-gray-600 font-medium text-sm">Address</span>
              <a href="https://maps.app.goo.gl/88x9eRcWgGJrrc4i6" target="_blank"
                class="font-medium hover:underline wrap-break-word">Poblacion, Opol, Misamis Oriental</a>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="border border-gray-300 p-2">
              <i data-lucide="mail" class="text-blue-700" stroke-width="1.5"></i>
            </div>
            <div class="flex flex-col">
              <span class="text-gray-600 font-medium text-sm">Email</span>
              <a href="mailto:opolcommunitycollege@occ.edu.ph" target="_blank"
                class="font-medium hover:underline wrap-break-word">opolcommunitycollege@occ.edu.ph</a>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="border border-gray-300 p-2">
              <i data-lucide="phone" class="text-blue-700" stroke-width="1.5"></i>
            </div>
            <div class="flex flex-col">
              <span class="text-gray-600 font-medium text-sm">Phone Number</span>
              <a href="tel:+639152775842" target="_blank" class="font-medium hover:underline wrap-break-word">+63 915
                277
                5842</a>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="border border-gray-300 p-2">
              <i data-lucide="clock" class="text-blue-700" stroke-width="1.5"></i>
            </div>
            <div class="flex flex-col">
              <span class="text-gray-600 font-medium text-sm">Office Hours</span>
              <span class="font-medium wrap-break-word">Monday –
                Friday, 8:00 AM – 5:00 PM</span>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full h-[300px] md:h-[400px]">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.5667566226452!2d124.5699053735227!3d8.521727496726207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32fff45858a8e7f1%3A0x11bd2a01ee20bcd3!2sOpol%20Community%20College!5e1!3m2!1sen!2sph!4v1762077637937!5m2!1sen!2sph"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>