<div>
    @push('styles')
        <style>
            html.dark {
                --fc-neutral-bg-color: rgba(var(--gray-800), .8);
                --fc-border-color: rgba(var(--gray-700), .5);
                --fc-button-bg-color: rgba(var(--primary-500));
                --fc-button-border-color: rgba(var(--primary-600));
                --fc-button-hover-bg-color: rgba(var(--primary-400));
                --fc-button-hover-border-color: rgba(var(--primary-500));
                --fc-button-active-bg-color: rgba(var(--primary-400));
                --fc-button-active-border-color: rgba(var(--primary-500));
                --fc-event-bg-color: rgba(var(--primary-500));
                --fc-event-border-color: rgba(var(--primary-600));
                --fc-list-event-hover-bg-color: rgba(var(--gray-800), .8);
            }

            .fc-toolbar-chunk>:not([hidden])~:not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(.25rem*(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(.25rem*var(--tw-space-y-reverse));
            }

            .fc-toolbar-title {
                font-size: 1.125rem !important;
                line-height: 1.25rem;
            }

            @media (min-width:768px) {
                .fc-toolbar-title {
                    font-size: 1.875rem !important;
                    line-height: 2.25rem !important;
                }
            }

            .fc-button {
                min-height: 2.25rem;
                border-radius: .5rem;
                padding: .25rem 6px;
                font-size: .875rem;
                line-height: 1.25rem;
                font-weight: 500;
                --tw-shadow: 0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;
                --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                outline: 2px solid #0000;
                outline-offset: 2px;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
                transition-timing-function: cubic-bezier(.4, 0, .2, 1);
                transition-duration: .15s;
            }

            @media (min-width:768px) {
                .fc-button {
                    padding-left: 1rem;
                    padding-right: 1rem;
                }
            }

            fc-button-primary:disabled {
                opacity: .7;
            }

            .fc-button-primary:not(:disabled).fc-button-active,
            .fc-button-primary:not(:disabled):active {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .fc-list,
            .fc-view table,
            .fc-view:not(.fc-list) table th {
                border-top-left-radius: .75rem;
                border-top-right-radius: .75rem;
            }

            .fc-list {
                overflow: hidden;
            }

            .fc-list .fc-list-event-title a {
                cursor: pointer;
            }

            .fc-list-sticky .fc-list-day th {
                background-color: inherit;
            }
        </style>
    @endpush
    @assets
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    @endassets
    @stack('styles')
    <div wire:ignore>
        <div id='calendar'></div>
    </div>
    @script
        <script>

            document.addEventListener('livewire:initialized', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    timeZone: 'Europe/Budapest',
                    editable: true,
                    selectable: false,
                    locale: 'hu',
                    firstDay: 1,
                    nowIndicator: true,
                    allDaySlot: false,
                    hiddenDays: [0, 6],
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
    @endscript
</div>
