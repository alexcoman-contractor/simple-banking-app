<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="border border-red-400 mb-4 bg-red-100 px-4 py-3 text-red-700">
                                <p>{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif

                    {!! Form::open(['route' => 'customer.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}

                    <div>
                        {{ Form::label('name', 'Name') }}

                        {{ Form::text('name', null, ['class' => 'block mt-1 rounded-md shadow-sm border-gray-300']) }}
                    </div>
                    <div>
                        {{ Form::label('email', 'Email') }}

                        {{ Form::email('email', null, ['class' => 'block mt-1 rounded-md shadow-sm border-gray-300']) }}
                    </div>
                    <div>
                        {{ Form::label('password', 'Password') }}

                        {{ Form::password('password', ['class' => 'block mt-1 rounded-md shadow-sm border-gray-300']) }}
                    </div>
                    <div>
                        {{ Form::label('balance', 'Balance') }}

                        {{ Form::number('balance', null, ['class' => 'block mt-1 rounded-md shadow-sm border-gray-300']) }}
                    </div>
                    <div>
                        {{ Form::label('branch', 'Branch') }}

                        {{ Form::select('branch', \App\Models\Branch::pluck('name', 'id'), null, ['class' => 'block mt-1 rounded-md shadow-sm border-gray-300']) }}
                    </div>

                    <div>
                        {{ Form::submit('Create', ['class' => 'inline-flex items-center px-4 py-2 bg-gray-800 text-white mt-3']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
