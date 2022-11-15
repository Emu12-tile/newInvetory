 @extends('layouts.users')
 @section('content')
     <main class="h-full pb-16 overflow-y-auto">
         <div class="container grid px-6 mx-auto">
             <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                 User list
             </h2>
             {{-- <div class="align middle"> --}}
             {{-- <div class="flex flex-col flex-wrap mb-4  mt-4 space-y-4 md:flex-row md:items-end md:space-x-4 justify-end">
                 <div>
                     <button
                         class=" px-4   py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                         <a href="{{ url('add-department') }}">add department
                         </a>
                     </button>
                 </div>
             </div> --}}
             {{-- </div> --}}
             <div class="w-full overflow-hidden rounded-lg shadow-xs">
                 <div class="w-full overflow-x-auto">

                     {{-- @role('admin') --}}

                     {{-- @endrole --}}
                     {{-- @endcan --}}

                     <table class="w-full whitespace-no-wrap">
                         <thead>
                             <tr
                                 class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                 <th class="px-4 py-3">ID</th>
                                 <th class="px-4 py-3">Name</th>
                                 <th class="px-4 py-3">email</th>

                                 <th class="px-4 py-3">role_name</th>
                                 <th class="px-4 py-3">department</th>

                             </tr>
                         </thead>
                         <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                             @foreach ($user as $item)
                                 <tr class="text-gray-700 dark:text-gray-400">
                                     <td class="px-4 py-3">
                                         {{ $item->id }}
                                     </td>
                                     <td class="px-4 py-3 text-sm">{{ $item->name }}</td>

                                     <td class="px-4 py-3 text-sm">{{ $item->email }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->role_name }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->department }}</td>


                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
                 <div
                     class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                     <span class="flex items-center col-span-3">

                     </span>
                     <span class="col-span-2"></span>
                     <!-- Pagination -->
                     <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">


                         {{ $user->links('pagination::default') }}


                     </span>
                 </div>
             </div>
         </div>
     </main>
 @endsection
