window.onbeforeunload = function () {

 

};
        document.addEventListener("visibilitychange", function() {
        if (document.visibilityState === 'visible') {
        } else {
            // document.getElementById("myForm").submit();
        }
        });

        var time = 300;
        callsetTimeOut();  
    
        function callsetTimeOut(){
        setTimeout(function(){
        if(time){
        time--;
        var min = Math.floor(time/60),sec= Math.round(time%60);
        document.getElementById("timer").innerHTML =min +":" + sec + " min left";
        callsetTimeOut();
        
        if(time<=0){
            console.log('mudinchuchu');
            document.getElementById("myForm").submit();
        
        }
        }min +"Min Left"
        }, 1000);
    }
    