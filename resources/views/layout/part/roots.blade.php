<div class="roots">
    <h4>Catalog sections</h4>
    <ul>
        @foreach($items as $item)
            <li>
                <a href="{{ route('catalog.category', ['slug' => $item->slug]) }}">
                    {{ $item->name }}
                </a>
                @if(count($item->children) > 0)
                    <a href="#children-{{ $item->id }}" data-bs-toggle="collapse" class="collapsed">
                        <i class="fa fa-plus-square float-end"></i>
                        <i class="fa fa-minus-square float-end"></i>
                    </a>
                    <div class="collapse" id="children-{{ $item->id }}">
                        <ul>
                            @foreach($item->children as $child)
                                <li>
                                    <a href="{{ route('catalog.category', ['slug' => $child->slug]) }}">
                                        {{ $child->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>

</div>
