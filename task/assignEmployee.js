$(document).ready(function() {
    $.getJSON('showEmployee.php', function (data) {
        var option = "<option value='" + "Please select one" + "'>Please select one</option>";
        //equivalent to: foreach .... loop through Json object
        $.each(data, function (id, name) {
            option += "<option value='" + id.id + "'>" + name.name + "</option>"
        })
        $('#assignEmployee').html(option);
    })
    // $('#assignEmployee').change(function(){
    //     selected = $('#assignEmployee').val();
    //     $.getJSON('showtask.php', { assignEmployee: selected }, function (employees) {
    //         $eid = id;
    //         var employee = ""
    //         $.each(employees, function (id, name) {
    //             $eid = id;
    //            "<div>" + name.name + "</div>"
    //         })
    //         $('.class').html(employee);
    //     })
    //
    // })
})