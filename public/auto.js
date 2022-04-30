$(document).ready(function () {
    console.log(window.location.hostname);
    $("#nombre").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/autocomplete",
                data: {
                    term: request.term,
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var resp = $.map(data, function (obj) {
                        return obj.nombre;
                    });

                    response(resp);
                },
            });
        },
        minLength: 2,
    });
});
