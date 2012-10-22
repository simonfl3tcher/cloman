
$(function($) {
    $.timer = function(func, time, autostart) { 
        this.set = function(func, time, autostart) {
            this.init = true;
            if(typeof func == 'object') {
                var paramList = ['autostart', 'time'];
                for(var arg in paramList) {if(func[paramList[arg]] != undefined) {eval(paramList[arg] + " = func[paramList[arg]]");}};
                func = func.action;
            }
            if(typeof func == 'function') {this.action = func;}
            if(!isNaN(time)) {this.intervalTime = time;}
            if(autostart && !this.isActive) {
                this.isActive = true;
                this.setTimer();
            }
            return this;
        };
        this.once = function(time) {
            var timer = this;
            if(isNaN(time)) {time = 0;}
            window.setTimeout(function() {timer.action();}, time);
            return this;
        };
        this.play = function(reset) {
            if(!this.isActive) {
                if(reset) {this.setTimer();}
                else {this.setTimer(this.remaining);}
                this.isActive = true;
            }
            return this;
        };
        this.pause = function() {
            if(this.isActive) {
                this.isActive = false;
                this.remaining -= new Date() - this.last;
                this.clearTimer();
            }
            return this;
        };
        this.stop = function() {
            this.isActive = false;
            this.remaining = this.intervalTime;
            this.clearTimer();
            return this;
        };
        this.toggle = function(reset) {
            if(this.isActive) {this.pause();}
            else if(reset) {this.play(true);}
            else {this.play();}
            return this;
        };
        this.reset = function() {
            this.isActive = false;
            this.play(true);
            return this;
        };
        this.clearTimer = function() {
            window.clearTimeout(this.timeoutObject);
        };
        this.setTimer = function(time) {
            var timer = this;
            if(typeof this.action != 'function') {return;}
            if(isNaN(time)) {time = this.intervalTime;}
            this.remaining = time;
            this.last = new Date();
            this.clearTimer();
            this.timeoutObject = window.setTimeout(function() {timer.go();}, time);
        };
        this.go = function() {
            if(this.isActive) {
                this.action();
                this.setTimer();
            }
        };
        
        if(this.init) {
            return new $.timer(func, time, autostart);
        } else {
            this.set(func, time, autostart);
            return this;
        }
    };
});

$(document).ready(function(){

    function secondsToTime(secs) {
        sec_numb    = parseInt(secs);
        var hours   = Math.floor(sec_numb / 3600);
        var minutes = Math.floor((sec_numb - (hours * 3600)) / 60);
        var seconds = sec_numb - (hours * 3600) - (minutes * 60);

        if (hours   < 10) {hours   = "0"+hours;}
        if (minutes < 10) {minutes = "0"+minutes;}
        if (seconds < 10) {seconds = "0"+seconds;}
        var time    = hours+':'+minutes+':'+seconds;
        return time;
    } 

    var count = 0;
    var timer = $.timer(
        function() {
            count++;
            var c = secondsToTime(count);
            $('.time-counter').html(secondsToTime(count));
        }, 1000, false); 

    $('button.time-tracker.start').live('click', function(){
            $(this).removeClass('start');
            $(this).addClass('pause');
            $.ajax({
                url: '/tasks/start_timer/' + $(this).parent().attr('data-taskid'),
                type: 'POST',
                datatype: 'html'
            }).done(function(data){
               console.log(count);
            });
            timer.play();

    });

    $('button.time-tracker.pause').live('click', function(){
            $(this).removeClass('pause');
            $(this).addClass('start');
            timer.pause();
            var data = 'time=' + count;
            $.ajax({
                url: '/tasks/pause_timer/' + $(this).parent().attr('data-taskid'),
                type: 'POST',
                dataType: 'html',
                data: data
            }).done(function(data){
                console.log('Timer has been paused');
            });
     }).trigger('click');


    $('button.time-tracker-complete').live('click', function(){
        timer.stop();
        var data = 'time=' + count;
        $.ajax({
            url: '/tasks/complete_timer/' + $(this).parent().attr('data-taskid'),
            type: 'POST',
            dataType: 'html',
            data: data
        }).done(function(data){
            console.log('Timer has been paused');
        });
    });
});