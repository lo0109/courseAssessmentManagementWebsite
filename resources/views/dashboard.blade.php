<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Dynamic Content Based on User Type -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($user instanceof \App\Models\Student)
                        <h3>Welcome, {{ $user->name }} (Student)</h3>
                        <p>Here are your enrolled courses:</p>
                        <ul>
                            @foreach($user->enrolledCourses as $course)
                                <li>{{ $course->name }}</li>
                            @endforeach
                        </ul>
                    @elseif($user instanceof \App\Models\Teacher)
                        <h3>Welcome, {{ $user->name }} (Teacher)</h3>
                        <p>Here are the courses you're teaching:</p>
                        <ul>
                            @foreach($user->courses as $course)
                                <li>{{ $course->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Unknown user type</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
