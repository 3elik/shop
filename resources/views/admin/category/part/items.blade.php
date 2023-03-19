@if (count($items))
    @php
        $level++;
    @endphp
    @foreach($items as $item)
        <tr>
            <td>
                @if($level)
                    {{ str_repeat('-', $level) }}
                @endif
                <a href="{{ route('admin.category.show', ['category' => $item->id]) }}"
                    style="font-weight: @if($level) normal @else bold @endif;"
                >
                    {{ $item->name }}
                </a>
            </td>
            <td>
                {{ iconv_substr($item->content, 0, 150) }}
            </td>
            <td>
                <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.category.destroy', ['category' => $item->id]) }}"
                    method="post"
                >
                    @csrf
                    @method('DELETE')
                    <button class="m-o p-o border-0 bg-transparent">
                        <i class="fa fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @if($item->children->count())
            @include('admin.category.part.items', ['items' => $item->children, 'level' => $level])
        @endif
    @endforeach
@endif
