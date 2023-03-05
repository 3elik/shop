<h4>Popular brands</h4>
<ul>
    @foreach($items as $item)
        <li>
            <a href="{{ route('catalog.brand', ['slug' => $item->slug]) }}">
                {{ $item->name }}
            </a>
            <span class="badge text-bg-dark float-end">{{ $item->products_count }}</span>
        </li>
    @endforeach
</ul>
