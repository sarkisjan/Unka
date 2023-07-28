const menuBtn = document.querySelector(".menu-btn");
let menuOpen = false;
const mainMenu = document.querySelector(".mainMenu");

menuBtn.addEventListener("click", () => {
    if (!menuOpen) {
        menuBtn.classList.add("open");
        show();
        menuOpen = true;

    } else {
        menuBtn.classList.remove("open");
        close();
        menuOpen = false;
    }
});
function show() {
    mainMenu.style.display = "flex";
    mainMenu.style.top = "0";
}
function close() {
    mainMenu.style.top = "-100%";
}


$('#form').submit(function (e) {
    e.preventDefault();

    var action = 'insert';
    insertAppoitment('adding.php', action);

});



function insertAppoitment(url, action) {
    var post = $.post(url, {
        name: $('#name').val(),
        lastName: $('#lastName').val(),
        serviceType: $('#serviceType').val(),
        email: $('#email').val(),
        number: $('#number').val(),
        date: $('#date').val(),
        time: $('#time').val(),
        msg: $('#msg').val(),
        action: action
    });
    post.done(function (data) {

        console.log(data);

        var errors = [];
        errors = JSON.parse(data);
        console.log(errors);
        errors.name ? $('#nameError').text(errors.name) : $('#nameError').text('');
        errors.lastName ? $('#lastNameError').text(errors.lastName) : $('#lastNameError').text('');
        errors.serviceType ? $('#serviceTypeError').text(errors.serviceType) : $('#serviceTypeError').text('');
        errors.email ? $('#emailError').text(errors.email) : $('#emailError').text('');
        errors.number ? $('#numberError').text(errors.number) : $('#numberError').text('');
        errors.date ? $('#dateError').text(errors.date) : $('#dateError').text('');
        errors.msg ? $('#msgError').text(errors.msg) : $('#msgError').text('');
        errors.time ? $('#timeError').text(errors.time) : $('#timeError').text('');
        console.log(data.length);
        if (errors.length === 0) {
            window.location.href = "index.html";
        }

    });

}


