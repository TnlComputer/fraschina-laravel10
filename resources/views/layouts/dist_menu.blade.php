        <div class="hidden space-x-4 lg:-my-px lg:ml-4 lg:flex">

          <div class="block w-auto fill-current text-gray-800">
            {{ __('Distribución') }}
          </div>
          <x-nav-link :href="route('distribucion_agenda.index')" :active="request()->routeIs('distribucion_agenda.index')">
            {{ __('Agenda') }}
          </x-nav-link>
          <x-nav-link :href="route('distribucion_reparto.index')" :active="request()->routeIs('distribucion_reparto.index')">
            {{ __('Reparto') }}
          </x-nav-link>
          <x-nav-link :href="route('distribucion_ultAltas.index')" :active="request()->routeIs('distribucion_ultAltas.index')">
            {{ __('Últimas Altas') }}
          </x-nav-link>
          <x-nav-link :href="route('distribucion_stock.index')" :active="request()->routeIs('distribucion_stock.index')">
            {{ __('Stock') }}
          </x-nav-link>
        </div>
