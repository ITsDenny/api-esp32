@include('partials.header')
@include('partials.navbar')
<div class="flex flex-col justify-center items-center">
    <div class="flex-1">
        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">User</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Clock In</th>
                    <th scope="col" class="px-6 py-3">Clock Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $attendance->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $attendance->date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->clock_in }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->clock_out }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('partials.footer')
