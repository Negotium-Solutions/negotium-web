<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact List') }}
        </h2>
    </x-slot> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped w-100" style="width:100%;">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width:1px;">Date Submitted</th>
                        </tr>
                    @forelse($cus as $cu)
                        <tr>
                            <td>{{ $cu->name }}</td>
                            <td><a href="mailto:{{ $cu->email }}">{{ $cu->email }}</a></td>
                            <td nowrap>{{ $cu->created_at }}</td>
                        </tr>
                    @empty

                    @endforelse
</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
