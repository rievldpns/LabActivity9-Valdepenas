@props(['title' => ''])

<div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
    @if($title)
        <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">
            <h2 class="text-base font-semibold text-slate-800">{{ $title }}</h2>
        </div>
    @endif
    <div class="p-5">
        {{ $slot }}
    </div>
</div>