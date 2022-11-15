 @extends('layouts.stoc')
 @section('content')
     <main class="h-full pb-16 overflow-y-auto">
         <div class="container grid px-6 mx-auto">
             <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                 Tables
             </h2>

             <div class="flex flex-col flex-wrap mb-4  mt-4 space-y-4 md:flex-row md:items-end md:space-x-4 justify-end">
                 <div>
                     <button
                         class=" px-4   py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                         <a href="{{ url('add-stock') }}">add Stock
                         </a>
                     </button>
                 </div>
             </div>

             <div class="w-full overflow-hidden rounded-lg shadow-xs">
                 <div class="w-full overflow-x-auto">



                     <table class="w-full whitespace-no-wrap">
                         <thead>
                             <tr
                                 class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                 <th class="px-4 py-3">ID</th>
                                 <th class="px-4 py-3">Product_name</th>
                                 <th class="px-4 py-3">Quantity</th>
                                 <th class="px-4 py-3">brand_name</th>
                                 <th class="px-4 py-3">Specification</th>
                                 <th class="px-4 py-3">Registered by</th>
                                 <th class="px-4 py-3">Description</th>
                                 <th class="px-4 py-3">Request</th>
                                 <th class="px-4 py-3">Edit</th>
                                 <th class="px-4 py-3">Delete</th>

                             </tr>
                         </thead>
                         <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                             @foreach ($stock as $item)
                                 <tr class="text-gray-700 dark:text-gray-400">
                                     <td class="px-4 py-3">
                                         {{ $item->id }}
                                     </td>
                                     <td class="px-4 py-3 text-sm">{{ $item->product_name }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->count }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->brand_name }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->specification }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->users->name }}</td>
                                     <td class="px-4 py-3 text-sm">{{ $item->description }}</td>

                                     <td class="px-4 py-3 text-sm">


                                         <button @click="openModal"
                                             class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                             add to Cart
                                         </button>

                                         <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                             x-transition:leave="transition ease-in duration-150"
                                             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                             class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                             <!-- Modal -->
                                             <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                                 x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                                 x-transition:enter-end="opacity-100"
                                                 x-transition:leave="transition ease-in duration-150"
                                                 x-transition:leave-start="opacity-100"
                                                 x-transition:leave-end="opacity-0  transform translate-y-1/2"
                                                 {{-- @click.away="closeModal" @keydown.escape="closeModal" --}}
                                                 class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                                                 role="dialog" id="modal">
                                                 <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                                 <header class="flex justify-end">

                                                     <button
                                                         class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                                         aria-label="close" @click="closeModal">
                                                         <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                             role="img" aria-hidden="true">
                                                             <path
                                                                 d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                 clip-rule="evenodd" fill-rule="evenodd"></path>
                                                         </svg>
                                                     </button>
                                                 </header>
                                                 <!-- Modal body -->
                                                 <form action="{{ url('add-request') }}" class="quantity" method="POST"
                                                     enctype="multipart/form-data">
                                                     @csrf
                                                     <div class="mt-4 mb-6">

                                                         <label class="block mt-4 text-sm">
                                                             <span class="text-gray-700 dark:text-gray-400">
                                                                 Quantity
                                                             </span>
                                                         </label>
                                                         <input type="number" name="count" id="count"
                                                             class="  block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input" />
                                                     </div>

                                                     <footer
                                                         class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                                         <button @click="closeModal"
                                                             class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                                             Cancel
                                                         </button>
                                                         <button
                                                             class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                             send
                                                         </button>
                                                     </footer>
                                                 </form>
                                             </div>
                                         </div>

                                     </td>


                                     <td class="px-4 py-3">
                                         <div class="flex items-center space-x-4 text-sm">
                                             <a href="{{ url('edit-stock/' . $item->id) }}">
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
                                             <a href="{{ url('delete-stock/' . $item->id) }}">
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
                     <span classname="flex items-center col-span-3">

                     </span>
                     <span class="col-span-2"></span>
                     <!-- Pagination -->
                     <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">


                         {{ $stock->links('pagination::default') }}


                     </span>
                 </div>
             </div>
         </div>
     </main>
 @endsection
 @section('javascript')
     <script>
       
         $(".quantity").addtoCart(function(id)) {
             id.preventDefault();
             let count = $("#count").val();
             let _token = $("input[name=_token]").val();
             $.ajax({
                 url: "{{ route('request.add') }} ",
                 type: "POST",
                 data: {
                     count: count
                 },
                 success: function(response) {
                     if (response.count) {
                         alert("Status changed succussfully");
                     }
                 },
                 error: function(response) {}
                 success: function(response)
             })
         }
     </script>

     <script>
        const
    </script>
 @endsection
