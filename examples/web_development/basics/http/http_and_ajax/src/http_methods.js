function triggerGet() {
    triggerRequest('GET');
}

function triggerPost() {
    triggerRequest('POST');
}

function triggerPut() {
    triggerRequest('PUT');
}

function triggerDelete() {
    triggerRequest('DELETE');
}

const serverUrl = "http://localhost:8080/server.php";

function triggerRequest(method) {
    const responseDataType = 'json';
    const message = method + " triggered";

    $.ajax({
        url: serverUrl,
        type: method,
        dataType: responseDataType,
        success: function(data) {
            $("#board").html(message);
            $("#content").html(data.method);
        }
    });
    console.log(message);
}
