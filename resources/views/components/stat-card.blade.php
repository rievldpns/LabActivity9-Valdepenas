@props(['title', 'value'])

<div class="bg-white p-5 rounded-lg shadow-sm border border-slate-200">
    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ $title }}</p>
    <p class="text-2xl font-bold text-slate-900 mt-1">{{ $value }}</p>
</div>