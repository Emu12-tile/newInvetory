@extends('layouts.out')
@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add Stock Out
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Invalid input -->
                <form action="{{ url('add-stock_out') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Valid input -->

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            requested name
                        </span>
                    </label>
                    <select
                        class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input"
                        @error('request_name') is-invalid @enderror" name="request_name" id="request_name">

                        <option selected disabled>-- Select category type --</option>
                        @foreach ($req as $name)
                            <option value="{{ $name->user_name }}">{{ $name->user_name }}</option>
                        @endforeach


                    </select>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Quantity Out
                        </span>
                    </label>
                    <input type="number" name="count"
                        class="  block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" />
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Model
                        </span>
                    </label>
                    <input type="string" name="model"
                        class="  block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" />
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            serial
                        </span>
                    </label>
                    <input type="string" name="serial"
                        class="  block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" />

                    <div class="flex flex-col flex-wrap mb-4  mt-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                        <div>
                            <button
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Submit
                            </button>
                        </div>
                    </div>
            </div>
            </form>


            <!-- Helper text -->

        </div>
        </div>
    </main>
@endsection
