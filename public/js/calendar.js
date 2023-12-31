import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

function renderEventContent(eventInfo) {
    return { html: '<b>' + eventInfo.event.title + '</b>' };
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            {
                title: 'Event 1',
                start: '2023-09-20'
            },
            {
                title: 'Event 2',
                start: '2023-09-22'
            },
            // 他のイベントを追加できます
        ]
    });
    calendar.render();
});