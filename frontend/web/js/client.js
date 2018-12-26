if (!window.WebSocket) {
    window.alert("Your browser does not support WebSocket!");
}

var websocket = new WebSocket("ws://gb-tracker.yii2:8080");

function checkId () {
    // Get taskId
    "use strict";
    var params = window
        .location
        .search
        .replace('?','')
        .split('&')
        .reduce(
            function(p,e){
                var a = e.split('=');
                p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                return p;
            },
            {}
        );
  return params['id'];
}

//input-output message code
websocket.onmessage = function(event) {
    "use strict";

    var data = event.data;
    var dataM = JSON.parse(data);
    var length = dataM.length;
   // console.log(length);
    if (length === undefined) {
        data = (dataM.username + ': ' + dataM.msg);
        console.log(data);
        var taskId = dataM.taskId;
        var mytaskId = checkId();
        //  console.log(taskId);
        //  console.log(mytaskId);
        if (taskId == mytaskId) {
            var messageContainer = document.createElement('div');
            var textNode = document.createTextNode(data);
            //   console.log(textNode);
            messageContainer.appendChild(textNode);
            document.getElementById("root_chat")
                .appendChild(messageContainer);
        }
    } else
    {
        for(var i= 0; i < length; i++)
        {
            data = (dataM[i].username + ': ' + dataM[i].msg);
            console.log(data);
            var taskId = dataM[i].taskId;
            var mytaskId = checkId();
            //  console.log(taskId);
            //  console.log(mytaskId);
            if (taskId == mytaskId) {
                var messageContainer = document.createElement('div');
                var textNode = document.createTextNode(data);
                //   console.log(textNode);
                messageContainer.appendChild(textNode);
                document.getElementById("root_chat")
                    .appendChild(messageContainer);
            }
        }
    }

};

//post message code
document.getElementById("chat_form")
    .addEventListener('submit', function (event) {
        "use strict";
        var textMessage = this.message.value;
        var jsonObject ={};
       jsonObject.msg = textMessage;
       jsonObject.taskId = checkId();
       // include name of the User from view.php
       jsonObject.username = username;
       jsonObject = JSON.stringify(jsonObject);
      // console.log(jsonObject);
       // console.log( params['id']);
        websocket.send(jsonObject);
        event.preventDefault();
        return false;

    });
