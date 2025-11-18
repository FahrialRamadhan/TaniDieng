<div
  onclick="window.location.href='{{ route('viewproduk') }}'"
  class="group cursor-pointer block rounded-xl border border-white/25 bg-white/5 overflow-hidden 
         shadow-[0_8px_25px_rgba(0,0,0,.25)] 
         transition-all duration-300 
         hover:shadow-[0_15px_35px_rgba(0,0,0,.45)]
         hover:-translate-y-2 hover:scale-[1.03]">

  <article class="flex flex-col">
    <div class="p-3">
      <img src="img/kopi.png" 
           alt="Kopi"
           class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
    </div>

    <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
      <div class="flex items-baseline justify-between">
        <h3 class="font-semibold">
          Kopi <span class="text-white/70 text-sm">(1kg)</span>
        </h3>
        <div class="text-sm font-semibold">Rp 50.000</div>
      </div>

      <p class="text-xs text-white/75 -mt-1">
        Produsen : <span class="underline group-hover:text-white">Jono Kagama</span>
      </p>

      <div class="mt-3 space-y-2 mt-auto">
        <!-- BELI SEKARANG -->
        <button
          onclick="event.stopPropagation();  window.location.href='{{ route('login') }}';"
          class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2 transition">
          Beli Sekarang
        </button>

        <!-- KERANJANG -->
        <button
          onclick="event.stopPropagation(); window.location.href='{{ route('login') }}';"
          class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2 transition">
          Keranjang
        </button>
      </div>
    </div>
  </article>
</div>