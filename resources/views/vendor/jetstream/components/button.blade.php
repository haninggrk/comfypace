<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 
bg-pink-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-600 
active:bg-pink-600 focus:outline-none focus:border-green-700 focus:ring 
focus:ring-pink-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
