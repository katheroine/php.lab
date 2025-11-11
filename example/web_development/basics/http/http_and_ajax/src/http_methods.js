function triggerGet() {
    $.ajax({
        url: 'http://localhost:8080/server.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $("#board").html("GET triggered");;
            $("#content").html(data.method);
        }
    });
    console.log("GET triggered");
}

function triggerPost() {
    $.ajax({
        url: "http://localhost:8080/server.php",
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            $("#board").html("POST triggered");
            $("#content").html(data.method);
        }
    });
    console.log("POST triggered");
}

function triggerPut() {
    $.ajax({
        url: 'http://localhost:8080/server.php',
        type: 'PUT',
        dataType: 'json',
        success: function(data) {
            $("#board").html("PUT triggered");
            $("#content").html(data.method);
        }
    });
    console.log("PUT triggered");
}

function triggerDelete() {
    $.ajax({
        url: "http://localhost:8080/server.php",
        type: 'DELETE',
        dataType: 'json',
        success: function(data) {
            $("#board").html("DELETE triggered");;
            $("#content").html(data.method);
        }
    });
    console.log("DELETE triggered");
}
