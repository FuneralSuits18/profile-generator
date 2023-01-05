var current_user;

$.post('session_start.php' , {}, 
function(data){
    current_user = data;
    if(data){
        show_error_page();
    }
});

function show_error_page(){
    var errorPage = "<!DOCTYPE html><html><head><title>Error</title></head><body><h1>ERROR : NOT AVAILABLE</h1></body></html>";
    document.open();
    document.write(errorPage);
    document.close();
}




function sign_butt_clicked(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if(!username) {
        alert("Username should not be empty!");
    } else if(!password) {
        alert("Provide a password!");
    } else {
        var dhur;
        console.log(password);

        //window.location.replace('check_credentials.php' + '?username=')


        $.get('check_credentials.php', {_username:username, _password:password},
        function(data){
            dhur = data;
            console.log(data);
            if(data>0){
                //alert('sd');
                setCurrentUser(username);
                window.location.replace("index.php");
            } else {
                alert("Username or Password is incorrect");
            }
        });
    }
}

function setCurrentUser(user){
    var dhur;
    //console.log("jabs");
    $.post('set_current_user.php', {_user:user}, 
    function(data){
        //dhur = data;
        //window.location.replace("index.php");
    });
}

