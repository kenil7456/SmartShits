document.addEventListener('DOMContentLoaded', () => {
    const services = document.querySelectorAll('.service');
    services.forEach(service => {
        service.addEventListener('mouseover', () => {
            service.style.opacity = '0.9';
        });
        service.addEventListener('mouseout', () => {
            service.style.opacity = '1';
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const loadMoreBtn = document.querySelector('.load-more');
    const servicesSection = document.querySelector('.services');
    const hiddenServices = document.querySelectorAll('.service.hidden');

    loadMoreBtn.addEventListener('click', function () {
        // Calculate the new height of the services section
        let newHeight = 1;
        servicesSection.style.height = 'auto'; // Temporarily set height to auto to get the full height
        Array.from(servicesSection.children).forEach(child => {
            newHeight += child.offsetHeight;
        });
        servicesSection.style.height = ''; // Reset height

        // Apply the new height with a transition
        servicesSection.style.height = newHeight + 'px';

        // Show the hidden services
        hiddenServices.forEach(function (service) {
            service.classList.remove('hidden');
        });

        // Hide the button after click
        loadMoreBtn.style.display = 'none';
    });
});




// Inside your script.js

// Assume you have a function that fetches employee data
function fetchEmployees() {
    // ...fetching logic here...
    // For the example, I'm using static data
    return [
        { id: 1, name: 'Alice Smith', totalHours: 0 },
        { id: 2, name: 'Bob Johnson', totalHours: 0 },
        // ...more employees...
    ];
}

// Once the DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    const employeeNames = document.querySelector('.employee-names');
    const employees = fetchEmployees();

    // Load employee names into the list
    employees.forEach(employee => {
        const employeeItem = document.createElement('div');
        employeeItem.className = 'employee-name';
        employeeItem.innerHTML = `
            <div class="name">${employee.name}</div>
            <div class="total-hours">0h</div>
        `;
        employeeNames.appendChild(employeeItem);
    });

    // Initialize FullCalendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        // ... your FullCalendar initialization options ...
    });

    calendar.render();
});

// Function to update total hours - you'll need to call this whenever shifts change
function updateTotalHours(employeeId, hours) {
    const employee = employees.find(emp => emp.id === employeeId);
    if (employee) {
        employee.totalHours += hours;
        // Update the corresponding DOM element
        const employeeElement = document.querySelector(`.employee-name[data-id="${employeeId}"] .total-hours`);
        if (employeeElement) {
            employeeElement.textContent = `${employee.totalHours}h`;
        }
    }
}


// Inside your script.js
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var createShiftBtn = document.getElementById('createShiftBtn');
    var publishScheduleBtn = document.getElementById('publishScheduleBtn');
    var isCalendarLocked = true; // State to track if calendar is locked

    // Initialize the calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        selectable: false, // Initially, the calendar is not selectable
        editable: false, // Initially, the calendar is not editable
        events: [], // Empty array to hold our events
        select: function (info) {
            // Only allow event creation if the calendar is unlocked
            if (!isCalendarLocked) {
                var employeeName = prompt('Enter Employee Name:');
                var shiftStart = prompt('Enter Shift Start Time (HH:MM):');
                var shiftEnd = prompt('Enter Shift End Time (HH:MM):');

                if (employeeName && shiftStart && shiftEnd) {
                    calendar.addEvent({
                        title: employeeName + ' (' + shiftStart + ' - ' + shiftEnd + ')',
                        start: info.start,
                        end: info.end,
                        allDay: info.allDay
                    });
                }
            }
            calendar.unselect(); // Clear date selection
        },
        eventClick: function (info) {
            // Only allow editing if the calendar is unlocked
            if (!isCalendarLocked) {
                var employeeName = prompt('Edit Employee Name:', info.event.title.split(' (')[0]);
                var shiftTimes = prompt('Edit Shift Times (HH:MM - HH:MM):', info.event.title.split(' (')[1].slice(0, -1));

                if (shiftTimes) {
                    var [shiftStart, shiftEnd] = shiftTimes.split(' - ');
                    info.event.setStart(info.event.startStr.split('T')[0] + 'T' + shiftStart);
                    info.event.setEnd(info.event.startStr.split('T')[0] + 'T' + shiftEnd);
                    info.event.setProp('title', employeeName + ' (' + shiftStart + ' - ' + shiftEnd + ')');
                }
            }
        }
    });

    calendar.render();

    // Function to toggle the calendar lock state
    function toggleCalendarLock() {
        isCalendarLocked = !isCalendarLocked; // Toggle the state
        calendar.setOption('editable', !isCalendarLocked);
        calendar.setOption('selectable', !isCalendarLocked);
        publishScheduleBtn.disabled = isCalendarLocked; // Enable or disable the publish button
    }

    // Event handler for the 'Create Shift' button
    createShiftBtn.addEventListener('click', function () {
        if (isCalendarLocked) {
            toggleCalendarLock();
            this.textContent = 'Lock Shifts'; // Change button text to indicate state
        } else {
            toggleCalendarLock();
            this.textContent = '+ Create Shift'; // Reset button text
        }
    });

    // Event handler for the 'Publish Schedule' button
    publishScheduleBtn.addEventListener('click', function () {
        if (!isCalendarLocked) {
            toggleCalendarLock();
            createShiftBtn.textContent = '+ Create Shift'; // Reset button text
            // Implement logic to save shifts and notify employees here
            console
        }
    });
});




fetch('api/schedule') // Fetch the schedule data from your API
    .then(response => response.json())
    .then(data => {
        const scheduleList = document.querySelector('.schedule-list');
        data.forEach(schedule => {
            const scheduleItem = document.createElement('div');
            scheduleItem.className = 'schedule';
            scheduleItem.innerHTML = `
                <h2>${schedule.title}</h2>
                <p>${schedule.date}</p>
                <p>${schedule.description}</p>
            `;
            scheduleList.appendChild(scheduleItem);
        });
    });



document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search-input');
    var dropdown = document.getElementById('search-dropdown');

    // Sample data - replace this with your actual list of names or data
    var names = ['Alice', 'Bob', 'Charlie', 'David'];

    searchInput.addEventListener('input', function () {
        // Clear previous results
        dropdown.innerHTML = '';

        // Filter the names based on the input value
        var inputVal = this.value.toLowerCase();
        var filteredNames = names.filter(function (name) {
            return name.toLowerCase().includes(inputVal);
        });

        // Create a dropdown item for each filtered name and append to dropdown
        filteredNames.forEach(function (filteredName) {
            var div = document.createElement('div');
            div.textContent = filteredName;
            div.className = 'dropdown-item';
            div.onclick = function () {
                searchInput.value = filteredName; // Update the input with the selected name
                dropdown.innerHTML = ''; // Clear the dropdown
            };
            dropdown.appendChild(div);
        });
    });
});


