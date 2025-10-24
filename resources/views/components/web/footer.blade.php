<footer class="text-white">
  <div class="py-12 bg-blue-600">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">
          Get Started Today
        </h2>
        <p class="text-lg text-blue-100">
          Ready to join our community of learners? Contact us for more information.
        </p>
      </div>
      <div class="grid md:grid-cols-3 gap-8 mb-8 text-center">
        <div>
          <Phone class="h-6 w-6 mx-auto mb-3" />
          <h3 class="font-semibold mb-2">Telephone</h3>
          <p class="text-blue-100">
            <a href="tel:+63885551234" class="hover:underline">
              (088) 882-3269
            </a>
          </p>
        </div>
        <div>
          <Smartphone class="h-6 w-6 mx-auto mb-3" />
          <h3 class="font-semibold mb-2">Mobile</h3>
          <p class="text-blue-100">
            <a href="tel:+639532609906" class="hover:underline">
              +63 953 260 9906
            </a>
          </p>
        </div>
        <div>
          <Mail class="h-6 w-6 mx-auto mb-3" />
          <h3 class="font-semibold mb-2">Email</h3>
          <p class="text-blue-100">
            <a href="mailto:opolcommunitycollege@yahoo.com" class="hover:underline">
              opolcommunitycollege@yahoo.com
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-slate-900 text-center py-8">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex items-center justify-center mb-4">
        <i data-lucide="graduation-cap" class="mr-2"></i>
        <span class="text-lg font-semibold">{{ config('app.name') }}</span>
      </div>
      <p class="text-gray-400 mb-4">
        Building tomorrow's leaders, one student at a time.
      </p>
      <p class="text-sm text-gray-500">
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
      </p>
    </div>
  </div>
</footer>