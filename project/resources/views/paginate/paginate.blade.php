@if ($paginator->hasPages())
<ul class="my-4 flex justify-center">
    @if ($paginator->onFirstPage())
        <li> <a aria-label="Previous page"
        class="px-3 py-1 rounded-full hover:bg-denim hover:text-white text-light-charcoal disabled" ><span>← Previous</span></a></li>
    @else
        <li><a aria-label="Previous page"
            class="px-3 py-1 rounded-full hover:bg-denim hover:text-white text-light-charcoal" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li ><a class="disabled px-3 py-1 rounded-full hover:bg-denim hover:text-white text-light-charcoal"><span>{{ $element }}</span></a></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li>
                    <span aria-current="page"
                          class="px-3 py-1 rounded-full hover:bg-denim hover:text-white bg-denim text-white">{{ $page }}</span>
                </li>
                    
                @else
                <li>
                    <a class="px-3 py-1 rounded-full hover:bg-denim hover:text-white text-light-charcoal"
                       href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <li><a aria-label="Next page"
        class="px-3 py-1 rounded-full hover:bg-denim hover:text-white text-light-charcoal"
        href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        
    @else
        <li> <a aria-label="Next page" class="disabled px-3 py-1 rounded-full hover:bg-denim hover:text-white text-light-charcoal"><span>Next →</span></li>
    @endif
</ul>
@endif 



