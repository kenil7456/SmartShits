document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.getElementById('calendar');
    let calendar;

    if (calendarEl) {
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            selectable: true,
            editable: true,
            events: [],
            select: function (info) {
                let employeeId = prompt('Enter Employee ID:');
                let employeeName = prompt('Enter Employee Name:');
                let startTime = prompt('Enter Shift Start Time (HH:MM):');
                let endTime = prompt('Enter Shift End Time (HH:MM):');
                let notes = prompt('Enter Notes (optional):', '');

                if (employeeId && employeeName && startTime && endTime) {
                    let startDateTime = new Date(info.startStr).toISOString().split('T')[0] + 'T' + startTime + ':00';
                    let endDateTime = new Date(info.endStr).toISOString().split('T')[0] + 'T' + endTime + ':00';

                    calendar.addEvent({
                        title: `${employeeName} (${startTime} - ${endTime})`,
                        start: startDateTime,
                        end: endDateTime,
                        allDay: false,
                        extendedProps: {
                            employeeId: employeeId,
                            notes: notes
                        }
                    });
                }
                calendar.unselect();
            },
            eventClick: function (info) {
                let ShiftID = prompt('Edit Employee ID:', info.event.extendedProps.ShiftID);
                let employeeName = prompt('Edit Employee Name:', info.event.title.split(' (')[0]);
                let startTime = prompt('Edit Shift Start Time (HH:MM):', info.event.start.toISOString().split('T')[1]);
                let endTime = prompt('Edit Shift End Time (HH:MM):', info.event.end.toISOString().split('T')[1]);

                if (ShiftID && employeeName && startTime && endTime) {
                    info.event.setProp('title', `${employeeName} (${startTime} - ${endTime})`);
                    info.event.setProp('extendedProps', { ShiftID: ShiftID });
                    info.event.setStart(info.event.startStr.split('T')[0] + 'T' + startTime);
                    info.event.setEnd(info.event.endStr.split('T')[0] + 'T' + endTime);
                }
            }
        });

        calendar.render();
    }

    const saveShiftsBtn = document.getElementById('createShiftBtn');
    if (saveShiftsBtn) {
        saveShiftsBtn.addEventListener('click', () => {
            const events = calendar.getEvents();
            const shifts = events.map(event => ({
                shiftDate: event.start.toISOString().split('T')[0],
                startTime: event.start.toISOString().split('T')[1],
                endTime: event.end.toISOString().split('T')[1],
                notes: event.extendedProps.notes || ''
            }));

            fetch('save_shift.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ shifts: shifts })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Shifts saved successfully!');
                    } else {
                        alert('Error saving shifts: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error saving shifts:', error);
                    alert('Error saving shifts: ' + error);
                });
        });
    }
});
