<div>
  <button wire:click="openModal()" type="button" class="delete-button" data-modal-target="staticModal" data-modal-toggle="staticModal">削除</button>

  @if($showModal)
    <!-- Main modal -->
    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="absolute inset-0 flex items-center justify-center">
      <div class="relative w-full max-w-2xl max-h-full ml-3">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-start justify-between p-4 border-b rounded-t">
            <h3 class="text-xl font-semibold text-black">
              {{ $target_type }}の削除
            </h3>
            <button type="button" wire:click="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-6 space-y-6">
            <p class="text-base leading-relaxed text-red-500 dark:text-red-400">
              対象のデータを削除します。よろしいですか？
            </p>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            {{ Form::open(['method' => 'POST', 'route' => $post_route]) }}
            {{ Form::hidden('id', $target_id) }}
            {{ Form::submit('削除する', ['class' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800']) }}
            {{ Form::close() }}

            <button wire:click="closeModal()" type="button" data-modal-hide="staticModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600">キャンセル</button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
