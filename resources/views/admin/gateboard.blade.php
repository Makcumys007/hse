<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('gateboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Gate Board  Information
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Update information.
                        </p>
                        @if (session('success'))
                            <div id="success-message" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ session('success') }}
                            </div>
                        @endif

                    </header>
                    <form method="post" action="{{route('hseboard') }}" class="mt-6 space-y-6">  
                    @csrf   
                        <input type="hidden" name="lost_time_injuries" value="{{ $lastRecord->lost_time_injuries ?? '' }}">
                        <input type="hidden" name="safe_men_hours" value="{{ $lastRecord->safe_men_hours ?? '' }}">
                        <input type="hidden" name="medical_treatment" value="{{ $lastRecord->medical_treatment ?? '' }}">
                        <input type="hidden" name="first_aid_cases" value="{{ $lastRecord->first_aid_cases ?? '' }}">
                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" >Count of LTI of last year</label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"  name="count_of_lti_year" type="number" value="{{ $lastRecord->count_of_lti_year ?? '' }}" required="required"  >
                        </div>

                        

                        
                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" >Lost time Injuries Free Days</label>
                                <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="lost_time_injuries_free_days" value="{{ isset($lastRecord->lost_time_injuries_free_days) ? $lastRecord->lost_time_injuries_free_days : '0' }}" type="number" required="required" >            
                        </div>

                      

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" >Running String</label>
                                <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="running_string" required="required">{{ $lastRecord->running_string ?? '' }}</textarea>            
                        </div>


                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"> Save</button>

                        </div>
                    </form>
                </section>
                </div>
<!-- Load Video -->

<div class="p-6 text-gray-900 dark:text-gray-100">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Gate Board  Video
                        </h2>

                       
                        @if (session('video-success'))
                            <div id="success-message" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ session('video-success') }}
                            </div>
                        @endif
                        @if (session('video-error'))
                            <div id="danger-message" class="mb-4 font-medium text-sm text-red-600 dark:text-red-400">
                                {{ session('video-error') }}
                            </div>
                        @endif

                    </header>
                    <form method="post" action="{{ route('store.video') }}" enctype="multipart/form-data" class="mt-6 space-y-6">  
                        @csrf   
                        <div>
                      

                            <label class="custom-file-upload">
                                <input name="video" type="file" class="file-input"/>
                                Load video for HSEBoard
                            </label>
                            
                        </div>

                            <input type="hidden" name="dashboard_title" value="gate">
                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"> Save</button>

                        </div>
                    </form>
                </section>
                </div>




            </div>
        </div>
    </div>
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000); // 5000 миллисекунд = 5 секунд
    });
</script>

