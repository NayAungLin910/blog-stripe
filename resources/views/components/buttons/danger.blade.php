<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-400 border
    border-transparent rounded font-semibold text-sx text-white uppercase tracking-widest
    hover:bg-red-200 active:bg-red-300 focus:outline-none focus:border-gray-900 focus:ring
    focus:ring-gray-300 disabled:opacity-25 transistion']) }}>
    {{ $slot }}
</button>