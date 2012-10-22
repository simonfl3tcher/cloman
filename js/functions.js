$.fn.extend({
	slideRightShow : function(){
		return this.each(function(){
			$(this).show('slide', {direction: 'right'}, 800);
			$(this).addClass('open');
		});
	},

	slideRightHide: function(){
		return this.each(function(){
			$(this).hide('slide', {direction: 'right'}, 800);
			$(this).removeClass('open');
		});
	},
	slideLeftShow : function(){
		return this.each(function(){
			$(this).show('slide', {direction: 'left'}, 800);
			$(this).addClass('open');
		});
	},

	slideLeftHide: function(){
		return this.each(function(){
			$(this).hide('slide', {direction: 'left'}, 800);
			$(this).removeClass('open');
		});
	}
})

String.prototype.toHHMMSS = function () {
    sec_numb    = parseInt(this);
    var hours   = Math.floor(sec_numb / 3600);
    var minutes = Math.floor((sec_numb - (hours * 3600)) / 60);
    var seconds = sec_numb - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    var time    = hours+':'+minutes+':'+seconds;
    return time;
}

function addTime()
{
    if (arguments.length < 2)
    {
        if (arguments.length == 1 && isFormattedDate(arguments[0])) return arguments[0];
        else return false;
    }

    var time1Split, time2Split, totalHours, totalMinutes;
    if (isFormattedDate(arguments[0])) var totalTime = arguments[0];
    else return false;

    for (var i = 1; i < arguments.length; i++)
    {
        // Add them up
        time1Split = totalTime.split(':');
        time2Split = arguments[i].split(':');

        totalHours = parseInt(time1Split[0]) + parseInt(time2Split[0]);
        totalMinutes = parseInt(time1Split[1]) + parseInt(time2Split[1]);

        // If total minutes is more than 59, then convert to hours and minutes
        if (totalMinutes > 59)
        {
            totalHours += Math.floor(totalMinutes / 60);
            totalMinutes = totalMinutes % 60;
        }

        totalTime = totalHours + ':' + padWithZeros(totalMinutes);
    }

    return totalTime;
}

function isFormattedDate(date)
{
    var splitDate = date.split(':');
    if (splitDate.length == 2 && (parseInt(splitDate[0]) + '').length <= 2 && (parseInt(splitDate[1]) + '').length <= 2) return true;
    else return false;
}

function padWithZeros(number)
{
    var lengthOfNumber = (parseInt(number) + '').length;
    if (lengthOfNumber == 2) return number;
    else if (lengthOfNumber == 1) return '0' + number;
    else if (lengthOfNumber == 0) return '00';
    else return false;
}

