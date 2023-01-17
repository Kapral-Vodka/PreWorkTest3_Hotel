<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/booking/{{ $booking->id }}">

                    <div class="form-group">
                        <input type="date" name="arrival_date" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium focus:outline-none focus:bg-white" value= "{{$booking->arrival_date }}">
                        @if ($errors->has('arrival_date'))
                            <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update booking</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
