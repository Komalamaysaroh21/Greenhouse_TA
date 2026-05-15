    <aside class="w-64 bg-gradient-to-br from-emerald-900 via-teal-800 to-cyan-800 text-white flex-shrink-0 overflow-y-auto shadow-2xl">
       <div class="p-5 border-b border-white/20">
    <div class="flex items-center gap-3">
        
        <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-green-500 to-emerald-400 flex items-center justify-center">
            <i class="fas fa-leaf text-white text-sm"></i>
        </div>

        <span class="text-xl font-bold tracking-tight text-white">
            𝐒𝐦𝐚𝐫𝐭 𝐆𝐫𝐞𝐞𝐧𝐡𝐨𝐮𝐬𝐞
        </span>

    </div>
</div>
        <nav class="p-4 space-y-6">
            <div>
                <p class="text-xs uppercase text-white/40 mb-2 px-2">Main</p>
                <a href="{{ url('/dashboard') }}" 
                    class="relative flex items-center gap-3 px-4 py-2.5 rounded-lg 
                    {{ request()->is('dashboard') ? 'bg-white/10' : 'hover:bg-white/10' }}">
    
                    <span class="absolute left-0 top-0 h-full w-1 bg-white rounded-r 
                    {{ request()->is('dashboard') ? '' : 'hidden' }}"></span>
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div>
                <p class="text-xs uppercase text-white/40 mb-2 px-2">Management</p>

                <a href="{{ route('cahaya') }}"
                    class="relative flex items-center gap-3 px-4 py-2.5 rounded-lg 
                    {{ request()->is('cahaya') ? 'bg-white/10' : 'hover:bg-white/10' }}">

                    <span class="absolute left-0 top-0 h-full w-1 bg-white rounded-r 
                    {{ request()->is('cahaya') ? '' : 'hidden' }}"></span>

                    <i class="fas fa-sun w-5"></i>
                    <span>Intensitas Cahaya</span>
                </a>

                <a href="{{ route('tanah') }}"
                    class="relative flex items-center gap-3 px-4 py-2.5 rounded-lg 
                    {{ request()->is('tanah') ? 'bg-white/10' : 'hover:bg-white/10' }}">

                    <span class="absolute left-0 top-0 h-full w-1 bg-white rounded-r 
                    {{ request()->is('tanah') ? '' : 'hidden' }}"></span>

                    <i class="fas fa-seedling w-5"></i>
                    <span>Kelembaban Tanah</span>
                </a>

                <a href="{{ route('air') }}"
                    class="relative flex items-center gap-3 px-4 py-2.5 rounded-lg 
                    {{ request()->is('air') ? 'bg-white/10' : 'hover:bg-white/10' }}">

                    <span class="absolute left-0 top-0 h-full w-1 bg-white rounded-r 
                    {{ request()->is('air') ? '' : 'hidden' }}"></span>

                    <i class="fas fa-tint w-5"></i>
                    <span>pH Air</span>
                </a>

                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-red-300 
                                hover:bg-red-500/20 hover:text-red-200 transition">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>

            </div>
        </nav>

        <div class="absolute bottom-0 w-64 p-4 border-t border-white/20 bg-gradient-to-t from-black/30 to-transparent backdrop-blur-sm">
    
    <a href="{{ route('profile') }}" 
       class="flex items-center gap-3 hover:bg-white/10 p-2 rounded-lg transition cursor-pointer">

        <div class="w-9 h-9 rounded-full bg-gradient-to-r from-emerald-400 to-cyan-400 flex items-center justify-center shadow-lg">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div>
            <p class="text-sm font-semibold">
                {{ auth()->user()->name }}
            </p>
            <p class="text-xs text-emerald-200">
                {{ auth()->user()->email }}
            </p>
        </div>

    </a>

</div>

    </aside>