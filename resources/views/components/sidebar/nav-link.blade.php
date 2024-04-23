<li>
    <a
        {{ $attributes->merge(['class' => 'w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100' . ($active ?? false ? ' bg-gray-100 ' : '')]) }}>
        {{ $slot }}
    </a>
</li>
