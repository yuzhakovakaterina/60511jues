@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    Элементов на странице:
    <form method="get" action="{{ url('books') }}">
        <select name="perpage">
            <option value="2" @if($paginator->perPage() == 2) selected @endif>2</option>
            <option value="3" @if($paginator->perPage() == 3) selected @endif>3</option>
            <option value="4" @if($paginator->perPage() == 4) selected @endif>4</option>
            <option value="5" @if($paginator->perPage() == 5) selected @endif>5</option>
            <option value="6" @if($paginator->perPage() == 6) selected @endif>6</option>
            <option value="7" @if($paginator->perPage() == 7) selected @endif>7</option>
            <option value="8" @if($paginator->perPage() == 8) selected @endif>8</option>
            <option value="9" @if($paginator->perPage() == 9) selected @endif>9</option>
            <option value="10" @if($paginator->perPage() == 10) selected @endif>10</option>
            <option value="11" @if($paginator->perPage() == 11) selected @endif>11</option>
            <option value="12" @if($paginator->perPage() == 12) selected @endif>12</option>
            <option value="13" @if($paginator->perPage() == 13) selected @endif>13</option>
            <option value="14" @if($paginator->perPage() == 14) selected @endif>14</option>
            <option value="15" @if($paginator->perPage() == 15) selected @endif>15</option>
        </select>
        <input type="submit" value="Изменить">
    </form>
@endif
