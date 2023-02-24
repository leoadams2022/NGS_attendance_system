$.ajax({
        // the url
        url: 'controlar/dashboard.cont.admin.php',
        // http method
        type: 'POST', 
        // data to submit
        data: {
            name: 'value',
            name2: 'value2'
            },  
        // function to run BEFORE sending the request
        beforeSend: function() { 
            //code goes here
            $body = $("body");
            $body.addClass("loading"); 
        },
        // function to run AFTER sending the request
        complete: function() {
            //code goes here
            $body = $("body");
            $body.removeClass("loading");
            },
        // function to run if the request was success
        success: function(data, status, xhr){
            // code gos in here
            // data retuernd data
            // status of the request
            // xhr object       
            },
        error: function (Xhr, textStatus, errorMessage) {
            //xhr object , status text
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
});