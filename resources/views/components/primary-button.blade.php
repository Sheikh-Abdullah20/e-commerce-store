<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary text-dark mt-3']) }}>
    {{ $slot }}
</button>
