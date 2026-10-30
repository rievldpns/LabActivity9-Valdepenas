@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold text-slate-800">{{ $title }}</h1>

    <x-panel title="Complete Vaccination Schedule">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-100 text-slate-600 uppercase text-xs">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Patient Name</th>
                        <th class="p-3">Purok</th>
                        <th class="p-3">Vaccine</th>
                        <th class="p-3">Dose</th>
                        <th class="p-3">Scheduled Date</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    {{-- Rubric Requirement #6: @forelse with $loop --}}
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