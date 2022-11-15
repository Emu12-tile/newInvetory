 @extends('layouts.dept')
 @section('content')
     <main class="h-full pb-16 overflow-y-auto">
         <div class="container grid px-6 mx-auto">
             <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                 Departments
             </h2>
             {{-- <div class="align middle"> --}}
             <div class="flex flex-col flex-wrap mb-4  mt-4 space-y-4 md:flex-row md:items-end md:space-x-4 justify-end">
                 <div>
                     <button
                         class=" px-4   py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                         <a href="{{ url('add-department') }}">add department
                         </a>
                     </button>
                 </div>
             </div>
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
                                 <th class="px-4 py-3">Department Name</th>
                                 <th class="px-4 py-3">Head of Department</th>

                                 <th class="px-4 py-3">Edit</th>
                                 <th class="px-4 py-3">Delete</th>

                             </tr>
                         </thead>
                         <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                             @foreach ($dept as $item)
                                 <tr class="text-gray-700 dark:text-gray-400">
                                     <td class="px-4 py-3">
                                         {{ $item->id }}
                                     </td>
                                     <td class="px-4 py-3 text-sm">{{ $item->name }}</td>

                                     <td class="px-4 py-3 text-sm">{{ $item->head }}</td>

                                     <td class="px-4 py-3">
                                         <div class="flex items-center space-x-4 text-sm">
                                             <a href="{{ url('edit-department/' . $item->id) }}">
                                                 <button
                                                     class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                     aria-label="Edit">
                                                     <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                         viewBox="0 0 20 20">
                                                         <path
                                                             d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                         </path>
                                                     </svg>
                                                 </button>
                                             </a>
                                         </div>
                                     </td>
                                     <td class="px-4 py-3">
                                         <div class="flex items-center space-x-4 text-sm">
                                             <a href="{{ url('delete-department/' . $item->id) }}">
                                                 <button
                                                     class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                     aria-label="Delete">
                                                     <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                         viewBox="0 0 20 20">
                                                         <path fill-rule="evenodd"
                                                             d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                             clip-rule="evenodd"></path>
                                                     </svg>
                                                 </button>
                                             </a>
                                         </div>
                                     </td>
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


                         {{ $dept->links('pagination::default') }}


                     </span>
                 </div>
             </div>
         </div>
     </main>
 @endsection
