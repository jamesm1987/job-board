<footer id="newsletter"
        class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">

    
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto -mb-6" style="width: 145px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
      </svg>
      
    <h5 class="text-3xl">Subscribe to job alerts</h5>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

            <form method="POST" action="#" class="lg:flex text-sm">
                @csrf
                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        
                    </label>

                    <div>
                        <input id="email"
                               name="email"
                               type="text"
                               placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                        @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</footer>