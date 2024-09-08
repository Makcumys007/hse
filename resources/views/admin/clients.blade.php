<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('clients') }}
        </h2>
    </x-slot>

    <!-- В вашем Blade шаблоне -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <section>
                    <table id="visits" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Hostname
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Last Visit
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                    <!--        @foreach ($visits as $visit)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $visit->hostname }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                        {{ $visit->url }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black-500 dark:text-gray-300">
                                        {{ $visit->last_visit }}
                                    </td>
                                </tr>
                            @endforeach -->
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</div>

<div id="hseboard" data-seconds="{{ $hseboard->refresh_page_time ?? '60' }}"></div>
<div id="gateboard" data-seconds="{{ $gateboard->refresh_page_time ?? '60' }}"></div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            // Функция для загрузки данных
            function loadData() {
                $.ajax({
                    url: '/get-data', // URL для получения данных
                    method: 'GET',
                    success: function(data) {
                        var rows = '';
                        data.forEach(function(item) {
                            rows += '<tr>';
                            rows += '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">' + item.hostname + '</td>';
                            rows += '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">' + item.url + '</td>';
                            rows += '<td class="px-6 py-4 whitespace-nowrap text-sm text-black-500 dark:text-gray-300">' + item.last_visit + '</td>';
                            rows += '</tr>';
                        });
                        $('#visits tbody').html(rows);
                        updateRowColors(); // Обновляем цвета строк после загрузки данных
                    },
                    error: function() {
                        alert('Ошибка при загрузке данных');
                    }
                });
            }

            // Функция для обновления цветов строк
            function updateRowColors() {
                var hiddenSeconds1 = $('#hseboard').data('seconds'); // Получаем значение первого скрытого поля
                var hiddenSeconds2 = $('#gateboard').data('seconds'); // Получаем значение второго скрытого поля
                var targetDate = new Date(); // Используем текущее время

                $('#visits tr').each(function(index) {
                    if (index === 0) return; // Пропускаем заголовок таблицы

                    var urlCellText = $(this).find('td').eq(1).text(); // Предполагаем, что URL во втором столбце
                    var dateTimeCellText = $(this).find('td').eq(2).text(); // Предполагаем, что дата и время в третьем столбце
                    var dateTimeCellValue = new Date(dateTimeCellText);

                    // Определяем, сколько секунд отнимать в зависимости от URL
                    var secondsToSubtract = 0;
                    if (urlCellText.includes('hse')) {
                        secondsToSubtract = hiddenSeconds1;
                    } else if (urlCellText.includes('gate')) {
                        secondsToSubtract = hiddenSeconds2;
                    }

                    // Отнимаем секунды от текущего времени
                    var adjustedTargetDate = new Date(targetDate);
                    adjustedTargetDate.setSeconds(adjustedTargetDate.getSeconds() - secondsToSubtract);

                    // Сравниваем с целевой датой
                    if (dateTimeCellValue < adjustedTargetDate) {
                        $(this).css('background-color', 'red');
                    }
                });
            }

            // Загрузка данных при загрузке страницы
            loadData();

            // Обновление данных каждые 60 секунд
            setInterval(loadData, 60000); // 60000 миллисекунд = 60 секунд
        });
</script>


