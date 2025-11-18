<article
      class="w-full min-w-[230px] rounded-xl border border-white/20 bg-white/5 text-white p-4
             transition-all duration-300
             hover:scale-[1.03] hover:-translate-y-2
             hover:shadow-[0_12px_35px_rgba(0,0,0,.35)]">

      <div class="flex items-start justify-between">
        <div class="h-20 w-20 rounded-lg bg-white/10 grid place-items-center">
          <!-- Avatar sederhana -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-14 w-14">
            <circle cx="18" cy="12" r="7" fill="#F7C59F"/>
            <rect x="6" y="22" width="24" height="10" rx="3" fill="#D2691E"/>
          </svg>
        </div>
      </div>

      <div class="mt-3 space-y-1 text-sm">
        <p class="font-semibold">Jono Kagama</p>
        <p class="text-white/80">
          email : <span class="underline">jono@examplemail.com</span>
        </p>
        <p class="text-white/80">
          Tlp :
          <a href="tel:+6281233345678" class="underline">
            +62 812-3334-5678
          </a>
        </p>
      </div>

      <div class="mt-4 space-y-2">
        <!-- Learn more = pindah ke page lain -->
        <a href="{{ route('viewprodusen') }}"
           class="block w-full rounded-md border border-white/25 bg-white/10 px-3 py-2 text-center text-sm hover:bg-white/20 transition">
          Learn more
        </a>

        <a href="https://wa.me/6281233345678"
           class="block w-full rounded-md border border-white/25 bg-white/10 px-3 py-2 text-center text-sm hover:bg-white/20 transition">
          Kirim Pesan
        </a>
      </div>
    </article>