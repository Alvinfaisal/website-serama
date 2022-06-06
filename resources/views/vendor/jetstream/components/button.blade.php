<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-serama border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-serama-hover active:bg-serama-hover focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
