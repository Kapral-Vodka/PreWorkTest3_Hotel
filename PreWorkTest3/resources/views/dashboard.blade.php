<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Bookings List</div>

                    <div class="flex-auto text-right mt-2">
                        <a href="/booking" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add new Booking</a>
                    </div>
                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Arrival Date</th>
                        <th class="text-left p-3 px-5">Created At</th>
                        <th class="text-left p-3 px-5">Booking status</th>
                        <th class="text-left p-3 px-5">Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->bookings as $booking)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$booking->arrival_date}}
                            </td>
                            <td class="p-3 px-5">
                                {{$booking->created_at}}
                            </td>
                            <td class="p-3 px-5">
                                   @if( $booking->status == true)
                                       Подтверждено
                                    @else
                                       Не подтверждено
                                    @endif
                            </td>
                            <td class="p-3 px-5">

                                <a href="/booking/{{$booking->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                <form action="/booking/{{$booking->id}}" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$bookings->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>
