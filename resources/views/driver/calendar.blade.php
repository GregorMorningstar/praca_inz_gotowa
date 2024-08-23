<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Kalendarz z zleceniami') }}
        </h2>

        @include('driver.nav.sidebarDriver')
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/pl.js"></script>

        <!-- Custom CSS for styling -->
        <style>
            .fc {
                background-color: white;
                color: black;
                width: 100%; /* Zmień szerokość na 100% */
                margin: 0 auto; /* Centrowanie kalendarza */
            }
            .fc-toolbar h2 {
                color: black;
            }
            .fc-day-header {
                background-color: #f8f9fa;
                color: black;
            }
            .fc-day {
                background-color: white;
            }
            .fc-today {
                background-color: #d3d3d3;
                color: black;
            }
            .fc-event-dot {
                border-color: black;
                background-color: black;
            }
            .fc-event .fc-content {
                color: black;
            }
            .fc-title-null {
                color: red;
            }
            .fc-row { /* Dostosowanie wysokości wiersza */
                min-height: 100px; /* Ustawienie minimalnej wysokości wiersza */
            }
        </style>

    </x-slot>

    <div class="container mt-5 text-black bg-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="text-center  text-white mb-4">Zlecenia w kalendarzu</h3>
                <div id="calendar" style="max-width: 900px; margin: auto;"></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var orders = @json($orders);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay',
                },
                locale: 'pl',
                events: orders.map(function(order) {
                    let title = '';
                    let data_start =  moment(order.odjazd_zaladunek).format('DD-MM-YYYY');
                    let data_finish = moment(order.odjazd_dostawa).format('DD-MM-YYYY');
                    let place_start = order.order.miejsce_zaladunku;
                    let place_finish = order.order.miejsce_docelowe;


                    if (order.odjazd_zaladunek === null || order.odjazd_dostawa === null) {
                        title = place_start + ' ( Kierowca nie dotarał na załadunek)' +
                            '\n' + order.order.miejsce_docelowe + ' ( Kierowca nie dotarał na rozładunek)';
                        return {
                            title: title,
                            start: order.order.data_zaladunku,
                            className: 'fc-title-null', // Dodaj klasę dla zmiany koloru tekstu
                            display: 'background' // Ustaw wyświetlanie jako tło
                        };
                    } else {
                        title = place_start +'|'+ data_start
                            // + '|' + order.order.data_zaladunku
                            '\n'+ data_finish +'|'+place_finish
                            // + '|' + order.order.data_rozladunku;
                        return {
                            title: title,
                            start: order.odjazd_zaladunek,
                            end: order.odjazd_dostawa,
                        };
                    }
                }),
                eventRender: function(event, element) {
                    if (event.display === 'background') {
                        element.css('background-color', '#ff9f89'); // Kolor tła zleceń z null
                        element.css('border-color', '#ff9f89'); // Kolor obramowania zleceń z null
                    }
                },
            });
        });
    </script>
</x-app-layout>
