@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold text-slate-800">{{ $title }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    @if($alerts->count() > 0)
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded text-red-700">
            <p class="font-bold">Overdue Vaccination Alerts ({{ $alerts->count() }})</p>
            <ul class="list-disc list-inside text-sm mt-1">
                @foreach($alerts as $alert)
                    <li>{{ $alert->patient_name }} - {{ $alert->vaccine }} (Due: {{ $alert->scheduled_at->format('M d, Y') }})</li>
                @endforeach
            </ul>
        </div>
    @elseif(isset($stockNotice))
        <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded text-amber-700">
            <p class="font-bold">Notice: Vaccine inventory is low.</p>
        </div>
    @else
        <div class="bg-sky-50 border-l-4 border-sky-500 p-4 rounded text-sky-900">
            <p class="font-bold">All clear!</p>
        </div>
    @endif

    <x-panel title="Vaccination Overview">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-100 text-slate-600 uppercase text-xs">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Patient</th>
                        <th class="p-3">Purok</th>
                        <th class="p-3">Vaccine</th>
                        <th class="p-3">Dose</th>
                        <th class="p-3">Scheduled Date</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($schedules as $item)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-slate-50' }}">
                            <td class="p-3 text-slate-400 font-mono text-xs">{{ $loop->iteration }}</td>
                            <td class="p-3 font-medium text-slate-900">{{ $item->patient_name }}</td>
                            <td class="p-3">{{ $item->purok }}</td>
                            <td class="p-3">{{ $item->vaccine }}</td>
                            <td class="p-3">{{ $item->dose }}</td>
                            <td class="p-3">{{ $item->scheduled_at->format('M d, Y') }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded text-xs font-semibold 
                                    @if($item->status === 'Done') bg-sky-100 text-sky-800
                                    @elseif($item->status === 'Overdue') bg-red-100 text-red-800
                                    @else bg-amber-100 text-amber-800 @endif">
                                    {{ $item->status }}
                                </span>

                                @unless($item->status === 'Done')
                                    <span class="ml-1 text-[10px] text-amber-600 font-semibold">(Pending)</span>
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-slate-500">No schedules yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
</div>
@endsection