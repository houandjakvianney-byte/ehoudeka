<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-lg bg-edeka-orange px-6 py-3 font-heading font-semibold text-white shadow-sm transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-edeka-orange focus:ring-offset-2']) }}>
    {{ $slot }}
</button>