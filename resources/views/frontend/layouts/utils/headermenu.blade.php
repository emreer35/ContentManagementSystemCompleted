<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
    @foreach ($headerMenuItems as $item)
        @if (is_null($item['parent_id']))
            <li  class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="{{config('app.url')}}/{{$item['slug']}}">
                    {{ $item['label'] }}
                </a>

                @php
                    $subItems = collect($headerMenuItems)->filter(function($subItem) use ($item){
                        return $subItem['parent_id'] === $item['id'];
                    });
                @endphp

                @if ($subItems->isNotEmpty())
                    <ul class="dropdown-menu">
                        @foreach ($subItems as $subItem)
                        <li>
                            <a href="{{config('app.url')}}/{{$subItem['slug']}}">
                                {{ $subItem['label']}}
                            </a>
                        </li>
                            
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    @endforeach
</ul>


