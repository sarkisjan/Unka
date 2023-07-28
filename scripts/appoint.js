var $productItem;

function getAppointments() {
    var getAppoint = $.get('reading.php', {

        action: 'getAppointments'

    });

    getAppoint.done(function (data) {
        var rows = JSON.parse(data);
        for (let row of rows) {
            $appointment = `
            <tr>
                <td>${row.name}</td>
                <td>${row.lastName}</td>
                <td>${row.number}</td>
                <td>${row.email}</td>
                <td>${row.serviceType}</td>
                <td>${row.date}</td>
                <td>${row.time}</td>
                <td>${row.msg}</td>
                <td><input type='checkbox' class='delete-checkbox' value = '${row.id}'></td>
            </tr>
            `;
            $('#appointmentList').append($appointment);

        }
        $('.delete-checkbox').change(function (event) {

            $('#mass_delete').click(function () {
                var ids = [];
                event.target.checked ? ids.push(event.target.value) : null;
                $.post('deleting.php', {
                    action: 'delete',
                    id: ids
                })
                    .done(function () {

                        window.location.href = "appointments.php";

                    })
                console.log(ids);
                console.log(this);
            });
        });

    });

}



getAppointments();




